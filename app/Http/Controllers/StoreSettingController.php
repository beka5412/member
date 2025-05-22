<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoreThemeSettings;
use App\Models\ImageBanners;
use App\Models\Store;
use App\Models\StoreLink;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;

class StoreSettingController extends Controller
{
    public function __construct()
    {
        \App::setLocale(\Auth::user()->lang);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $settings = Utility::settings();
        $banners = ImageBanners::where('store_id', $user->current_store)->get();
        $links = StoreLink::where('store_id', $user->current_store)->get();
        $getStoreThemeSetting = Utility::getStoreThemeSetting($user->current_store);
        $store = Store::find($user->current_store);

        return view('customization.index', compact('getStoreThemeSetting', 'settings', 'banners', 'links', 'store'));
    }

    public function store(Request $request){
        $store_settings = new StoreThemeSettings();
        $user = \Auth::user();
        $post = $request->all();
        unset($post['_token']);

        if(!empty($request->cust_logo))
        {
            $filenameWithExt  = $request->File('cust_logo')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('cust_logo')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/logo/');
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $fileNameToStores;
            $path = $request->file('cust_logo')->storeAs('uploads/logo/', $fileNameToStores);

            \DB::insert('insert into store_theme_setting (`value`, `name`,`created_by`,`store_id`) values (?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ,`store_id` = VALUES(`store_id`)', [$fileNameToStores, 'cust_logo', $user->creatorId(), \Auth::user()->current_store,]);
        }

        if(!empty($request->cust_background))
        {
            $filenameWithExt  = $request->File('cust_background')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('cust_background')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/background/');
            $image_path      = $dir . $store_settings['cust_background'];
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $background = $fileNameToStores;
            $path = $request->file('cust_background')->storeAs('uploads/background/', $fileNameToStores);

            \DB::insert('insert into store_theme_setting (`value`, `name`,`created_by`,`store_id`) values (?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ,`store_id` = VALUES(`store_id`)', [$background, 'cust_background', $user->creatorId(), \Auth::user()->current_store,]);
        }

        if(!empty($request->cust_logo_member_area))
        {
            $filenameWithExt  = $request->File('cust_logo_member_area')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('cust_logo_member_area')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/member_area/');
            $image_path      = $dir . $store_settings['cust_logo_member_area'];
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('cust_logo_member_area')->storeAs('uploads/member_area/', $fileNameToStores);

            \DB::insert('insert into store_theme_setting (`value`, `name`,`created_by`,`store_id`) values (?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ,`store_id` = VALUES(`store_id`)', [$fileNameToStores, 'cust_logo_member_area', $user->creatorId(), \Auth::user()->current_store,]);
        }

        if(!empty($request->cust_logo_mail))
        {
            $filenameWithExt  = $request->File('cust_logo_mail')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('cust_logo_mail')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/mail_member_area/');
            $image_path      = $dir . $store_settings['cust_logo_mail'];
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('cust_logo_mail')->storeAs('uploads/mail_member_area/', $fileNameToStores);

            //\DB::insert('insert into store_theme_setting (`value`, `name`,`created_by`,`store_id`) values (?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ,`store_id` = VALUES(`store_id`)', [$fileNameToStores, 'cust_logo_mail_area', $user->creatorId(), \Auth::user()->current_store,]);
            
            $mail = Store::find($user->current_store);
            $mail->mail_logo = $fileNameToStores;
            $mail->update();
        }

        if(!empty($request->cust_favicon))
        {
            $filenameWithExt  = $request->File('cust_favicon')->getClientOriginalName();
            $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension        = $request->file('cust_favicon')->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/favicon/');
            $image_path      = $dir . $store_settings['cust_favicon'];
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $favicon = $fileNameToStores;
            $path = $request->file('cust_favicon')->storeAs('uploads/favicon/', $fileNameToStores);

            \DB::insert('insert into store_theme_setting (`value`, `name`,`created_by`,`store_id`) values (?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ,`store_id` = VALUES(`store_id`)', [$fileNameToStores, 'cust_favicon', $user->creatorId(), \Auth::user()->current_store,]);
        }

        if($request->cust_hidden_not_purchased == null || $request->cust_hidden_not_purchased == 'on'){
            $cust_hidden_not_purchased = $request->cust_hidden_not_purchased;
            if(empty($cust_hidden_not_purchased)){
                $cust_hidden_not_purchased = '';
            }

            DB::table('store_theme_setting')
                ->updateOrInsert(
                    ['created_by' => $user->creatorId(), 'store_id' => \Auth::user()->current_store, 'name' => 'cust_hidden_not_purchased'],
                    ['value' => $cust_hidden_not_purchased]
                );
        }

        if($request->cust_hidden_course_name == null || $request->cust_hidden_course_name == 'on'){
            $cust_hidden_course_name = $request->cust_hidden_course_name;
            if(empty($cust_hidden_course_name)){
                $cust_hidden_course_name = '';
            }

            DB::table('store_theme_setting')
                ->updateOrInsert(
                    ['created_by' => $user->creatorId(), 'store_id' => \Auth::user()->current_store, 'name' => 'cust_hidden_course_name'],
                    ['value' => $cust_hidden_course_name]
                );
        }

        if($request->cust_darklayout == null || $request->cust_darklayout == 'on'){
            $cust_darklayout = $request->cust_darklayout;
            if(empty($cust_darklayout)){
                $cust_darklayout = '';
            }
            
            DB::table('store_theme_setting')
                ->updateOrInsert(
                    ['created_by' => $user->creatorId(), 'store_id' => \Auth::user()->current_store, 'name' => 'cust_darklayout'],
                    ['value' => $cust_darklayout]
                );
        }

        if($request->cust_theme){
            $cust_theme = $request->cust_theme;
            DB::table('store_theme_setting')
                ->updateOrInsert(
                    ['created_by' => $user->creatorId(), 'store_id' => \Auth::user()->current_store, 'name' => 'cust_theme'],
                    ['value' => $cust_theme, 'name' => 'cust_theme']
            );
        }

        if($request->cust_per_row){
            $cust_per_row = $request->cust_per_row;
            DB::table('store_theme_setting')
                ->updateOrInsert(
                    ['created_by' => $user->creatorId(), 'store_id' => \Auth::user()->current_store, 'name' => 'cust_per_row'],
                    ['value' => $cust_per_row, 'name' => 'cust_per_row']
                );
        }

        foreach($post as $key => $data){
            if($key !== 'cust_logo_mail_area' && $key !== 'cust_per_row' && $key !== 'cust_hidden_course_name' && $key !== 'cust_darklayout' && $key !== 'cust_theme' && $key !== 'cust_hidden_not_purchased' && $key != 'cust_logo' && $key !== 'cust_background' && $key !== 'cust_logo_member_area' && $key !== 'cust_favicon' && $key !== 'cust_banner' ){
                \DB::insert('insert into store_theme_setting (`value`, `name`,`created_by`,`store_id`) values (?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ,`store_id` = VALUES(`store_id`)', [$data, $key, $user->creatorId(), \Auth::user()->current_store,]);   
            }
        }

        return redirect()->back()->with('success', __('Store setting succefully updated.'));
    }

