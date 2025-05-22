<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Store;
use App\Models\Student;
use App\Models\User;
use App\Models\UserStore;
use App\Models\Course;
use App\Models\PurchasedCourse;
use App\Models\StudentCourseAccess;
use App\Models\Utility;
use Illuminate\Support\Facades\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use App\Notifications\StudentRegistrationNotification;

class SendStudentRegistrationNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    // public function handle()
    // {
    //     $store = Store::find(50);

    //     $students = Student::where('store_id', $store->id)->where('created_at', '>=', '2023-09-14 16:22:01')->get();

    //     foreach($students as $student){
    //         $pswd = Utility::rand_string(8);
    //         $student->password = Hash::make($pswd);
    //         $student->updated_at = Carbon::now();
    //         $student->save();

    //         Notification::send($student, new StudentRegistrationNotification($student, $store, $pswd));
    //     }
    // }
}
