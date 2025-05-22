<?php

namespace App\Jobs;

use App\Models\StudentCourseAccess;
use App\Models\PurchasedCourse;
use App\Models\Utility;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class RegisterStudentPurchasedCourses implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $student_id;
    public $courses;
    public $data;
    public $payment_type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student_id, $courses, $data, $payment_type)
    {
        $this->student_id = $student_id;
        $this->courses = $courses;
        $this->data = $data;
        $this->payment_type = $payment_type;
    }

    public function expireDate($value){
        if(!empty($value->subscription)) return $value->subscription->next_charge_date;
        else return Carbon::now()->addYears(100);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $expires_at = $this->expireDate($this->data);
        foreach ($this->courses as $course) {
            PurchasedCourse::updateOrCreate(
                ['student_id' => $this->student_id,'course_id' => $course],
                ['product_id' => $this->data->product->code, 'order_id' => $this->data->code, 'payment_status' => $this->data->sale_status_detail, 'payment_type' => $this->payment_type, 'start_date' => Carbon::now(), 'expires_at' => $expires_at, 'updated_at' => Carbon::now()]
            );

            $unlock_date = Utility::unlockCourseByActualDate($this->student_id, $course);
            if($unlock_date == null) $unlock_date = Carbon::now();
            StudentCourseAccess::firstOrCreate(['student_id' => $this->student_id,'course_id' => $course,'unlocked_date' => $unlock_date,'is_unlocked' => 1]);
        }
    }
}
