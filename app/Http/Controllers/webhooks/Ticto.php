<?php

namespace App\Http\Controllers\webhooks;

use App\Jobs\RegisterStudentPurchasedCourses;
use App\Models\Course;
use App\Models\IntegrationProduct;
use App\Models\PurchasedCourse;
use App\Models\Store;
use App\Models\Student;
use App\Models\User;
use App\Models\Utility;
use App\Models\StudentCourseAccess;
use App\Notifications\StudentRegistrationNotification;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use App\Mail\NewUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use phpDocumentor\Reflection\Types\Array_;

class Ticto
{
    /**
     * @param $value
     * @return bool
     */
    public function statusEnum($value): bool
    {
        return $value === "authorized";
    }

    /**
     * @param $student_id
     * @param $courses
     * @param $order
     * @return void
     */
    public function purchaseCourses($student_id, $courses, $order): void
    {
        foreach ($courses as $course) {
            PurchasedCourse::firstOrCreate(['student_id' => $student_id, 'course_id' => $course],['order_id' => $order, 'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
            $unlock_date = Utility::unlockCourseByActualDate($student_id, $course);
            if($unlock_date == null) $unlock_date = Carbon::now();
            StudentCourseAccess::firstOrCreate(['student_id' => $student_id,'course_id' => $course,'unlocked_date' => $unlock_date,'is_unlocked' => 1]);
        }
    }

    /**
     * @param $array
     * @return stdClass|mixed
     */
    public function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }

        $object = new \stdClass();
        foreach ($array as $key => $value) {
            $object->$key = $this->arrayToObject($value);
        }
        return $object;
    }

    /**
     * @param $value
     * @return string|void
     */
    public function isRecurrence($value){
        if(!empty($value)) return 'recurrency';
    }

    /**
     * @param $value
     * @return string|void
     */
    public function isLifetime($value){
        if(!empty($value)) return 'lifetime';
    }

    /**
     * @param $store_id
     * @return Array
     * Return all courses from specific store
     */
    public function getAllCourses($store_id): Array{
        return Course::where('store_id', $store_id)->pluck('id')->toArray();
    }

    /**
     * @param $data
     * @return Array
     */
    public function formatData($data): Array
    {
        return [
            'code' => $data->order->id,
            'product' => [
                'code' => $data->item->product_id
            ],
            'sale_status_detail' => $data->status,
            'payment_type' => $data->payment_method,
            'subscription' => [
                'next_charge_date' => date('Y-m-d H:i:s', strtotime('+' . $data->subscriptions[0]->interval . 'months', strtotime($data->status_date)))
            ]
        ];
    }

    /**
     * @param $data
     * @param $integration
     * @return object|void
     */
    public function ProcessData($data, $integration)
    {
        $h = fopen(base_path('logs/ticto.txt'), 'a+'); fwrite($h, json_encode($data)."\n"); fclose($h);

        $status = $this->statusEnum($data->status);
        $products = IntegrationProduct::where('integration_id', $integration->id)->first();
        $courses = $products->courses;

        if($courses == "all"){
            $courses = $this->getAllCourses($integration->user_id);
        }

        $info = [
            'name' => $data->customer->name,
            'email' => $data->customer->email,
            'product_id' => $data->item->product_id,
            'phone_customer' => $data->phone_number_customer,
            'doc' => $data->customer->cpf,
            'order' => $data->order->id,
            'transaction_id' => $data->transaction->hash
        ];

        if($status == 'approved') {
//            $payment_type = $this->isRecurrence($info['subscriptions']) ?? $this->isLifetime($info['sales']);
            $student = Student::where('email', $info['email'])
                ->where('store_id', $integration->user_id)->first();

            if($products->platform_product_id != $info['product_id']) die('ID do produto não confere');

            $purchase_data = $this->arrayToObject($this->formatData($data));

            if(!empty($student)){
                if(!empty($products)){
                    dispatch(new RegisterStudentPurchasedCourses($student->id, $courses, $purchase_data, 'recurrency'));
                }
            }else{
                $store = Store::where('id', $integration->user_id)->first();
                $pswd = substr(hash('sha256', random_bytes(10)), 0, 10);

                $new_student = new Student();
                $new_student->name = $info['name'];
                $new_student->email = $info['email'];
                $new_student->password = Hash::make($pswd);
                $new_student->phone_number = $info['phone_customer'];
                $new_student->taxpayer = $info['doc'];
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
                    dispatch(new RegisterStudentPurchasedCourses($new_student->id, $courses, $purchase_data, 'recurrency'));
                }

                Mail::send(new NewUser($new_student, $store, $pswd));
            }
        }

        $info = [
            'customer_name' => $info['name'],
            'transaction_id' => $info['transaction_id']
        ];

        return (Object) $info;
    }
}


