<?php

namespace App\Http\Controllers;
use App\Http\Controllers\webhooks\Ticto;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\webhooks\Doppus;
use App\Http\Controllers\webhooks\Hotmart;
use App\Http\Controllers\webhooks\Kiwify;
use App\Http\Controllers\webhooks\PerfectPay;
use App\Http\Controllers\webhooks\Yampi;

use App\Models\Integration;
use App\Models\IntegrationPlatform;
use App\Models\IntegrationProduct;
use App\Models\PurchasedCourse;
use App\Models\Store;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use App\Mail\NewUser;
use Illuminate\Support\Facades\Mail;

class WHookController extends Controller
{
    public function statusEnum($value){
		return $value === "approved";
	}

    public function purchaseCourses($student_id, $courses, $order){
        foreach ($courses as $course) {
            PurchasedCourse::firstOrCreate([
                'student_id' => $student_id,
                'course_id' => $course,
                'order_id' => $order
            ]);
        }
    }

    public function Api($endpoint, $authorization, $id){
        $url = "https://rocketpays.app/api/rocketmember/";
        $headers = [
            'Authorization: Bearer ' . $authorization,
        ];

        $options = [
            'http' => [
                'method' => 'GET',
                'header' => implode("\r\n", $headers),
                'Accept' => 'application/json',
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url . $endpoint.'/'. $id, false, $context);

        return json_decode($result);
    }

    public function webhk(Request $request){
        $h = fopen(base_path('logs/rocketpay.txt'), 'a+'); fwrite($h, json_encode($request->all())."\n"); fclose($h);
        $authorization = substr(getallheaders()['Authorization'] ?? '', 7);
        $body = json_decode(file_get_contents("php://input"));

        if ($authorization <> "95ca9a6b8745856328a67e3452d820e7") die("Credenciais inválidas.");

        if ($body->status == 'approved'){
            $customer_id = $body->customer_id;
            $product_id = $body->product_id;
            $order_id = $body->order_id;
            $products = IntegrationProduct::where('platform_product_id', $product_id)->first();
            $integration = Integration::where('id', $products->integration_id)->first();
            $store = Store::where('id', $integration->user_id)->first();

            if(empty($products)) die("Produto não encontrado");

            $customer = $this->Api('customer', $authorization, $customer_id);
            $customer_data = $customer->data;

            if($customer->status == 'success'){
                $student = Student::where('email', $customer_data->email)->where('store_id', $integration->user_id)->first();
                if(!empty($student)){
                    if(!empty($products)){
                        $this->purchaseCourses($student->id, $products->courses, $order_id);
                    }

                    //Mail::send(new NewUser($student, $store));
                }else{
                    $new_student = new Student();
                    $new_student->name = $customer_data->name;
                    $new_student->email = $customer_data->email;
                    $new_student->password = Hash::make($customer_data->doc);
                    $new_student->phone_number = $customer_data->phone;
                    $new_student->taxpayer = $customer_data->doc;
                    $new_student->store_id = $integration->user_id;
                    $new_student->status = 'on';
                    $new_student->save();

                    if(!empty($products)){
                        $this->purchaseCourses($new_student->id, $products->courses, $order_id);
                    }

                    Mail::send(new NewUser($new_student, $store, $new_student->taxpayer));
                }
            };

            $info = [
                'customer_id' => $customer_id,
                'product_id' => $product_id,
                'order_id' => $order_id
            ];

            return (Object) $info;

        }

        else if($body->status == 'canceled') {
        }
    }


    public function PlatformWebhook (Request $request, $hash) {

        $integration = Integration::where('hash', $hash)->first();
        if(empty($integration)) die('Não existe uma integração com esta url');

        $platform = IntegrationPlatform::where('id', $integration->integration_platform_id)->first();
        $body = json_decode(file_get_contents("php://input"));
        $token = Crypt::decryptString($integration->keys);

        if($platform->slug == 'doppus'){
            $authorization = getallheaders()['Doppus-Token'] ?? '';

            if($authorization != $token) die('Credenciais inválidas');

            $processor = new Doppus();
        }

        if($platform->slug == 'hotmart') {
            $getAuth = getallheaders();
            $authorization = getallheaders()['X-Hotmart-Hottok'] ?? '';
            if($authorization != $token){
                $h = fopen(base_path('logs/hotmart_auth.txt'), 'a+'); fwrite($h, json_encode($getAuth)."\n"); fclose($h);
            }
            if($authorization != $token) die('Credenciais inválidas');

            $processor = new Hotmart();
        }

        if($platform->slug == 'kiwify') {
            // $signature = isset($_GET['signature']) ? trim($_GET['signature']) : '';
            // $calculatedSignature = hash_hmac('sha1', json_encode($body), $token);

            // if ($signature !== $calculatedSignature) {

            //     http_response_code(400);
            //     header('Content-Type: application/json');
            //     echo json_encode(['error' => 'Incorrect signature']);
            //     exit();
            // }
            $processor = new Kiwify();
        }

        if($platform->slug == 'perfectpay'){
            if($body->token != $token) die('Credenciais inválidas');

            $processor = new PerfectPay();
        }

        if($platform->slug == 'yampi'){
            $processor = new Yampi();
        }

        if($platform->slug == 'ticto')
        {
            if($body->token != $token) die('Credenciais inválidas');
            $processor = new Ticto();
        }


        $result = $processor->ProcessData($body, $integration);

        return $result;
    }
}
