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
use Illuminate\Support\Facades\Hash;

use App\Mail\NewUser;
use Illuminate\Support\Facades\Mail;

class Yampi {
    public function statusEnum($value){
		return $value === "paid";
	}

    public function purchaseCourses($student_id, $courses, $order){
        foreach ($courses as $course) {
            PurchasedCourse::firstOrCreate([
                'student_id' => $student_id,
                'course_id' => $course,
                'order_id' => $order
            ]);
            $unlock_date = Utility::calculateDateToUnlockCourse($student_id, $course);
            StudentCourseAccess::firstOrCreate(['student_id' => $student_id,'course_id' => $course,'unlocked_date' => $unlock_date,'is_unlocked' => 1]);
        }
    }

    public function ProcessData($data, $integration) {
        $h = fopen(base_path('logs/yampi.txt'), 'a+'); fwrite($h, json_encode($data)."\n"); fclose($h);

        $status = $this->statusEnum($data->resource->status->data->alias);
        $products = IntegrationProduct::where('integration_id', $integration->id)->first();

        if($status == 'paid') {
            $student = Student::where('email', $data->resource->customer->data->email)->where('store_id', $integration->user_id)->first();

            if($products->platform_product_id != $data->resource->items->data[0]->product_id) die('ID do produto não confere');

            if(!empty($student)){
                if(!empty($products)){
                    $this->purchaseCourses($student->id, $products->courses, $data->resource->transactions->data[0]->id);
                }
            }else{
                $store = Store::where('id', $integration->user_id)->first();

                $new_student = new Student();
                $new_student->name = $data->resource->customer->data->name;
                $new_student->email = $data->resource->customer->data->email;
                $new_student->password = Hash::make($data->resource->customer->data->cpf);
                $new_student->phone_number = $data->resource->customer->data->phone->number;
                $new_student->taxpayer = $data->resource->customer->data->cpf;
                $new_student->store_id = $integration->user_id;
                $new_student->status = 'on';
                $new_student->save();

                if(!empty($products)){
                    $this->purchaseCourses($new_student->id, $products->courses, $data->resource->transactions->data[0]->id);
                }

                Mail::send(new NewUser($new_student, $store, $new_student->taxpayer));
            }
        }else{}

        $info = [
            'customer_name' => $data->resource->customer->data->name,
            'transaction_id' => $data->resource->transactions->data[0]->id
        ];

        return (Object) $info;
    }
}