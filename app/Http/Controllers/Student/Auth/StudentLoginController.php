<?php

namespace App\Http\Controllers\Student\Auth;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\PageOption;
use App\Models\Store;
use App\Models\Student;
use App\Models\StudentActivity;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class StudentLoginController extends Controller
{
    public function __construct()
    {
        $lang = session()->get('lang');
        \App::setLocale(isset($lang) ? $lang : 'pt');
    }

    public function showLoginForm($slug)
    {
        $store                 = Store::where('slug', $slug)->first();
        $page_slug_urls        = PageOption::where('store_id', $store->id)->get();
        $blog                  = Blog::where('store_id', $store->id);
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }

        return view('storefront.user.login', compact('blog', 'demoStoreThemeSetting', 'store', 'slug', 'page_slug_urls', 'store_settings'));
    }

    public function login(Request $request, $slug, $cart = 0)
    {
        $store = Store::where('slug', $slug)->first();
        $student = Student::where('store_id', $store->id)->where('email', $request->email)->first();

        $credentials = array_merge(
            $request->only('email', 'password'),
            ['store_id' => $store->id]
        );
        
        if($this->validator($request, $slug) == true){
            if(!empty($student) && Auth::guard('students')->attempt($credentials, $request->filled('remember'))){
                visitor()->setVisitor($student)->visit();

                return redirect()->route('student.home', $slug);

            }
        }
        else{
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }

        return $this->loginFailed();
    }

    private function validator(Request $request, $slug)
    {
        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];
        $validate = Validator::make(
            $request->all(), [
                'email' => [
                    'required',
                    'string',
                    'email',
                    'min:5',
                    'max:191',
                ],
                'password' => [
                    'required',
                    'string',
                    'min:4',
                    'max:255',
                ],
            ]
        );
        $store    = Store::where('slug', $slug)->first();
        $vali     = Student::where('email', $request->email)->where('store_id', $store->id)->count();
        if($validate->fails())
        {
            $message = $validate->getMessageBag();

            return redirect()->back()->with('error', $message->first());
        }
        elseif($vali > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    private function loginFailed()
    {
        return redirect()->back()->withInput()->with('error', 'These credentials do not match our records!');
    }

    public function logout($slug)
    {
        $store          = Store::where('slug', $slug)->first();
        $blog           = Blog::where('store_id', $store->id);
        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        Auth::guard('students')->logout();

        return redirect()->route('student.loginform', $slug);
    }

    public function profile($slug)
    {
        $id = Auth::guard('students')->user()->id;
        $store                 = Store::where('slug', $slug)->first();
        $blog                  = Blog::where('store_id', $store->id);
        $page_slug_urls        = PageOption::where('store_id', $store->id)->get();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        $student = Auth::guard('students')->user();
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        $userDetail = Student::find($id);

        return view('storefront.student.profile', compact('blog', 'demoStoreThemeSetting', 'slug', 'store', 'page_slug_urls', 'student', 'userDetail', 'store_settings'));
    }

    public function profileUpdate($slug, Request $request)
    {
        $store          = Store::where('slug', $slug)->first();
        $blog           = Blog::where('store_id', $store->id);
        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }

        $validate = Validator::make(
            $request->all(), [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                ],
            ]
        );
        $vali = Student::where('email', $request->email)->where('store_id', $store->id)->count();
        if($validate->fails())
        {
            $message = $validate->getMessageBag();
            return redirect()->back()->with('error', $message->first());
        }
        $student = Student::find($request->id);

        if($request->hasFile('profile'))
        {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $dir        = storage_path('uploads/profile/');
            $image_path = $dir . $student['avatar'];

            if(\File::exists($image_path))
            {
                \File::delete($image_path);
            }

            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }

            Storage::disk('public')->put('uploads/profile/', $fileNameToStore);

            $path = $request->file('profile');
        }

        if(!empty($request->profile))
        {
            $student['avatar'] = $fileNameToStore;
        }
        if($request->email != $student->email)
        {
            if($vali > 0)
            {
                return redirect()->back()->with('error', __('Email already exists'));
            }
            else
            {
                $student->email = $request->email;
            }
        }


        $student->name = $request->name;
        $student->update();
        if(!empty($request->current_password) && !empty($request->new_password) && !empty($request->confirm_password))
        {
            if(Auth::guard('students')->check())
            {
                $request->validate(
                    [
                        'current_password' => 'required',
                        'new_password' => 'required|min:6',
                        'confirm_password' => 'required|same:new_password',
                    ]
                );
                $objUser          = Auth::guard('students')->user();
                $request_data     = $request->All();
                $current_password = $objUser->password;
                if(Hash::check($request_data['current_password'], $current_password))
                {
                    $user_id            = Auth::guard('students')->user()->id;
                    $obj_user           = Student::find($user_id);
                    $obj_user->password = Hash::make($request_data['new_password']);;
                    $obj_user->update();

                    return redirect()->back()->with('success', __('Password successfully updated.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Please enter correct current password.'));
                }
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }


        return redirect()->back()->with('success', __('Profile successfully updated.'));
    }

    public function updatePassword(Request $request)
    {
        if(Auth::guard('students')->check())
        {
            $request->validate(
                [
                    'current_password' => 'required',
                    'new_password' => 'required|min:6',
                    'confirm_password' => 'required|same:new_password',
                ]
            );
            $objUser          = Auth::guard('students')->user();
            $request_data     = $request->All();
            $current_password = $objUser->password;
            if(Hash::check($request_data['current_password'], $current_password))
            {
                $user_id            = Auth::guard('students')->user()->id;
                $obj_user           = Student::find($user_id);
                $obj_user->password = Hash::make($request_data['new_password']);;
                $obj_user->update();

                return redirect()->back()->with('success', __('Password successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Please enter correct current password.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Something is wrong.'));
        }
    }

}
