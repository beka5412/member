<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Store;
use App\Models\Plan;
use \Carbon\Carbon;
use App\Models\UserStore;

class RocketPanelController extends Controller
{
    
    /**
    * Encrypt
    *
    * @param Mixed $passphrase
    * @param Mixed $value
    * @return String
    */
    public function encrypt($passphrase, $value)
    {
        $salt = openssl_random_pseudo_bytes(8);
        $salted = '';
        $dx = '';

        while (strlen($salted) < 48)
        {
            $dx = md5($dx.$passphrase.$salt, true);
            $salted .= $dx;
        }

        $key = substr($salted, 0, 32);
        $iv  = substr($salted, 32,16);

        $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
        $data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));
        return json_encode($data);
    }

    /**
    * Decrypt
    *
    * @param Mixed $passphrase
    * @param Mixed $jsonString
    * @return Mixed
    */
    public function decrypt($passphrase, $jsonString)
    {
        $jsondata = json_decode($jsonString, true);
        $salt = hex2bin($jsondata["s"]);
        $ct = base64_decode($jsondata["ct"]);
        $iv  = hex2bin($jsondata["iv"]);
        $concatedPassphrase = $passphrase.$salt;
        $md5 = array();
        $md5[0] = md5($concatedPassphrase, true);
        $result = $md5[0];
        for ($i = 1; $i < 3; $i++)
        {
            $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
            $result .= $md5[$i];
        }
        $key = substr($result, 0, 32);
        $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
        return json_decode($data, true);
    }

    /**
     * Autenticacao das requisicoes
     * 
     * @return Bool
     */
    protected function authMiddleware(Request $request) : Bool
    {
        $authorization = $request->header('Authorization');
        $authorization = str_replace("Basic ", "", $authorization);
        $aux = explode(":", base64_decode($authorization));
        $user = $aux[0] ?? '';
        $password = $aux[1] ?? '';

        if ($user <> env('PLATFORMS_AUTOLOGIN_USER') || $password <> env('PLATFORMS_AUTOLOGIN_PASS')) 
            return false;

        return true;
    }

    /**
     * Recebe evento de compra aprovada via o wizard
     * Funcao: registrar usuário
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) : \Illuminate\Http\JsonResponse
    {
       if (!$this->authMiddleware($request)) return response()->json(['status' => 'error', 'message' => 'Access denied.']);

        $body = json_decode($request->getContent());

        $email = strtolower($body->user->email ?? '');
        $name = $body->user->name ?? '';
        
        if (empty($email)) return response()->json(['status' => 'error', 'message' => 'Empty email.']);

        $user = User::where('email', $email)->first();
        $user_by_rp = User::where('email', $email)->where('created_by_rocket_panel', 1)->first();
        $was_created_by_RocketPanel = !empty($user_by_rp);

        $ghash = $access_token = Hash::make(rand(0,99999999999).uniqid().microtime().base64_decode('w4cgXiFAICAgICAgIC0+ICVhIDB4MDAwMDAwMGNmIDAwMDEgMDAxMCAwMDExIDAxMDAgMDEwMSAwMTEwIDAxMTEgw6cgYHshQA=='));
        $password = Hash::make(rand(0,9).rand(0,9).rand(0,9).(time()-1709).rand(0,9));

        $type = 'Owner';

        $user_data = compact(
            'email',
            'name',
            'password',
            'access_token',
            'type'
        );

        $user_data['created_by_rocket_panel'] = 1;

        $registered_now = false;

        // se o e-mail nao existe
        if (empty($user))
        {
            // criar uma conta nova utilizando o e-mail que veio da requisicao
            // echo "se o e-mail nao existe $email";

            $user = User::create($user_data);
            $registered_now = true;

            // vincular ao plano
        }

        // o e-mail existe e foi criado via RocketPanel
        else if (!empty($user) && $was_created_by_RocketPanel)
        {
            // echo "O e-mail existe e foi criado via RocketPanel";
            
            $user_data['email'] = "user_" . sha1(uniqid()) . "@rocketmember.app";
            $user_data['access_token'] = $ghash;
            $user = User::create($user_data);
            $access_token = $user->access_token ?? '';
            $registered_now = true;
        }

        // O e-mail existe mas nao foi criado via RocketPanel
        else if (!empty($user) && !$was_created_by_RocketPanel)
        {
            // criar uma conta nova com um e-mail aleatorio, ex.: user_0e0e0e000eff0f0f0c0c0c00c011f@email.com
            // echo "O e-mail existe mas nao foi criado via RocketPanel";

            $user_data['email'] = "user_" . sha1(uniqid()) . "@rocketmember.app";
            $user_data['access_token'] = $ghash;
            $user = User::create($user_data);
            $access_token = $user->access_token ?? '';
            $registered_now = true;

            // vincular ao plano
        }

        if (empty($user)) return response()->json(['status' => 'error', 'message' => 'User not found.']);

        
        /**
         * Example
         */

        $total = $body->meta->platform->price;
        $members_qty = 0;
        $memberships_qty = 0;
        foreach ($body->meta->items as $row)
        {
            if ($row->item->name == 'members_qty') $members_qty = $row->item->qty;
            else if ($row->item->name == 'memberships_qty') $memberships_qty = $row->item->qty;
            $total += $row->item->price;
        }

        // $plan = Plan::where('memberships_qty', $memberships_qty)->where('members_qty', $members_qty)->first();
        // TODO ...
        
        $store = new Store;
        $store->name = 'My Store';
        $store->email = $user->email;
        $store->store_theme = 'yellow-style.css';
        $store->theme_dir = 'theme1';
        $store->domains = null;
        $store->enable_storelink = 'on';
        $store->enable_subdomain = null;
        $store->subdomain = null;
        $store->enable_domain = 'off';
        $store->header_name = null;
        $store->about = null;
        $store->tagline = null;
        $store->slug = time();
        $store->lang = 'en';
        $store->storejs = null;
        $store->currency = '$';
        $store->currency_code = 'USD';
        $store->currency_symbol_position = 'pre';
        $store->currency_symbol_space = 'without';
        $store->certificate_gradiant = null;
        $store->certificate_color = null;
        $store->certificate_template = null;
        $store->whatsapp = '#';
        $store->facebook = '#';
        $store->instagram = '#';
        $store->twitter = '#';
        $store->youtube = '#';
        $store->google_analytic = null;
        $store->fbpixel = null;
        $store->footer_note = '© '.date('Y').' Web3Studio. All rights reserved';
        $store->enable_header_img = 'on';
        $store->header_img = 'img-15.jpg';
        $store->header_title = 'Home Accessories';
        $store->header_desc = 'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.';
        $store->button_text = 'Start shopping';
        $store->enable_subscriber = 'on';
        $store->enable_rating = 'on';
        $store->blog_enable = 'on';
        $store->enable_shipping = 'on';
        $store->sub_img = null;
        $store->subscriber_title = 'Always on time';
        $store->sub_title = 'Subscription here';
        $store->address = null;
        $store->zoom_apisecret = '';
        $store->zoom_apikey = '';
        $store->city = null;
        $store->state = null;
        $store->zipcode = null;
        $store->country = null;
        $store->logo = 'logo.png';
        $store->invoice_logo = null;
        $store->is_stripe_enabled = 'off';
        $store->stripe_key = null;
        $store->stripe_secret = null;
        $store->is_paypal_enabled = 'off';
        $store->paypal_mode = null;
        $store->paypal_client_id = null;
        $store->paypal_secret_key = null;
        $store->mail_driver = null;
        $store->mail_host = null;
        $store->mail_port = null;
        $store->mail_username = null;
        $store->mail_password = null;
        $store->mail_encryption = null;
        $store->mail_from_address = null;
        $store->mail_from_name = null;
        $store->is_active = '1';
        $store->created_by = '2';
        $store->enable_whatsapp = 'off';
        $store->whatsapp_number = null;
        $store->enable_cod = 'off';
        $store->enable_bank = 'off';
        $store->bank_number = null;
        $store->enable_header_section_img = null;
        $store->header_section_img = null;
        $store->header_section_title = null;
        $store->header_section_desc = null;
        $store->button_section_text = null;
        $store->created_at = Carbon::now()->toDateTimeString();
        $store->updated_at = Carbon::now()->toDateTimeString();
        $store->save();
            
        $userstore = new UserStore;
        $userstore->user_id = $user->id;
        $userstore->store_id = $store->id;
        $userstore->permission = 'Owner';
        $userstore->is_active = 1;
        $userstore->save();

        $user->current_store = $store->id;
        $user->save();

        // retornar o token de acesso
        return response()->json([
            'status' => 'success',
            'email' => $user->email,
            'registered_now' => $registered_now,
            'access_token' => $access_token
        ]);
    }
    

    /**
     * Recebe evento de compra aprovada via o checkout
     * Funcao: registrar usuário
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkout_register(Request $request) : \Illuminate\Http\JsonResponse
    {
       if (!$this->authMiddleware($request)) return response()->json(['status' => 'error', 'message' => 'Access denied.']);

        $body = json_decode($request->getContent());

        $email = strtolower($body->user->email ?? '');
        $name = $body->user->name ?? '';
        
        if (empty($email)) return response()->json(['status' => 'error', 'message' => 'Empty email.']);

        $user = User::where('email', $email)->first();
        $user_by_rp = User::where('email', $email)->where('created_by_rocket_panel', 1)->first();
        $was_created_by_RocketPanel = !empty($user_by_rp);

        $ghash = $access_token = Hash::make(rand(0,99999999999).uniqid().microtime().base64_decode('w4cgXiFAICAgICAgIC0+ICVhIDB4MDAwMDAwMGNmIDAwMDEgMDAxMCAwMDExIDAxMDAgMDEwMSAwMTEwIDAxMTEgw6cgYHshQA=='));
        $password = Hash::make($body->user->password ?? rand(0,9).rand(0,9).rand(0,9).(time()-1709).rand(0,9));

        $type = 'Owner';

        $user_data = compact(
            'email',
            'name',
            'password',
            'access_token',
            'type'
        );

        $user_data['created_by_rocket_panel'] = 1;

        $registered_now = false;

        // se o e-mail nao existe
        // if (empty($user))
        // {
        //     // criar uma conta nova utilizando o e-mail que veio da requisicao
        //     // echo "se o e-mail nao existe $email";

        //     $user = User::create($user_data);
        //     $registered_now = true;

        //     // vincular ao plano
        // }

        // // o e-mail existe e foi criado via RocketPanel
        // else if (!empty($user) && $was_created_by_RocketPanel)
        // {
        //     // echo "O e-mail existe e foi criado via RocketPanel";
            
        //     $user_data['email'] = "user_" . sha1(uniqid()) . "@rocketmember.app";
        //     $user_data['access_token'] = $ghash;
        //     $user = User::create($user_data);
        //     $access_token = $user->access_token ?? '';
        //     $registered_now = true;
        // }

        // // O e-mail existe mas nao foi criado via RocketPanel
        // else if (!empty($user) && !$was_created_by_RocketPanel)
        // {
        //     // criar uma conta nova com um e-mail aleatorio, ex.: user_0e0e0e000eff0f0f0c0c0c00c011f@email.com
        //     // echo "O e-mail existe mas nao foi criado via RocketPanel";

        //     $user_data['email'] = "user_" . sha1(uniqid()) . "@rocketmember.app";
        //     $user_data['access_token'] = $ghash;
        //     $user = User::create($user_data);
        //     $access_token = $user->access_token ?? '';
        //     $registered_now = true;

        //     // vincular ao plano
        // }

        // if (empty($user)) return response()->json(['status' => 'error', 'message' => 'User not found.']);

        if (!empty($user)) return response()->json(['status' => 'error', 'message' => 'User already exists.']);

        $user = User::create($user_data);
        $user->user_id_rocket_panel = $body->user->user_id_rocket_panel ?? '';
        $registered_now = true;
        $plan_id = $body->plan_id ?? '';

        
        if (!$plan_id)
        {
            $total = $body->subscription->platform->price ?? 0;
            $members_qty = 0;
            $memberships_qty = 0;
            foreach ($body->meta->items as $row)
            {
                if ($row->item->name == 'members_qty') $members_qty = $row->item->qty;
                else if ($row->item->name == 'memberships_qty') $memberships_qty = $row->item->qty;
                $total += $row->item->price;
            }

            $plan = Plan::where('max_courses', $members_qty)->where('max_stores', $memberships_qty)->first();
            
            // caso nao encontre, criar um plano especifico desses recursos
            if (empty($plan))
            {
                $plan = new Plan;
                $plan->name = "RocketPanel_".uniqid();
                $plan->price = $total;
                $plan->duration = 'Unlimited';
                $plan->max_stores = $memberships_qty;
                $plan->max_courses = $members_qty;
                $plan->enable_custdomain = 'on';
                $plan->enable_custsubdomain = 'on';
                $plan->additional_page = 'on';
                $plan->blog = 'on';
                $plan->shipping_method = 'on';
                $plan->image = 'free_plan.png';
                $plan->description = 'For companies that need a robust full-featured time tracker'.
                $plan->save();
            }

            if (!empty($plan->id)) $plan_id = $plan->id;
        }

        if ($plan_id) $user->plan = $plan_id;
        $user->save();

        
        /**
         * Example
         */

        // $total = $body->meta->platform->price;
        // $members_qty = 0;
        // $memberships_qty = 0;
        // foreach ($body->meta->items as $row)
        // {
        //     if ($row->item->name == 'members_qty') $members_qty = $row->item->qty;
        //     else if ($row->item->name == 'memberships_qty') $memberships_qty = $row->item->qty;
        //     $total += $row->item->price;
        // }

        // $plan = Plan::where('memberships_qty', $memberships_qty)->where('members_qty', $members_qty)->first();
        // TODO ...
        
        $store = new Store;
        $store->name = 'My Store';
        $store->email = $user->email;
        $store->store_theme = 'yellow-style.css';
        $store->theme_dir = 'theme1';
        $store->domains = null;
        $store->enable_storelink = 'on';
        $store->enable_subdomain = null;
        $store->subdomain = null;
        $store->enable_domain = 'off';
        $store->header_name = null;
        $store->about = null;
        $store->tagline = null;
        $store->slug = time();
        $store->lang = 'en';
        $store->storejs = null;
        $store->currency = '$';
        $store->currency_code = 'USD';
        $store->currency_symbol_position = 'pre';
        $store->currency_symbol_space = 'without';
        $store->certificate_gradiant = null;
        $store->certificate_color = null;
        $store->certificate_template = null;
        $store->whatsapp = '#';
        $store->facebook = '#';
        $store->instagram = '#';
        $store->twitter = '#';
        $store->youtube = '#';
        $store->google_analytic = null;
        $store->fbpixel = null;
        $store->footer_note = '© '.date('Y').' Web3Studio. All rights reserved';
        $store->enable_header_img = 'on';
        $store->header_img = 'img-15.jpg';
        $store->header_title = 'Home Accessories';
        $store->header_desc = 'There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.';
        $store->button_text = 'Start shopping';
        $store->enable_subscriber = 'on';
        $store->enable_rating = 'on';
        $store->blog_enable = 'on';
        $store->enable_shipping = 'on';
        $store->sub_img = null;
        $store->subscriber_title = 'Always on time';
        $store->sub_title = 'Subscription here';
        $store->address = null;
        $store->zoom_apisecret = '';
        $store->zoom_apikey = '';
        $store->city = null;
        $store->state = null;
        $store->zipcode = null;
        $store->country = null;
        $store->logo = 'logo.png';
        $store->invoice_logo = null;
        $store->is_stripe_enabled = 'off';
        $store->stripe_key = null;
        $store->stripe_secret = null;
        $store->is_paypal_enabled = 'off';
        $store->paypal_mode = null;
        $store->paypal_client_id = null;
        $store->paypal_secret_key = null;
        $store->mail_driver = null;
        $store->mail_host = null;
        $store->mail_port = null;
        $store->mail_username = null;
        $store->mail_password = null;
        $store->mail_encryption = null;
        $store->mail_from_address = null;
        $store->mail_from_name = null;
        $store->is_active = '1';
        $store->created_by = '2';
        $store->enable_whatsapp = 'off';
        $store->whatsapp_number = null;
        $store->enable_cod = 'off';
        $store->enable_bank = 'off';
        $store->bank_number = null;
        $store->enable_header_section_img = null;
        $store->header_section_img = null;
        $store->header_section_title = null;
        $store->header_section_desc = null;
        $store->button_section_text = null;
        $store->created_at = Carbon::now()->toDateTimeString();
        $store->updated_at = Carbon::now()->toDateTimeString();
        $store->save();
            
        $userstore = new UserStore;
        $userstore->user_id = $user->id;
        $userstore->store_id = $store->id;
        $userstore->permission = 'Owner';
        $userstore->is_active = 1;
        $userstore->save();

        $user->current_store = $store->id;
        $user->save();

        // retornar o token de acesso
        return response()->json([
            'status' => 'success',
            'email' => $user->email,
            'registered_now' => $registered_now,
            'access_token' => $access_token
        ]);
    }
    
    /**
     * Acao de login na RocketZap via RocketPanel
     */
    public function login(Request $request)
    {
        if (!$this->authMiddleware($request)) return response()->json(['status' => 'error', 'message' => 'Access denied.']);

        $body = json_decode($request->getContent());
        $access_token = $body->access_token;
        $access_token_e = base64_encode($this->encrypt(env('PLATFORMS_AUTOLOGIN_PASS'), $access_token));
        $user = User::where('access_token', $access_token)->first();
        if (empty($user)) return response()->json(['status' => 'error', 'message' => 'User not found.']);
        
        return response()->json(['status' => 'success', 'url' => route('rocketpanel.auth').'?access_token='.$access_token_e]);
    }
    
    public function auth(Request $request)
    {
        $access_token = $request->get('access_token');
        $access_token = $this->decrypt(env('PLATFORMS_AUTOLOGIN_PASS'), base64_decode($access_token));
       
        $user = $access_token ? User::where('access_token', $access_token)->first() : null;
        if (!empty($user))
        {
            auth()->login($user);
            return redirect(route('dashboard'));
        }
        return redirect(url('/'));
    }

    public function cancel(Request $request)
    {
        $body = json_decode($request->getContent());
        $user = User::where('access_token', $body->access_token)->first();
        $user->status = 'expired';
        $user->save();
    }

    public function activate(Request $request)
    {
        $body = json_decode($request->getContent());
        $user = User::where('access_token', $body->access_token)->first();
        $user->status = 'active';
        $user->expires_at = $body->expires_at;
        $user->save();
    }

    public function checkout_update(Request $request)
    {
        $body = json_decode($request->getContent());
        $user = User::where('access_token', $body->access_token)->first();
        if (empty($user)) return;
        if ($body->expires_at ?? false) $user->expires_at = $body->expires_at;
        if ($body->status ?? false) $user->status = $body->status;
        $user->save();
    }

    public function cron_user_expired()
    {
        $users = User::where('expires_at', '<', date("Y-m-d H:i:s"))->where('status', '!=', 'expired')->get();
        foreach ($users as $user)
        {
            $user->status = 'expired';
            $user->save();
        }
    }
}
