<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Notification;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;
use phpDocumentor\Reflection\Types\Float_;
use function Cassandra\Type;
use Carbon\Carbon;

class Utility extends Model
{
    public function createSlug($table, $title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title, '-');
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($table, $slug, $id);
        // If we haven't used it before then we are all good.
        if(!$allSlugs->contains('slug', $slug))
        {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for($i = 1; $i <= 100; $i++)
        {
            $newSlug = $slug . '-' . $i;
            if(!$allSlugs->contains('slug', $newSlug))
            {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($table, $slug, $id = 0)
    {
        return DB::table($table)->select()->where('slug', 'like', $slug . '%')->where('id', '<>', $id)->get();
    }

    public static function settings()
    {
       
        $data = DB::table('settings');
        
        if(\Auth::check())
        {

            if(\Auth::user()->type=='super admin'){
                $data=$data->where('created_by','=',\Auth::user()->creatorId())->where('store_id','0')->get();
                if(count($data)==0){
                    $data =DB::table('settings')->where('created_by', '=', 1 )->get();
                }
            }else{
                $data=$data->where('created_by','=',\Auth::user()->creatorId())->where('store_id',\Auth::user()->current_store)->get();

                if(count($data)==0){
                   $data =DB::table('settings')->where('created_by', '=', 1 )->get();
                }
            }


            // $data = $data->where('created_by','=',\Auth::user()->creatorId())->get();
            // if(count($data)==0){
            //     $data =DB::table('settings')->where('created_by', '=', 1 )->get();
            // }            
            // // if(\Auth::user()->type == 'super admin')
            // // {
            // //     $userId = \Auth::user()->creatorId();
            // // }
            // // else
            // // {
            // //     $userId = \Auth::user()->current_store;                
            // //     // dd($userId);
            // //     //$userId = \Auth::user()->created_by;
            // // }
            // // $data = $data->where('created_by', '=', $userId);
        }
        else
        {
            $data->where('created_by', '=', 1);
            $data = $data->get();
        }
                  
        $settings = [
            "site_currency" => "USD",
            "site_currency_symbol" => "$",
            "currency_symbol_position" => "pre",
            "currency_symbol" => "",
            "currency" => "",
            "site_date_format" => "M j, Y",
            "site_time_format" => "g:i A",
            "company_name" => "",
            "company_address" => "",
            "company_city" => "",
            "company_state" => "",
            "company_zipcode" => "",
            "company_country" => "",
            "company_telephone" => "",
            "company_email" => "",
            "company_email_from_name" => "",
            "invoice_prefix" => "#INV",
            "invoice_color" => "ffffff",
            "quote_template" => "template1",
            "quote_color" => "ffffff",
            "salesorder_template" => "template1",
            "salesorder_color" => "ffffff",
            // "certificate_prefix" => "#PROP",
            // "certificate_color" => "fffff",
            "bill_prefix" => "#BILL",
            "bill_color" => "fffff",
            "quote_prefix" => "#QUO",
            "salesorder_prefix" => "#SOP",
            "vender_prefix" => "#VEND",
            "footer_title" => "",
            "footer_notes" => "",
            "invoice_template" => "template1",
            "bill_template" => "template1",
            // "certificate_template" => "template1",
            "default_language" => "en",
            "enable_stripe" => "",
            "enable_paypal" => "",
            "paypal_mode" => "",
            "paypal_client_id" => "",
            "paypal_secret_key" => "",
            "stripe_key" => "",
            "stripe_secret" => "",
            "decimal_number" => "2",
            "tax_type" => "VAT",
            "shipping_display" => "on",
            "footer_link_1" => "Support",
            "footer_value_1" => "#",
            "footer_link_2" => "Terms",
            "footer_value_2" => "#",
            "footer_link_3" => "Privacy",
            "footer_value_3" => "#",
            "display_landing_page" => "on",
            "title_text" => "",
            "footer_text" => "",
            "company_logo" => "",
            "company_favicon" => "",
            "signup" => "on",
            "color" => "theme-3",
            "cust_theme_bg" => "on",
            "cust_darklayout" => "off",
            "dark_logo" => "logo-dark.png",
            "light_logo" => "logo-light.png",
            "company_logo_light" => "logo-light.png",
            "company_logo_dark" => "logo-dark.png",
            "SITE_RTL" => "off",
        ];

        foreach($data as $row)
        {
            $settings[$row->name] = $row->value;
        }
               
        return $settings;
    }


    public static function templateData()
    {
        $arr              = [];
        $arr['colors']    =[
            [
                'hex'=>'b10d0d',
                'gradiant'=>'color-one'
            ],
            [
                'hex'=>'554360',
                'gradiant'=>'color-two'
            ],
            [
                'hex'=>'2a475b',
                'gradiant'=>'color-three'
            ],
            [
                'hex'=>'6f0000',
                'gradiant'=>'color-four'
            ],
            [
                'hex'=>'1d7280',
                'gradiant'=>'color-five'
            ],
            [
                'hex'=>'365476',
                'gradiant'=>'color-six'
            ],
            [
                'hex'=>'414345',
                'gradiant'=>'color-seven'
            ],
            [
                'hex'=>'237a57',
                'gradiant'=>'color-eight'
            ],
            [
                'hex'=>'734b6d',
                'gradiant'=>'color-nine'
            ],
            [
                'hex'=>'aa076b',
                'gradiant'=>'color-ten'
            ],
        ];
        
        $arr['templates'] = [
            "template1" => "Certificate 1",
            "template2" => "Certificate 2",
        ];

        return $arr;
    }

    public static function languages()
    {
        $dir     = base_path() . '/resources/lang/';
        $glob    = glob($dir . "*", GLOB_ONLYDIR);
        $arrLang = array_map(
            function ($value) use ($dir){
                return str_replace($dir, '', $value);
            }, $glob
        );
        $arrLang = array_map(
            function ($value) use ($dir){
                return preg_replace('/[0-9]+/', '', $value);
            }, $arrLang
        );
        $arrLang = array_filter($arrLang);

        return $arrLang;
    }

    public static function getValByName($key)
    {
        $setting = Utility::settings();

        if(!isset($setting[$key]) || empty($setting[$key]))
        {
            $setting[$key] = '';
        }

        return $setting[$key];
    }

    public static function getPaymentSetting($store_id = null)
    {
        $data     = DB::table('store_payment_settings');
        $settings = [];
        if(\Auth::check())
        {
            $store_id = \Auth::user()->current_store;
            $data     = $data->where('store_id', '=', $store_id);

        }
        else
        {
            $data = $data->where('store_id', '=', $store_id);
        }
        $data = $data->get();
        foreach($data as $row)
        {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }

    public static function getAdminPaymentSetting()
    {
        $data     = DB::table('admin_payment_settings');
        $settings = [];
        if(\Auth::check())
        {
            $user_id = 1;
            $data    = $data->where('created_by', '=', $user_id);

        }
        $data = $data->get();
        foreach($data as $row)
        {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }

    public static function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str     = file_get_contents($envFile);
        if(count($values) > 0)
        {
            foreach($values as $envKey => $envValue)
            {
                $keyPosition       = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine           = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if(!$keyPosition || !$endOfLinePosition || !$oldLine)
                {
                    $str .= "{$envKey}='{$envValue}'\n";
                }
                else
                {
                    $str = str_replace($oldLine, "{$envKey}='{$envValue}'", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        $str .= "\n";
        if(!file_put_contents($envFile, $str))
        {
            return false;
        }

        return true;
    }

    public static function priceFormat($price)
    {
        $settings = Utility::settings();
        $price  =  floatval($price);
       
        if(\Auth::check() && \Auth::User()->type == 'Owner')
        {
            $user     = Auth::user()->current_store;
            $settings = Store::where('id', $user)->first();

            if($settings['currency_symbol_position'] == "pre" && $settings['currency_symbol_space'] == "with")
            {
                return $settings['currency'] . ' ' . number_format($price, 2);
            }
            elseif($settings['currency_symbol_position'] == "pre" && $settings['currency_symbol_space'] == "without")
            {
                return $settings['currency'] . number_format($price, 2);
            }
            elseif($settings['currency_symbol_position'] == "post" && $settings['currency_symbol_space'] == "with")
            {
                return number_format($price, 2) . ' ' . $settings['currency'];
            }
            elseif($settings['currency_symbol_position'] == "post" && $settings['currency_symbol_space'] == "without")
            {
                return number_format($price, 2) . $settings['currency'];
            }
        }
        else
        {
            $slug = session()->get('slug');
            if(!empty($slug))
            {
                $store = Store::where('slug', $slug)->first();

                if($store['currency_symbol_position'] == "pre" && $store['currency_symbol_space'] == "with")
                {
                    return $store['currency'] . ' ' . number_format($price, 2);
                }
                elseif($store['currency_symbol_position'] == "pre" && $store['currency_symbol_space'] == "without")
                {
                    return $store['currency'] . number_format($price, 2);
                }
                elseif($store['currency_symbol_position'] == "post" && $store['currency_symbol_space'] == "with")
                {
                    return number_format($price, 2) . ' ' . $store['currency'];
                }
                elseif($store['currency_symbol_position'] == "post" && $store['currency_symbol_space'] == "without")
                {
                    return number_format($price, 2) . $store['currency'];
                }
            }

            //  return (($settings['currency_symbol_position'] == "pre") ? $settings['currency_symbol'] : '') . number_format($price, 2) . (($settings['currency_symbol_position'] == "post") ? $settings['currency_symbol'] : '');
            return (($settings['currency_symbol_position'] == "pre") ? $settings['site_currency_symbol'] : '') . number_format($price, Utility::getValByName('decimal_number')) . (($settings['currency_symbol_position'] == "post") ? $settings['site_currency_symbol'] : '');
        }
    }

    public static function currencySymbol($settings)
    {
        return $settings['site_currency_symbol'];
    }

    public static function timeFormat($settings, $time)
    {
        return date($settings['site_date_format'], strtotime($time));
    }

    public static function invoiceNumberFormat($settings, $number)
    {

        return $settings["invoice_prefix"] . sprintf("%05d", $number);
    }

    public static function quoteNumberFormat($settings, $number)
    {

        return $settings["quote_prefix"] . sprintf("%05d", $number);
    }

    public static function salesorderNumberFormat($settings, $number)
    {

        return $settings["salesorder_prefix"] . sprintf("%05d", $number);
    }

    public static function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    }

    public static function proposalNumberFormat($settings, $number)
    {
        return $settings["proposal_prefix"] . sprintf("%05d", $number);
    }

    public static function billNumberFormat($settings, $number)
    {
        return $settings["bill_prefix"] . sprintf("%05d", $number);
    }

    public static function tax($taxes)
    {
        $taxArr = explode(',', $taxes);
        $taxes  = [];
        foreach($taxArr as $tax)
        {
            $taxes[] = ProductTax::find($tax);
        }

        return $taxes;
    }

    public static function taxRate($taxRate, $price, $quantity)
    {

        return ($taxRate / 100) * ($price * $quantity);
    }

    public static function totalTaxRate($taxes)
    {

        $taxArr  = explode(',', $taxes);
        $taxRate = 0;

        foreach($taxArr as $tax)
        {

            $tax     = ProductTax::find($tax);
            $taxRate += !empty($tax->rate) ? $tax->rate : 0;
        }

        return $taxRate;
    }

    public static function userBalance($users, $id, $amount, $type)
    {
        if($users == 'customer')
        {
            $user = Customer::find($id);
        }
        else
        {
            $user = Vender::find($id);
        }

        if(!empty($user))
        {
            if($type == 'credit')
            {
                $oldBalance    = $user->balance;
                $user->balance = $oldBalance + $amount;
                $user->save();
            }
            elseif($type == 'debit')
            {
                $oldBalance    = $user->balance;
                $user->balance = $oldBalance - $amount;
                $user->save();
            }
        }
    }

    public static function bankAccountBalance($id, $amount, $type)
    {
        $bankAccount = BankAccount::find($id);
        if($bankAccount)
        {
            if($type == 'credit')
            {
                $oldBalance                   = $bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance + $amount;
                $bankAccount->save();
            }
            elseif($type == 'debit')
            {
                $oldBalance                   = $bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance - $amount;
                $bankAccount->save();
            }
        }

    }

    // get font-color code accourding to bg-color
    public static function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3)
        {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        }
        else
        {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array(
            $r,
            $g,
            $b,
        );

        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    public static function getFontColor($color_code)
    {
        $rgb = self::hex2rgb($color_code);
        $R   = $G = $B = $C = $L = $color = '';

        $R = (floor($rgb[0]));
        $G = (floor($rgb[1]));
        $B = (floor($rgb[2]));

        $C = [
            $R / 255,
            $G / 255,
            $B / 255,
        ];

        for($i = 0; $i < count($C); ++$i)
        {
            if($C[$i] <= 0.03928)
            {
                $C[$i] = $C[$i] / 12.92;
            }
            else
            {
                $C[$i] = pow(($C[$i] + 0.055) / 1.055, 2.4);
            }
        }

        $L = 0.2126 * $C[0] + 0.7152 * $C[1] + 0.0722 * $C[2];

        if($L > 0.179)
        {
            $color = 'black';
        }
        else
        {
            $color = 'white';
        }

        return $color;
    }

    public static function delete_directory($dir)
    {
        if(!file_exists($dir))
        {
            return true;
        }
        if(!is_dir($dir))
        {
            return unlink($dir);
        }
        foreach(scandir($dir) as $item)
        {
            if($item == '.' || $item == '..')
            {
                continue;
            }
            if(!self::delete_directory($dir . DIRECTORY_SEPARATOR . $item))
            {
                return false;
            }
        }

        return rmdir($dir);
    }

    public static function getSuperAdminValByName($key)
    {
        $data = DB::table('settings');
        $data = $data->where('name', '=', $key);
        $data = $data->first();
        if(!empty($data))
        {
            $record = $data->value;
        }
        else
        {
            $record = '';
        }

        return $record;
    }

    /*LMS GO*/
    public static function status()
    {

        $status = [
            'Active' => 'Active',
            'Inactive' => 'Inactive',
        ];

        return $status;
    }

    public static function course_level()
    {

        $level = [
            'Beginner' => 'Beginner',
            'Intermediate' => '	Intermediate',
            'Expert' => 'Expert',
        ];

        return $level;
    }

    public static function lang()
    {

        $lang = [
            'English' => 'English',
            'Spanish' => 'Spanish',
            'Portugueze' => 'Portugueze',
        ];

        return $lang;
    }

    public static function chapter_type()
    {

        $type = [
            'youtube' => 'Youtube',
            'vimeo' => 'Vimeo',
            'quiz' => 'Quiz',
            'text_Content' => 'Text Content',
        ];

        return $type;
    }

    public static function StudentAuthCheck($slug = null)
    {
        if($slug == null)
        {
            $slug = \Request::segment(1);
        }
        $auth_student = Auth::guard('students')->user();        
        if(!empty($auth_student))
        // 
        {
            $store_id = Store::where('slug', $slug)->pluck('id')->first();
            $student  = Student::where('store_id', $store_id)->where('email', $auth_student->email)->count();
            if($student > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    /*STORE EDIT*/
    public static function demoStoreThemeSetting($store_id = null)
    {
        if(!empty($store_id))
        {
            $data = StoreThemeSettings::where('store_id', $store_id)->get();
        }
        else
        {
            $data = [];
        }

        $settings = [
            /*HEADER*/
            "enable_header_img" => "on",
            "header_title" => "Knowledge",
            "header_desc" => "The only true wisdom is in knowing you know nothing.",
            "button_text" => "Explore Courses",
            "header_img" => "default_header_img.jpg",

            /*HEADER SECTION*/
            "enable_header_section_img" => "on",
            "header_section_title" => "Knowledge",
            "header_section_desc" => "The only true wisdom is in knowing you know nothing.",
            "button_section_text" => "Contact me",
            "button_section_url" => "#button",
            "header_section_img" => "default_section_img.jpg",

            /*FOOTER 1*/
            "enable_footer_note" => "on",
            "enable_quick_link1" => "on",
            "enable_quick_link2" => "on",
            "enable_quick_link3" => "on",
            "enable_footer_desc" => "on",

            "quick_link_header_name1" => "Account",
            "quick_link_header_name2" => "About",
            "quick_link_header_name3" => "Company",
            "footer_desc" => "Purpose is a unique and beautiful collection of UI elements that are all flexible and modular. A complete and customizable solution to building the website of your dreams.",

            "quick_link_name11" => "Profile",
            "quick_link_name12" => "Settings",
            "quick_link_name13" => "Notifications",
            "quick_link_name14" => "Notifications",


            "quick_link_name21" => "Services",
            "quick_link_name22" => "Contact",
            "quick_link_name23" => "Careers",
            "quick_link_name24" => "Careers",

            "quick_link_name31" => "Terms",
            "quick_link_name32" => "Privacy",
            "quick_link_name33" => "Support",
            "quick_link_name34" => "Support",

            "quick_link_url11" => "#Profile",
            "quick_link_url12" => "#Settings",
            "quick_link_url13" => "#Notifications",
            "quick_link_url14" => "#Notifications",

            "quick_link_url21" => "#Services",
            "quick_link_url22" => "#Contact",
            "quick_link_url23" => "#Careers",
            "quick_link_url24" => "#Careers",

            "quick_link_url31" => "#Terms",
            "quick_link_url32" => "#Privacy",
            "quick_link_url33" => "#Support",
            "quick_link_url34" => "#Support",


            /*FOOTER LOGO*/
            "footer_logo" => "default_footer_logo.png",

            /*FOOTER 2*/
            "enable_footer" => "on",
            "email" => "test@test.com",
            "whatsapp" => "https://api.whatsapp.com/",
            "facebook" => "https://www.facebook.com/",
            "instagram" => "https://www.instagram.com/",
            "twitter" => "https://twitter.com/",
            "youtube" => "https://www.youtube.com/",
            "footer_note" => "© 2021 My Store. All rights reserved",
            "storejs" => "<script>console.log('hello');</script>",

            "enable_brand_logo" => "on",
            "brand_logo" => implode(
                ',', [
                       'brand_logo.png',
                       'brand_logo.png',
                       'brand_logo.png',
                       'brand_logo.png',
                       'brand_logo.png',
                       'brand_logo.png',
                   ]
            ),

            "enable_categories" => "on",
            "categories" => "Categories",
            "categories_title" => "There is only that moment and the incredible certainty that everything under the sun has been written by one hand only.",

            "enable_featuerd_course" => "on",
            "featured_title" => "Featured Course",

        ];

        foreach($data as $row)
        {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }

    public static function getStoreThemeSetting($store_id = null)
    {
        $data = DB::table('store_theme_setting');
        $settings = [];
        if(\Auth::check())
        {
            $store_id = \Auth::user()->current_store;
            $data     = $data->where('store_id', '=', $store_id);
        }
        else
        {
            $data = $data->where('store_id', '=', $store_id);
        }
        $data = $data->get();

        $settings = [
            'cust_logo' => '',
            'cust_background' => '',
            'cust_btn_color' => '#25067A',
            'cust_btn_text_color' => '#ffffff',
            'cust_darklayout' => '',
            'cust_logo_member_area' => '',
            'cust_logo_mail_area' => '',
            'cust_favicon' => '',
            'cust_type_banner' => 'image',
            'cust_banner' => '',
            'cust_title_text' => '',
            'cust_footer_text' => '',
            'cust_site_date_format' => '',
            'cust_site_time_format' => '',
            'cust_email' => '',
            'cust_whatsapp' => '',
            'cust_facebook' => '',
            'cust_instagram' => '',
            'cust_twitter' => '',
            'cust_youtube' => '',
            'cust_hidden_not_purchased' => 'on',
            'cust_hidden_course_name' => '',
            'cust_theme' => 'cust_theme3',
            'cust_per_row' => '5'
        ];

        foreach($data as $row){
            $settings[$row->name] = $row->value;
        }

        return $settings;       
    }

    public static function getCourseThemeSetting($course_id)
    {
        $data = DB::table('course_theme_settings');
        $settings = [];
        
        $data = $data->where('course_id', '=', $course_id);
        $data = $data->get();

        $settings = [
            'cust_type_banner' => 'image',
            'cust_enable_banner' => '',
            'cust_image_banner' => '',
            'cust_video_banner' => '',
            'cust_enable_chapter_name' => 'on',
            'cust_theme' => 'cust_theme2',
            
        ];

        foreach($data as $row){
            $settings[$row->name] = $row->value;
        }

        return $settings;       
    }

    public static function themeOne()
    {
        $arr = [];

        $arr = [
            'theme1' => [
                'yellow-style.css' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home.png')),
                    'color' => 'fbd593',
                ],
                'blue-style.css' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-1.png')),
                    'color' => 'aac8e3',
                ],
                'green-style.css' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-2.png')),
                    'color' => 'bdd683',
                ],
            ],
        ];

        return $arr;
    }

   

    // get date format
    public static function getDateFormated($date, $time = false)
    {
        if(!empty($date) && $date != '0000-00-00')
        {
            if($time == true)
            {
                return date("d M Y H:i A", strtotime($date));
            }
            else
            {
                return date("d M Y", strtotime($date));
            }
        }
        else
        {
            return '';
        }
    }


    public static function success_res($msg = "", $args = array())
    {
        $msg       = $msg == "" ? "success" : $msg;
        $msg_id    = 'success.' . $msg;
        $converted = \Lang::get($msg_id, $args);
        $msg       = $msg_id == $converted ? $msg : $converted;
        $json      = array(
            'flag' => 1,
            'msg' => $msg,
        );

        return $json;
    }

    public static function error_res($msg = "", $args = array())
    {
        $msg       = $msg == "" ? "error" : $msg;
        $msg_id    = 'error.' . $msg;
        $converted = \Lang::get($msg_id, $args);
        $msg       = $msg_id == $converted ? $msg : $converted;
        $json      = array(
            'flag' => 0,
            'msg' => $msg,
        );

        return $json;
    }    


    public static function notifications()
    {
        //
    }

    public static function send_slack_msg($msg) 
    {
        //       
    }

    public static function send_telegram_msg($resp) 
    {
        //
    }

    // Return timesheet sum of array
    public static function sum_time($times)
    {   
        $m_h = 0;
        foreach ($times as $time) {
            $time=!empty($time->duration)?$time->duration:'00:00';
            sscanf($time, '%d:%d', $hour, $min);
            $m_h += $hour * 60 + $min;           

        }
        if ($h = floor($m_h / 60)) {
            $m_h %= 60;           
        }
        return sprintf('%02d:%02d', $h, $m_h);

    }

    function convert_seconds_to_hms($seconds) {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $seconds = $seconds % 60;
    
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }

    public static function colorset()
    {
        if(\Auth::user())
        {
            if(\Auth::user()->type == 'super admin')
            {
                $user = \Auth::user();
                // $setting = DB::table('settings')->where('created_by',$user->id)->pluck('value','name')->toArray();
                $setting = DB::table('settings')->where('created_by', $user->id)->where('store_id','0')->pluck('value', 'name')->toArray();
            }
            else
            {
                // $setting = DB::table('settings')->where('created_by', \Auth::user()->creatorId())->pluck('value','name')->toArray();
                $setting = DB::table('settings')->where('created_by', \Auth::user()->creatorId())->where('store_id',\Auth::user()->current_store)->pluck('value', 'name')->toArray();
            }
        }
        else
        {
            $user = User::where('type','super admin')->first();
            $setting = DB::table('settings')->where('created_by',$user->id)->pluck('value','name')->toArray();
        }
        if(!isset($setting['color']))
        {
            $setting = Utility::settings();
        }
        return $setting;

    }

    public static function GetLogo()
    {
        $setting = Utility::colorset();

        if(\Auth::user() && \Auth::user()->type != 'super admin')
        {
            if(\Auth::user()->current_store)
            {
                if(Utility::getValByName('cust_darklayout') == 'on')
                {
                
                    return Utility::getValByName('company_logo_light');
                }
                else
                {
                    return Utility::getValByName('company_logo_dark');
                }
            }
        }
        else
        {
            if(Utility::getValByName('cust_darklayout') == 'on')
            {
                
                return Utility::getValByName('light_logo');
            }
            else
            {
                return Utility::getValByName('dark_logo');
            }
        }
    }

    public static function unlockCourseByActualDate($student_id, $course_id)
    {
        $course_access = CourseAccessRules::where('course_id', $course_id)->first();
        $student_access = StudentCourseAccess::where('student_id', $student_id)->where('course_id', $course_id)->first();

        if(!empty($course_access) && $course_access->type == 'time'){
            if(!empty($student_access) && $student_access->unlock_date == Carbon::now()){
                updateOrCreate([
                    'student_id' => $student_id,
                    'course_id' => $course_id,
                ],[
                    'unlock_date' => Carbon::now(),
                    'is_unlocked' => '0',
                ]);
            }
        }
    }

    public static function unlockCourseByRoles($student_id, $course_id, $purchased_date)
    {
        $chapters = Chapters::where('course_id', $course_id)->get();
        $course = Course::find($course_id);
        $course_access = CourseAccessRules::where('course_id', $course_id)->first();
        $course_activity = ChapterActivity::where('course_id', $course_id)->where('student_id', $student_id)->get();
        $course_name;
        $pass = true;
        $date = Carbon::now();
        $percent = 0;

        if(!empty($course_activity) && $course_activity->count() > 0){
            $percent = round($course_activity->count() / $chapters->count()) * 100;
        }
        if(!empty($course_access) && $course_access->type == 'percent'){
            $course_name = Course::find($course_access->course_progress_id);
            $pass = $course_access->value >= $percent ? true : false;
        }
        if(!empty($course_access) && $course_access->type == 'time'){
            $date = Carbon::parse($purchased_date)->addDays($course_access->value);
            $pass = $date->gt(Carbon::now()) ? false : true;

        }

        $data['course_name'] = $course_name->title ?? null;
        $data['percent'] = $course_access->value ?? null;
        $data['continue'] = $pass;
        $data['type'] = $course_access->type ?? null;
        $data['date'] = $date->format('d/m') ?? null;

        return $data;
    }

    public static function unlockChapterByCondition($current_chapter, $student){
        $chapter = PurchasedCourse::where('course_id', $current_chapter->course_id)->where('student_id', $student)->first();
        $purchased_date = $chapter->created_at;
        $date = $purchased_date;
        $condition = $current_chapter->time_type;
        $time = $current_chapter->time_number ?? 0;

        switch($condition){
            case 'days':
                $date = $date->parse($date)->addDays($time);
                break;
            case 'month':
                $date = $date->parse($date)->addMonths($time);
                break;
            case 'year':
                $date = $date->parse($date)->addYears($time);
                break;
            default:
                $date = $purchased_date;
                break;
        }

        $pass = $date->gt(Carbon::now()) ? true : false;

        $data['date'] = $date->format('d/m') ?? null;
        $data['continue'] = $pass;

        return $data;
    }

    public static function removeAccents($string){
        $string = str_replace(' ', '', $string);
        $string = strtolower($string);
        $string = str_replace('\\xCC', 'c', $string);
        $string = str_replace('\\xA7', 'a', $string);

        return preg_replace(array('/[áàãâä]/ui', '/[éèêë]/ui', '/[íìîï]/ui', '/[óòõôö]/ui', '/[úùûü]/ui', '/[ç]/ui', '/[ñ]/ui'),
                            array('a', 'e', 'i', 'o', 'u', 'c', 'n'),
                            $string);
    }

    public static function rand_string( $length, $type = null ) {
        $chars_lower = "abcdefghijklmnopqrstuvwxyz";
        $chars_upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $chars_numbers = "0123456789";

        switch($type) {
            case 'lower':
                $chars = $chars_lower;
                break;
            case 'upper':
                $chars = $chars_upper;
                break;
            default:
                $chars = $chars_lower . $chars_upper . $chars_numbers;
        }

        return substr(str_shuffle($chars),0,$length);
    }

    public static function getActivityChapterStatus($student_id, $course_id){
        $course_activity = ChapterActivity::where('course_id', $course_id)->where('student_id', $student_id)->first();
        if($course_activity && $course_activity->current_time === $course_activity->total_time){
            return true;
        }

        return false;
    }

    public static function comment_options()
    {
        $store_id = \Auth::user()->current_store;
        $store_config = Store::find($store_id);
        $data = [];

        if($store_config->approval_comments_required == 1){
            $data = [
                'not_reviewed' => ['id' => 'not_reviewed', 'name' => 'Não revisado'], 
                'approved' => ['id' => 'approved', 'name' => 'Aprovado'], 
                'rejected' => ['id' => 'rejected', 'name' => 'Rejeitado']
            ];
        }

        $options = $data + [
            'all' => ['id' => 'all', 'name' => 'Todos'],
            'configuration' => ['id' => 'configuration', 'name' => 'Configurações'],
        ];

        return $options;
    }

    public static function excerpt($text, $max_length = 42, $cut_off = '...', $keep_word = false)
    {
        $text = html_entity_decode($text);

        $text = strip_tags($text);

        if(strlen($text) <= $max_length) {
            return htmlspecialchars($text);
        }

        if(strlen($text) > $max_length) {
            if($keep_word) {
                $text = substr($text, 0, $max_length + 1);

                if($last_space = strrpos($text, ' ')) {
                    $text = substr($text, 0, $last_space);
                    $text = rtrim($text);
                    $text .=  $cut_off;
                }
            } else {
                $text = substr($text, 0, $max_length);
                $text = rtrim($text);
                $text .=  $cut_off;
            }
        }

        return htmlspecialchars($text);
    }

    public static function courseByComment($val){
        $chapter = Chapters::find($val);
        $course = Course::find($chapter->course_id);

        if(!empty($course)){
            return $course->title;
        }

        return 'Nome do curso não disponível';
    }

    public static function last_student_login($id){
        $last_login = DB::table('visitor')->where('visitor_id', $id)->orderby('created_at', 'desc')->first();
        return $last_login;
    }

    public static function payment_status($id){
        $payment_status = PurchasedCourse::where('student_id', $id)->first();
        if($payment_status == null){
            $result = 'N/D';
            return $result;
        }

        $result = $payment_status->payment_status == 'cancelled' ? 'Cancelado' : 'Aprovado';

        return $result;
    }
}
