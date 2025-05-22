<?php
namespace App\Http\Controllers\webhooks;

use App\Models\Course;
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

use Illuminate\Support\Facades\Notification;
use App\Notifications\StudentRegistrationNotification;
use App\Jobs\SendStudentRegistrationNotifications;
use App\Jobs\RegisterStudentPurchasedCourses;

class PerfectPay {
    public function statusEnum($value){
		return $value == 2;
	}

    public function isRecurrence($value){
        if(!empty($value)) return 'recurrency';
    }

    public function isLifetime($value){
        if(!empty($value)) return 'lifetime';
    }

    public function getAllCourses($store_id): Array{
        return Course::where('store_id', $store_id)->pluck('id')->toArray();
    }

    public function ProcessData($data, $integration) {
        $h = fopen(base_path('logs/perfectpay.txt'), 'a+'); fwrite($h, json_encode($data)."\n"); fclose($h);

        $status = $this->statusEnum($data->sale_status_enum);
        $products = IntegrationProduct::where('integration_id', $integration->id)->first();
        $courses = $products->courses;

        if($courses == "all"){
            $courses = $this->getAllCourses($integration->user_id);
        }

        if($data->sale_status_enum == 2) {
            $payment_type = $this->isRecurrence($data->subscription) ?? $this->isLifetime($data->sales);
            $student = Student::where('email', $data->customer->email)->where('store_id', $integration->user_id)->first();

            if($products->platform_product_id != $data->product->code) die('ID do produto não confere');

            if(!empty($student)){
                if(!empty($products)){
                    dispatch(new RegisterStudentPurchasedCourses($student->id, $courses, $data, $payment_type));
                }
            }else{
                $store = Store::where('id', $integration->user_id)->first();

                $new_student = new Student();
                $new_student->name = $data->customer->full_name;
                $new_student->email = $data->customer->email;
                $new_student->password = Hash::make($data->customer->identification_number);
                $new_student->phone_number = $data->customer->phone_number;
                $new_student->taxpayer = $data->customer->identification_number;
                $new_student->store_id = $integration->user_id;
                $new_student->status = 'on';
                $new_student->save();
                
                try {
                    Notification::send($new_student, new StudentRegistrationNotification($new_student, $store, $new_student->taxpayer));
                    \Log::info('Notificação enviada com sucesso para: ' . $new_student->email);
                } catch (\Exception $e) {
                    \Log::error('Erro ao enviar notificação para: ' . $new_student->email . '. Detalhes: ' . $e->getMessage());
                }

                if(!empty($products)){
                    dispatch(new RegisterStudentPurchasedCourses($new_student->id, $courses, $data, $payment_type));
                }
            }
        }

        $info = [
            'customer_name' => $data->customer->full_name,
            'transaction_id' => $data->code
        ];

        return (Object) $info;
    }
}