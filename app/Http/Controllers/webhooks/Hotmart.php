<?php
namespace App\Http\Controllers\webhooks;

use App\Models\IntegrationProduct;
use App\Models\PurchasedCourse;
use App\Models\Store;
use App\Models\Student;
use App\Models\User;
use App\Models\Utility;
use App\Models\StudentCourseAccess;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use App\Mail\NewUser;
use Illuminate\Support\Facades\Mail;

class Hotmart {
    public function statusEnum($value){
		return $value === "PURCHASE_APPROVED";
	}

    public function purchaseCourses($student_id, $courses, $order){
        foreach ($courses as $course) {
            PurchasedCourse::firstOrCreate(['student_id' => $student_id, 'course_id' => $course],['order_id' => $order, 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
            $unlock_date = Utility::unlockCourseByActualDate($student_id, $course);
            if($unlock_date == null) $unlock_date = Carbon::now();
            StudentCourseAccess::firstOrCreate(['student_id' => $student_id,'course_id' => $course,'unlocked_date' => $unlock_date,'is_unlocked' => 1]);
        }
    }

    public function ProcessData($data, $integration) {
        $h = fopen(base_path('logs/hotmart.txt'), 'a+'); fwrite($h, json_encode($data)."\n"); fclose($h);

        $status = $this->statusEnum($data->event);
        $products = IntegrationProduct::where('integration_id', $integration->id)->first();

        if($status == 'PURCHASE_APPROVED') {
            $student = Student::where('email', $data->data->buyer->email)->where('store_id', $integration->user_id)->first();

            if($products->platform_product_id != $data->data->product->id) die('ID do produto não confere');

            if(!empty($student)){
                if(!empty($products)){
                    $this->purchaseCourses($student->id, $products->courses, $data->id);
                }
            }else{
                $store = Store::where('id', $integration->user_id)->first();
                $pswd = substr(hash('sha256', random_bytes(10)), 0, 10);

                $new_student = new Student();
                $new_student->name = $data->data->buyer->name;
                $new_student->email = $data->data->buyer->email;
                $new_student->password = Hash::make($pswd);
                $new_student->phone_number = $data->data->buyer->checkout_phone;
                $new_student->taxpayer = '';
                $new_student->store_id = $integration->user_id;
                $new_student->status = 'on';
                $new_student->save();

                if(!empty($products)){
                    $this->purchaseCourses($new_student->id, $products->courses, $data->id);
                }

                Mail::send(new NewUser($new_student, $store, $pswd));
            }
        }else{}

        $info = [
            'customer_name' => $data->data->buyer->name,
            'transaction_id' => $data->id
        ];

        return (Object) $info;
    }
}