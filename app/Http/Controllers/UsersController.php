<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Store;
use App\Models\Student;
use App\Models\User;
use App\Models\UserStore;
use App\Models\Course;
use App\Models\PurchasedCourse;
use App\Models\StoreThemeSettings;
use App\Models\StudentCourseAccess;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Notification;
use App\Notifications\StudentRegistrationNotification;
use App\Jobs\SendStudentRegistrationNotifications;
use App\Mail\NewUser;

// use App\Jobs\ProcessImportStudents;

class UsersController extends Controller
{
    public function __construct()
    {
        \App::setLocale(\Auth::user()->lang);
    }
    
    public function index() {
        $user = Auth::user()->current_store;
        $students = Student::where('store_id', $user)->paginate(15);
        
        return view('users.index', compact('students'));
    }

    public function create() {
        $user = Auth::user()->current_store;
        $courses = Course::where('store_id', $user)->get();
        return view('users.create', compact('courses'));
    }

    public function store(Request $request) {
        $user = Auth::user()->current_store;
        $student = new Student();
        $students = Student::where('store_id', $user)->get();
        $store = Store::find($user);
        $theme_settings = StoreThemeSettings::where('store_id', $user)->get();

        $validator = \Validator::make(
            //$request->all(),['email' => 'required|email|unique:users',]
            $request->all(),['email' => 'required|email',]
        );
        if($validator->fails())
        {
            echo $messages = $validator->getMessageBag();
            return redirect()->back()->with('error',$messages->first());
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->taxpayer = $request->taxpayer;
        $student->status = isset($request->status) ? 'on' : 'off';
        $student->password = Hash::make($request->password);
        $student->store_id = $user;

        $student->save();

        $courses = $request->courses;

        if(!empty($courses)){
            foreach($courses as $course_id){
                PurchasedCourse::firstOrCreate(['student_id' => $student->id,'course_id' => $course_id,'order_id' => '']);
                StudentCourseAccess::firstOrCreate(['student_id' => $student->id,'course_id' => $course_id,'unlocked_date' => date('Y-m-d'),'is_unlocked' => 0]);
            }
        }

        Mail::send(new NewUser($student, $store, $request->password));

        return redirect()->route('users.index', compact('students'))->with('success', __('User created successfully!'));
    }

    public function edit($id) {
        $user = Auth::user()->current_store;
        $student = Student::find(Crypt::decrypt($id));
        $students = Student::where('store_id', $user)->get();
        $student_id = $student->id;

        $courses = \DB::table('courses')
            ->select('courses.*', 'purchased_courses.student_id')
            ->leftJoin('purchased_courses', function($join) use ($student_id) {
                $join->on('courses.id', '=', 'purchased_courses.course_id')
                    ->where('purchased_courses.student_id', '=', $student_id);
                })
            ->where('store_id', $user)
            ->where('created_by', \Auth::user()->creatorId())
            ->get();

        return view('users.edit', compact('student', 'courses'));
    }

    public function update(Request $request, $id) {
        $user = Auth::user()->current_store;
        $student = Student::find(Crypt::decrypt($id));
        $students = Student::where('store_id', $user)->get();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->taxpayer = $request->taxpayer;
        $student->status = isset($request->status) ? 'on' : 'off';
        $student->phone_number = $request->phone_number;

        $student->update();
        return redirect()->route('users.index', compact('students'))->with('success', __('User updated successfully!'));
    }

    public function updatePassword(Request $request, $id) {
        $student = Student::find(Crypt::decrypt($id));

        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        if($validator->fails()){
            return back()->withInput()->with('error', 'Invalid password!');
        }
        $student->password = Hash::make($request->password);
        $student->update();

        return redirect()->back()->with('success', __('Password updated successfully.'));
    }

    public function searchUser(Request $request){
        $user = Auth::user()->current_store;
        $search_query = $request->search_query;
        $students = Student::where('store_id', $user)
            ->where(function($query) use ($search_query) {
                $query->where('name', 'LIKE', "%{$search_query}%")
                      ->orWhere('email', 'LIKE', "%{$search_query}%");
            })->paginate(15);


        if($students->count() >= 1){
            return view('users.pagination', compact('students'))->render();
        }
    }

    public function actionUser(Request $request)
    {
        $user = Auth::user()->current_store;

        if($request->type == 'delete'){
            Student::whereIn('id', $request->ids)->delete();
            StudentCourseAccess::whereIn('student_id', $request->ids)->delete();
            PurchasedCourse::whereIn('student_id', $request->ids)->delete();
        }else{
            Student::whereIn('id', $request->ids)->update(['status' => 'off']);
        }

        $students = Student::where('store_id', Auth::user()->current_store)->paginate(15);

        return view('users.pagination', compact('students'))->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        StudentCourseAccess::where('student_id', $student->id)->delete();
        PurchasedCourse::where('student_id', $student->id)->delete();
        StudentCourseAccess::where('student_id', $student->id)->delete();
        
        return redirect()->back()->with('success', __('User deleted successfully.'));
    }

    public function coursesupdate(Request $request, $id) {
        $student = Student::find(Crypt::decrypt($id));
        $courses = $request->courses;
        //$expires_at = $request->access__duration !== 'lifetime' ? date('Y-m-d', strtotime('+'.$request->access__duration.' days')) : date('Y-m-d', strtotime('+100 years'));
        $expires_at = $request->access_duration;

        if(isset($request->same_last_expires)){
            $expires_date = PurchasedCourse::where('student_id', $student->id)->latest()->first();
            $expires_at = $expires_date->expires_at;
        }

        $payment_type = $request->access__duration !== 'lifetime' ? 'recurrency' : 'lifetime';

        if(!empty($courses)){
            foreach($courses as $course_id){
                PurchasedCourse::updateOrInsert(['student_id' => $student->id,'course_id' => $course_id],['order_id' => '', 'expires_at' => $expires_at, 'payment_type' => $payment_type, 'payment_status' => 'paid', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
                StudentCourseAccess::updateOrInsert(
                    ['student_id' => $student->id,'course_id' => $course_id],
                    ['unlocked_date' => date('Y-m-d'),'is_unlocked' => 0]
                );
            }

            $PurchasedCourse = PurchasedCourse::where('student_id', $student->id);
            $studentCourseAccess = StudentCourseAccess::where('student_id', $student->id);

            $PurchasedCourse->whereNotIn('course_id', $courses)->delete();
            $studentCourseAccess->whereNotIn('course_id', $courses)->delete();
        }else{
            PurchasedCourse::where('student_id', $student->id)->delete();
            StudentCourseAccess::where('student_id', $student->id)->delete();
        }
        return redirect()->back()->with('success', __('courses updated successfully!'));
    }

    public function import() {
        return view('users.import');
    }

    public function export()
    {
        $name = 'user_' . date('Y-m-d i:h:s');
        $data = Excel::download(new StudentsExport(), $name . '.xlsx');ob_end_clean();

        return $data;
    }
    

    public function storeImport(Request $request) 
    {
        $expires_at = $request->access__duration !== 'lifetime' ? date('Y-m-d', strtotime('+'.$request->access__duration.' days')) : date('Y-m-d', strtotime('+100 years'));
        $payment_type = $request->access__duration !== 'lifetime' ? 'recurrency' : 'lifetime';
        $store = Store::find(Auth::user()->current_store);
        $courses = Course::where('store_id', $store->id)->get();
        $file = fopen($_FILES['file']['tmp_name'], 'r');
        $headers = fgetcsv($file);

        while ($row = fgetcsv($file)) {
            DB::beginTransaction();

            $student = new Student();
            $columns = array('name', 'email', 'phone_number', 'doc');
            foreach ($columns as $key => $column) {
                if (isset($this->row[$key])) {
                    if($column == 'doc'){
                        $student->taxpayer = $this->row[$key];
                    }else {
                        $student->$column = $this->row[$key];
                    }
                }
            }
            $pswd = Utility::rand_string(8);

            $student_exists = Student::where('store_id', $store->id)->where('email', $row[1])->pluck('id')->toArray();

            $student = Student::firstOrCreate(
                ['email' => $row[1], 'store_id' => $store->id],
                ['name' => $row[0], 'phone_number' => $row[2], 'taxpayer' => $row[3], 'status' => 'on', 'password' => Hash::make($pswd)]
            );

            $studentID = $student->id;

            if($request->enable_all_courses == 'on'){
                $purchasedCourses = [];
                $studentCourseAccesses = [];

                foreach ($courses as $course) {
                    $purchasedCourseData = [
                        'student_id' => $student->id,
                        'course_id' => $course->id,
                        'order_id' => '', 
                        'payment_status' => 'approved',
                        'payment_type' => $payment_type,
                        'start_date' => Carbon::now(),
                        'expires_at' => $expires_at,
                        'created_at' => Carbon::now()->toDateTimeString(),
                    ];
            
                    $existing = PurchasedCourse::where('student_id', $student->id)
                        ->where('course_id', $course->id)
                        ->first();
                    
                    if ($existing) {
                        $existing->update($purchasedCourseData);
                    } else {
                        $purchasedCourses[] = $purchasedCourseData;
                    }

                    $studentCourseAccessData = [
                        'student_id' => $student->id,
                        'course_id' => $course->id,
                        'unlocked_date' => date('Y-m-d'),
                        'is_unlocked' => 0,
                        'created_at' => Carbon::now()->toDateTimeString(),
                    ];

                    $existing_course_access = StudentCourseAccess::where('student_id', $student->id)
                        ->where('course_id', $course->id)
                        ->first();

                    if ($existing_course_access) {
                        $existing_course_access->update($studentCourseAccessData);
                    } else {
                        $studentCourseAccesses[] = $studentCourseAccessData;
                    }
                }

                if (!empty($purchasedCourses)) {
                    PurchasedCourse::insert($purchasedCourses);
                }

                if (!empty($studentCourseAccesses)) {
                    StudentCourseAccess::insert($studentCourseAccesses);
                }
            }

            if(empty($student_exists)){
                Notification::send($student, new StudentRegistrationNotification($student, $store, $pswd));
            }
            
            DB::commit();
        }

        return redirect()->back()->with('success', __('User(s) created successfully!'));
    }

    public function resendStudent(Request $request){
        $student = Student::find($request->student);
        $store = Store::find(Auth::user()->current_store);
        $pswd = Utility::rand_string(8);

        $student->password = Hash::make($pswd);
        $student->update();

        Notification::send($student, new StudentRegistrationNotification($student, $store, $pswd));

        return redirect()->back()->with('success', __('User(s) notified successfully!'));
    }
}