    public function storeBanners(Request $request){
        $store = \Auth::user()->current_store;

        $banner = new ImageBanners();
        $banner->store_id = $store;
        $banner->type = $request->modal_banner_type;
        $banner->title = $request->modal_banner_title;
        $banner->link = $request->modal_banner_link;
        $banner->description = $request->modal_banner_description;
        $banner->btn_bg = $request->modal_banner_bg_color;
        $banner->btn_color = $request->modal_banner_text_color;
        $banner->video = $request->modal_video_banner;

        if(!empty($request->images) && count($request->images) > 0)
        {
            foreach($request->images as $image) {
                $filenameWithExt  = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::rand_string(16, "lower");
                $extension = $image->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir = storage_path('uploads/customization/banners/');
                $image_path = $dir . $banner->image;
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $banner->image = $fileNameToStores;
                $path = $image->storeAs('uploads/customization/banners/', $fileNameToStores);
            }
        }

        if(!empty($request->mobile_images) && count($request->mobile_images) > 0)
        {
            foreach($request->mobile_images as $image) {
                $filenameWithExt  = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = Utility::rand_string(16, "lower");
                $extension = $image->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir = storage_path('uploads/customization/banners/');
                $image_path = $dir . $banner->image;
                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $banner->image_mobile = $fileNameToStores;
                $path = $image->storeAs('uploads/customization/banners/', $fileNameToStores);
            }
        }

        $banner->save();

        if(!empty($banner))
        {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Banner Created Successfully');
            $msg['row'] = $banner;
        }
        else
        {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Banner Failed to Create');
        }

        return $msg;
    }

    public function destroyBanners($type, $id){
        $banner_id = ImageBanners::find($id);
        $dir = storage_path('app/public/uploads/customization/banners/');
        
        if($type == 'image' && $banner_id->image !== null){
            unlink($dir.$banner_id->image);
        }
        ImageBanners::where('id', $id)->delete();
        
        $msg['flag'] = 'success';
        $msg['msg']  = __('Banner deleted Successfully');

        return $msg;
    }

    public function storeLinks(Request $request){
        $store = \Auth::user()->current_store;

        $links = new StoreLink();
        $links->store_id = $store;
        $links->type = $request->modal_type_link;
        $links->label = $request->modal_label_link;
        $links->link = $request->modal_link;

        $links->save();

        if(!empty($links))
        {
            $msg['flag'] = 'success';
            $msg['msg']  = __('Link Created Successfully');
            $msg['row'] = $links;
        }
        else
        {
            $msg['flag'] = 'error';
            $msg['msg']  = __('Link Failed to Create');
        }

        return $msg;
    }

    public function destroyLinks($id){
        StoreLink::where('id', $id)->delete();
        
        $msg['flag'] = 'success';
        $msg['msg']  = __('Link deleted Successfully');

        return $msg;
    }
}
