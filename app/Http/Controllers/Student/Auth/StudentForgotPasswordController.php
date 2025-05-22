<?php

namespace App\Http\Controllers\Student\Auth;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\PageOption;
use App\Models\Store;
use App\Models\Student;
use App\Models\Utility;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

use App\Mail\ResetPassword;

class StudentForgotPasswordController extends Controller
{
    public function __construct()
    {
        if(Auth::check())
        {
            \App::setLocale(\Auth::user()->lang);
        }else{
            $lang = session()->get('lang');
            \App::setLocale(isset($lang) ? $lang : 'pt');
        }
    }

    public function showLinkRequestForm($slug){

        $store = Store::where('slug', $slug)->first();
        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        $blog = Blog::where('store_id', $store->id);
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        return view('storefront.student.password',compact('blog', 'demoStoreThemeSetting', 'store', 'slug', 'page_slug_urls', 'store_settings'));
    }

    public function postStudentEmail(Request $request, $slug)
    {
        $request->validate(['email' => 'required|email|exists:students']);
        $token = \Str::random(60);

        $store = Store::where('slug', $slug)->first();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);

        if($store->domains != null){
            $domain = $store->domains . '/' . $slug . '/student-password/reset/' . $token;
            if (!empty($domain) && !preg_match("~^(?:f|ht)tps?://~i", $domain)) {
                $domain = "https://" . $domain;
            }
        }else{
            $domain = env('APP_URL') . '/' . $slug . '/student-password/reset/' . $token;
        }

        DB::table('password_resets')->insert(
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );

        Mail::send(new ResetPassword($store, $slug, $request->email, $domain));

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function getStudentPassword($slug,$token)
    {
        $store = Store::where('slug', $slug)->first();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);

        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        return view('storefront.student.newpassword', compact('token','slug','store', 'demoStoreThemeSetting', 'store_settings'));
    }

    public function updateStudentPassword(Request $request,$slug)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:students',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',

            ]
        );

        $updatePassword = DB::table('password_resets')->where(
            [
                'email' => $request->email,
                'token' => $request->token,
            ]
        )->first();

        if(!$updatePassword)
        {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Student::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('student.loginform',$slug)->with('success', 'Your password has been changed.');

    }
}
