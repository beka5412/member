<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use File;
use App\Models\Category;
use App\Models\Chapters;
use App\Models\ChapterActivity;
use App\Models\ChapterComment;
use App\Models\ChapterStatus;
use App\Models\ChapterFiles;
use App\Models\ChapterLinks;
use App\Models\ChapterNote;
use App\Models\ChapterRatting;
use App\Models\ChapterBookmark;
use App\Models\CommunityCategories;
use App\Models\CommunityMedia;
use App\Models\CommunitySpaces;
use App\Models\CommunityPosts;
use App\Models\Course;
use App\Models\CourseBanner;
use App\Models\Header;
use App\Models\ImageBanners;
use App\Models\Meetings;
use App\Http\Middleware\StudentAuth;
use App\Models\Location;
use App\Models\Order;
use App\Models\PageOption;
use App\Models\PracticesFiles;
use App\Models\PurchasedCourse;
use App\Models\Ratting;
use App\Models\Shipping;
use App\Models\Store;
use App\Models\StoreThemeSettings;
use App\Models\Student;
use App\Models\StudentCourseAccess;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserStore;
use App\Models\Utility;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;

use Shetabit\Visitor\Models\Visit;
use Shetabit\Visitor\Visitor;

//use function Illuminate\Support\Facades\Request;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $lang = session()->get('lang');
        
        \App::setLocale(isset($lang) ? $lang : 'pt');
    }

    public function index()
    {
        if(\Auth::user()->type == 'super admin')
        {
            $users  = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'Owner')->get();
            $stores = Store::get();

            return view('admin_store.index', compact('stores', 'users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user()->type == 'super admin')
        {
            $settings = Utility::settings();

            $validator = \Validator::make(
                $request->all(),[
                    'email' => 'required|email|unique:users',
                ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error',$messages->first());
            }

            $objUser = User::create(
                [
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'type' => 'Owner',
                    'lang' => !empty($settings['default_language']) ? $settings['default_language'] : 'en',
                    'avatar' => 'avatar.png',
                    'plan' => Plan::first()->id,
                    'created_by' => 1,
                ]
            );

            $objStore       = Store::create(
                [
                    'created_by' => $objUser->id,
                    'name' => $request['store_name'],
                    'email' => $request['email'],
                    'logo' => !empty($settings['logo']) ? $settings['logo'] : 'logo.png',
                    'invoice_logo' => !empty($settings['logo']) ? $settings['logo'] : 'invoice_logo.png',
                    'lang' => !empty($settings['default_language']) ? $settings['default_language'] : 'en',
                    'currency' => !empty($settings['currency_symbol']) ? $settings['currency_symbol'] : '$',
                    'currency_code' => !empty($settings->currency) ? $settings->currency : 'USD',
                    'paypal_mode' => 'sandbox',
                    'created_by' => $objUser->id,
                ]
            );
            $objStore->enable_storelink = 'on';
            $objStore->save();
            $objUser->current_store = $objStore->id;
            $objUser->save();
            UserStore::create(
                [
                    'user_id' => $objUser->id,
                    'store_id' => $objStore->id,
                    'permission' => 'Owner',
                ]
            );

            return redirect()->back()->with('success', __('Successfully added!'));
        }
        else
        {
            if(\Auth::user()->type == 'Owner')
            {
                $user        = \Auth::user();
                $total_store = $user->countStore();
                $creator     = User::find($user->creatorId());
                $settings    = Utility::settings();
                
                $objStore = Store::create(
                    [
                        'created_by' => \Auth::user()->id,
                        'name' => $request['store_name'],
                        'logo' => !empty($settings['logo']) ? $settings['logo'] : 'logo.png',
                        'invoice_logo' => !empty($settings['logo']) ? $settings['logo'] : 'invoice_logo.png',
                        'lang' => !empty($settings['default_language']) ? $settings['default_language'] : 'en',
                        'currency' => !empty($settings['currency_symbol']) ? $settings['currency_symbol'] : '$',
                        'currency_code' => !empty($settings['currency']) ? $settings['currency'] : 'USD',
                        'paypal_mode' => 'sandbox',
                    ]
                );
                $objStore->enable_storelink = 'on';
                $objStore->save();
                \Auth::user()->current_store = $objStore->id;
                \Auth::user()->save();
                UserStore::create(
                    [
                        'user_id' => \Auth::user()->id,
                        'store_id' => $objStore->id,
                        'permission' => 'Owner',
                    ]
                );

                return redirect()->back()->with('Success', __('Successfully added!'));

            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Store $store
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Store $store
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::user()->type == 'super admin')
        {
            $user       = User::find($id);
            $user_store = UserStore::where('user_id', $id)->first();
            $store      = Store::where('id', $user_store->store_id)->first();

            return view('admin_store.edit', compact('store', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Store $store
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::user()->type == 'super admin')
        {
            $store      = Store::find($id);
            $user_store = UserStore::where('store_id', $id)->first();
            $user       = User::where('id', $user_store->user_id)->first();

            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:120',
                                   'store_name' => 'required|max:120',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $store['name']  = $request->store_name;
            $store['email'] = $request->email;
            $store->update();

            $user['name']  = $request->name;
            $user['email'] = $request->email;
            $user->update();

            return redirect()->back()->with('Success', 'Successfully Updated' . $request['store_name'] . ' added!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Store $store
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user       = User::find($id);
        $user_store = UserStore::where('user_id', $id)->first();
        $store      = Store::where('id', $user_store->store_id)->first();
        PageOption::where('store_id', $store->id)->delete();

        $store->delete();
        $user_store->delete();
        $user->delete();

        return redirect()->back()->with(
            'success', 'Store ' . $store->name . ' Deleted!'
        );

    }

    public function customDomain()
    {
        if(\Auth::user()->type == 'super admin')
        {
            $serverName = str_replace(
                [
                    'http://',
                    'https://',
                ], '', env('APP_URL')
            );
            $serverIp   = gethostbyname($serverName);

            if($serverIp == $_SERVER['SERVER_ADDR'])
            {
                $serverIp;
            }
            else
            {
                $serverIp = request()->server('SERVER_ADDR');
            }
            $users  = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'owner')->get();
            $stores = Store::where('enable_domain', 'on')->get();

            return view('admin_store.custom_domain', compact('users', 'stores', 'serverIp'));
        }
        else
        {
            return redirect()->back()->with('error', __('permission Denied'));
        }

    }

    public function subDomain()
    {
        if(\Auth::user()->type == 'super admin')
        {
            $serverName = str_replace(
                [
                    'http://',
                    'https://',
                ], '', env('APP_URL')
            );
            $serverIp   = gethostbyname($serverName);

            if($serverIp != $serverName)
            {
                $serverIp;
            }
            else
            {
                $serverIp = request()->server('SERVER_ADDR');
            }
            $users  = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'owner')->get();
            $stores = Store::where('enable_subdomain', 'on')->get();

            return view('admin_store.subdomain', compact('users', 'stores', 'serverIp'));
        }
        else
        {
            return redirect()->back()->with('error', __('permission Denied'));
        }

    }

    public function ownerstoredestroy($id)
    {
        $user        = Auth::user();
        $store       = Store::find($id);
        $user_stores = UserStore::where('user_id', $user->id)->count();
        if($user_stores > 1)
        {
            UserStore::where('store_id', $id)->delete();
            PageOption::where('store_id', $id)->delete();
            $store->delete();

            $userstore = UserStore::where('user_id', $user->id)->first();

            $user->current_store = $userstore->id;
            $user->save();

            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->back()->with('error', __('You have only one store'));
        }


    }

    public function savestoresetting(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(), [
                               'name' => 'required|max:120',
                               'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                               'logo' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
                               'invoice_logo' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
                           ]
        );
        if($request->enable_domain == 'on')
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'domains' => 'required',
                               ]
            );
        }
        if($request->enable_domain == 'enable_subdomain')
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'subdomain' => 'required',
                               ]
            );
        }
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        if(!empty($request->logo))
        {
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/store_logo/');
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('logo')->storeAs('uploads/store_logo/', $fileNameToStore);
        }
        if(!empty($request->invoice_logo))
        {
            $extension              = $request->file('invoice_logo')->getClientOriginalExtension();
            $fileNameToStoreInvoice = 'invoice_logo' . '_' . $id . '.' . $extension;
            $dir                    = storage_path('uploads/store_logo/');
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('invoice_logo')->storeAs('uploads/store_logo/', $fileNameToStoreInvoice);
        }

        if(!empty($request->header_img))
        {
            $filenameWithExt      = $request->file('header_img')->getClientOriginalName();
            $filename             = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension            = $request->file('header_img')->getClientOriginalExtension();
            $fileNameToheader_img = $id . '_header_img_' . time() . '.' . $extension;
            
            $dir                  = storage_path('uploads/store_logo/');
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('header_img')->storeAs('uploads/store_logo/', $fileNameToheader_img);
        }
        if(!empty($request->header_section_img))
        {
            $filenameWithExt              = $request->file('header_section_img')->getClientOriginalName();
            $filename                     = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension                    = $request->file('header_section_img')->getClientOriginalExtension();
            $fileNameToheader_section_img = $id . '_header_section_img_' . time() . '.' . $extension;
            $dir                          = storage_path('uploads/store_logo/');
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('header_section_img')->storeAs('uploads/store_logo/', $fileNameToheader_section_img);
        }
        if(!empty($request->sub_img))
        {
            $filenameWithExt   = $request->file('sub_img')->getClientOriginalName();
            $filename          = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension         = $request->file('sub_img')->getClientOriginalExtension();
            $fileNameTosub_img = $id . '_sub_img_' . time() . '.' . $extension;
            $dir               = storage_path('uploads/store_logo/');
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('sub_img')->storeAs('uploads/store_logo/', $fileNameTosub_img);
        }
        if($request->enable_domain == 'enable_domain')
        {
            // Remove the http://, www., and slash(/) from the URL
            $input = $request->domains;
            // If URI is like, eg. www.way2tutorial.com/
            $input = trim($input, '/');
            // If not have http:// or https:// then prepend it
            if(!preg_match('#^http(s)?://#', $input))
            {
                $input = 'http://' . $input;
            }
            $urlParts = parse_url($input);
            // Remove www.
            $domain_name = preg_replace('/^www\./', '', $urlParts['host']);
            // Output way2tutorial.com
        }
        if($request->enable_domain == 'enable_subdomain')
        {
            // Remove the http://, www., and slash(/) from the URL
            $input = env('APP_URL');

            // If URI is like, eg. www.way2tutorial.com/
            $input = trim($input, '/');
            // If not have http:// or https:// then prepend it
            if(!preg_match('#^http(s)?://#', $input))
            {
                $input = 'http://' . $input;
            }

            $urlParts = parse_url($input);

            // Remove www.
            $subdomain_name = preg_replace('/^www\./', '', $urlParts['host']);
            // Output way2tutorial.com
            $subdomain_name = $request->subdomain . '.' . $subdomain_name;
        }

        $store          = Store::find($id);
        $store['name']  = $request->name;
        $store['email'] = $request->email;
        if($request->enable_domain == 'enable_domain')
        {
            $store['domains'] = $domain_name;
        }

        $store['enable_storelink'] = ($request->enable_domain == 'enable_storelink' || empty($request->enable_domain)) ? 'on' : 'off';
        $store['enable_domain']    = ($request->enable_domain == 'enable_domain') ? 'on' : 'off';
        $store['enable_subdomain'] = ($request->enable_domain == 'enable_subdomain') ? 'on' : 'off';
        if($request->enable_domain == 'enable_subdomain')
        {
            $store['subdomain'] = $subdomain_name;
        }
        $store['about']                     = $request->about;
        $store['tagline']                   = $request->tagline;
        $store['storejs']                   = $request->storejs;
        $store['whatsapp']                  = $request->whatsapp;
        $store['facebook']                  = $request->facebook;
        $store['instagram']                 = $request->instagram;
        $store['twitter']                   = $request->twitter;
        $store['youtube']                   = $request->youtube;
        $store['google_analytic']           = $request->google_analytic;
        $store['fbpixel']                   = $request->fbpixel;
        $store['zoom_apikey']               = $request->zoom_apikey;
        $store['zoom_apisecret']            = $request->zoom_apisecret;
        $store['footer_note']               = $request->footer_note;
        $store['enable_header_img']         = $request->enable_header_img ?? 'off';
        $store['enable_header_section_img'] = $request->enable_header_section_img ?? 'off';
        if(!empty($fileNameToheader_img))
        {
            $store['header_img'] = $fileNameToheader_img;
        }
        if(!empty($fileNameToheader_section_img))
        {
            $store['header_section_img'] = $fileNameToheader_section_img;
        }
        $store['header_section_title'] = $request->header_section_title;
        $store['header_section_desc']  = $request->header_section_desc;
        $store['button_section_text']  = $request->button_section_text;

        $store['header_title']      = $request->header_title;
        $store['header_desc']       = $request->header_desc;
        $store['button_text']       = $request->button_text;
        $store['enable_subscriber'] = $request->enable_subscriber ?? 'off';
        $store['enable_rating']     = $request->enable_rating ?? 'off';
        $store['blog_enable']       = $request->blog_enable ?? 'off';
        $store['enable_shipping']   = $request->enable_shipping ?? 'off';
        if(!empty($fileNameTosub_img))
        {
            $store['sub_img'] = $fileNameTosub_img;
        }
        $store['subscriber_title'] = $request->subscriber_title;
        $store['sub_title']        = $request->sub_title;
        $store['address']          = $request->address;
        $store['city']             = $request->city;
        $store['state']            = $request->state;
        $store['zipcode']          = $request->zipcode;
        $store['country']          = $request->country;
        $store['lang']             = $request->store_default_language;
        if(!empty($fileNameToStore))
        {
            $store['logo'] = $fileNameToStore;
        }
        if(!empty($fileNameToStoreInvoice))
        {
            $store['invoice_logo'] = $fileNameToStoreInvoice;
        }
        $store['created_by'] = \Auth::user()->creatorId();
        $store->update();

        return redirect()->back()->with('success', __('Store successfully Update.'));
    }

    public function storeSlug($slug)
    {
        // if(!Auth::check())
        // {
        //     visitor()->visit($slug);
        // }
        // if(Utility::StudentAuthCheck($slug) == false)
        // {
        //     visitor()->visit($slug);
        // }
        return redirect()->route('student.home', $slug);
    }

    public function pageOptionSlug($slug)
    {
        $pageoption            = PageOption::where('slug', $slug)->first();
        $store                 = Store::where('id', $pageoption->store_id)->first();
        $page_slug_urls        = PageOption::where('store_id', $store->id)->get();
        $blog                  = Blog::where('store_id', $store->id);
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);

        return view('storefront.pageslug', compact('pageoption', 'demoStoreThemeSetting', 'slug', 'store', 'page_slug_urls', 'blog'));
    }

    public function UserLocation($slug, $location_id)
    {
        $store     = Store::where('slug', $slug)->first();
        $shippings = Shipping::where('store_id', $store->id)->whereRaw('FIND_IN_SET("' . $location_id . '", location_id)')->get()->toArray();

        return response()->json(
            [
                'code' => 200,
                'status' => 'Success',
                'shipping' => $shippings,
            ]
        );
    }

    public function whatsapp(Request $request, $slug)
    {
        $validator = \Validator::make(
            $request->all(), [
                               'wts_number' => 'required',
                           ]
        );
        if($validator->fails())
        {
            return response()->json(
                [
                    'status' => 'error',
                    'success' => __('The Phone number field is required.'),
                ]
            );
        }
        $store        = Store::where('slug', $slug)->first();
        $products     = $request['product'];
        $order_id     = $request['order_id'];
        $cart         = session()->get($slug);
        $cust_details = $cart['customer'];
        if(!empty($request->coupon_id))
        {
            $coupon = ProductCoupon::where('id', $request->coupon_id)->first();
        }
        else
        {
            $coupon = '';
        }


        $product_name = [];
        $product_id   = [];
        $tax_name     = [];
        $totalprice   = 0;
        foreach($products as $key => $product)
        {
            if($product['variant_id'] == 0)
            {
                $new_qty                = $product['originalquantity'] - $product['quantity'];
                $product_edit           = Product::find($product['product_id']);
                $product_edit->quantity = $new_qty;
                $product_edit->save();

                $tax_price = 0;
                if(!empty($product['tax']))
                {
                    foreach($product['tax'] as $key => $taxs)
                    {
                        $tax_price += $product['price'] * $product['quantity'] * $taxs['tax'] / 100;

                    }
                }
                $totalprice     += $product['price'] * $product['quantity'] + $tax_price;
                $product_name[] = $product['product_name'];
                $product_id[]   = $product['id'];
            }
            elseif($product['variant_id'] != 0)
            {
                $new_qty                   = $product['originalvariantquantity'] - $product['quantity'];
                $product_variant           = ProductVariantOption::find($product['variant_id']);
                $product_variant->quantity = $new_qty;
                $product_variant->save();

                $tax_price = 0;
                if(!empty($product['tax']))
                {
                    foreach($product['tax'] as $key => $taxs)
                    {
                        $tax_price += $product['variant_price'] * $product['quantity'] * $taxs['tax'] / 100;

                    }
                }
                $totalprice     += $product['variant_price'] * $product['quantity'] + $tax_price;
                $product_name[] = $product['product_name'];
                $product_id[]   = $product['id'];
            }
        }

        if(isset($cart['shipping']) && isset($cart['shipping']['shipping_id']) && !empty($cart['shipping']))
        {
            $shipping = Shipping::find($cart['shipping']['shipping_id']);
            if(!empty($shipping))
            {
                $totalprice     = $totalprice + $shipping->price;
                $shipping_name  = $shipping->name;
                $shipping_price = $shipping->price;
                $shipping_data  = json_encode(
                    [
                        'shipping_name' => $shipping_name,
                        'shipping_price' => $shipping_price,
                        'location_id' => $cart['shipping']['location_id'],
                    ]
                );
            }
        }
        else
        {
            $shipping_data = '';
        }
        if($product)
        {
            $order                  = new Order();
            $order->order_id        = time();
            $order->name            = $cust_details['name'];
            $order->card_number     = '';
            $order->card_exp_month  = '';
            $order->card_exp_year   = '';
            $order->status          = 'pending';
            $order->phone           = $request->wts_number;
            $order->user_address_id = $cust_details['id'];
            $order->shipping_data   = !empty($shipping_data) ? $shipping_data : '';
            $order->product_id      = implode(',', $product_id);
            $order->price           = $totalprice;
            $order->coupon          = $request->coupon_id;
            $order->coupon_json     = json_encode($coupon);
            $order->discount_price  = !empty($request->dicount_price) ? $request->dicount_price : '0';
            $order->coupon          = $request->coupon_id;
            $order->product         = json_encode($products);
            $order->price_currency  = $store->currency_code;
            $order->txn_id          = '';
            $order->payment_type    = __('Whatsapp');
            $order->payment_status  = 'approved';
            $order->receipt         = '';
            $order->user_id         = $store['id'];
            $order->save();

            session()->forget($slug);

            return response()->json(
                [
                    'status' => 'success',
                    'success' => __('Your Order Successfully Added'),
                    'order_id' => Crypt::encrypt($order->id),
                ]
            );
        }
        else
        {
            return redirect()->back()->with('error', __('failed'));
        }
    }

    public function cod(Request $request, $slug)
    {
        $store    = Store::where('slug', $slug)->first();
        $products = $request['product'];
        $order_id = $request['order_id'];
        $cart     = session()->get($slug);

        $cust_details = $cart['customer'];
        if(!empty($request->coupon_id))
        {
            $coupon = ProductCoupon::where('id', $request->coupon_id)->first();
        }
        else
        {
            $coupon = '';
        }
        $product_name = [];
        $product_id   = [];
        $tax_name     = [];
        $totalprice   = 0;
        foreach($products as $key => $product)
        {
            if($product['variant_id'] == 0)
            {
                $new_qty                = $product['originalquantity'] - $product['quantity'];
                $product_edit           = Product::find($product['product_id']);
                $product_edit->quantity = $new_qty;
                $product_edit->save();

                $tax_price = 0;
                if(!empty($product['tax']))
                {
                    foreach($product['tax'] as $key => $taxs)
                    {
                        $tax_price += $product['price'] * $product['quantity'] * $taxs['tax'] / 100;

                    }
                }
                $totalprice     += $product['price'] * $product['quantity'] + $tax_price;
                $product_name[] = $product['product_name'];
                $product_id[]   = $product['id'];
            }
            elseif($product['variant_id'] != 0)
            {
                $new_qty                   = $product['originalvariantquantity'] - $product['quantity'];
                $product_variant           = ProductVariantOption::find($product['variant_id']);
                $product_variant->quantity = $new_qty;
                $product_variant->save();

                $tax_price = 0;
                if(!empty($product['tax']))
                {
                    foreach($product['tax'] as $key => $taxs)
                    {
                        $tax_price += $product['variant_price'] * $product['quantity'] * $taxs['tax'] / 100;

                    }
                }
                $totalprice     += $product['variant_price'] * $product['quantity'] + $tax_price;
                $product_name[] = $product['product_name'];
                $product_id[]   = $product['id'];
            }
        }
        if(isset($cart['shipping']) && isset($cart['shipping']['shipping_id']) && !empty($cart['shipping']))
        {
            $shipping = Shipping::find($cart['shipping']['shipping_id']);

            $totalprice     = $totalprice + $shipping->price;
            $shipping_name  = $shipping->name;
            $shipping_price = $shipping->price;
            $shipping_data  = json_encode(
                [
                    'shipping_name' => $shipping_name,
                    'shipping_price' => $shipping_price,
                    'location_id' => $cart['shipping']['location_id'],
                ]
            );
        }
        else
        {
            $shipping_data = '';
        }

        if($product)
        {
            $order                  = new Order();
            $order->order_id        = $order_id;
            $order->name            = $cust_details['name'];
            $order->card_number     = '';
            $order->card_exp_month  = '';
            $order->card_exp_year   = '';
            $order->status          = 'pending';
            $order->user_address_id = $cust_details['id'];
            $order->shipping_data   = !empty($shipping_data) ? $shipping_data : '';
            $order->coupon          = $request->coupon_id;
            $order->coupon_json     = json_encode($coupon);
            $order->discount_price  = $request->dicount_price;
            $order->product_id      = implode(',', $product_id);
            $order->price           = $totalprice;
            $order->product         = json_encode($products);
            $order->price_currency  = $store->currency_code;
            $order->txn_id          = '';
            $order->payment_type    = __('COD');
            $order->payment_status  = 'approved';
            $order->receipt         = '';
            $order->user_id         = $store['id'];
            $order->save();

            session()->forget($slug);

            return response()->json(
                [
                    'status' => 'success',
                    'success' => __('Your Order Successfully Added'),
                    'order_id' => Crypt::encrypt($order->id),
                ]
            );
        }
        else
        {
            return redirect()->back()->with('error', __('failed'));
        }
    }

    public function grid()
    {
        if(\Auth::user()->type == 'super admin')
        {
            $users  = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'owner')->get();
            $stores = Store::get();

            return view('user.grid', compact('users', 'stores'));
        }
        else
        {
            return redirect()->back()->with('error', __('permission Denied'));
        }

    }

    public function storedit($id)
    {
        if(\Auth::user()->type == 'super admin')
        {
            $user       = User::find($id);
            $user_store = UserStore::where('user_id', $id)->first();
            $store      = Store::where('id', $user_store->store_id)->first();

            return view('admin_store.edit', compact('store', 'user'));
        }
        else
        {
            return redirect()->back()->with('error', __('permission Denied'));
        }
    }

    public function storeupdate(Request $request, $id)
    {
        $user      = User::find($id);
        $validator = \Validator::make(
            $request->all(), [
                               'username' => 'required|max:120',
                               'name' => 'required|max:120',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $user['username']   = $request->username;
        $user['name']       = $request->name;
        $user['title']      = $request->title;
        $user['phone']      = $request->phone;
        $user['gender']     = $request->gender;
        $user['is_active']  = ($request->is_active == 'on') ? 1 : 0;
        $user['user_roles'] = $request->user_roles;
        $user->update();

        Stream::create(
            [
                'user_id' => \Auth::user()->id,
                'created_by' => \Auth::user()->creatorId(),
                'log_type' => 'updated',
                'remark' => json_encode(
                    [
                        'owner_name' => \Auth::user()->username,
                        'title' => 'user',
                        'stream_comment' => '',
                        'user_name' => $request->name,
                    ]
                ),
            ]
        );

        return redirect()->back()->with('success', __('User Successfully Updated.'));
    }

    public function storedestroy($id)
    {
        if(\Auth::user()->type == 'super admin')
        {
            $user      = User::find($id);
            $userstore = UserStore::where('user_id', $user->id)->first();
            $store     = Store::where('id', $userstore->store_id)->first();
            PageOption::where('store_id', $store->id)->delete();

            $user->delete();
            $userstore->delete();
            $store->delete();

            return redirect()->back()->with('success', __('User Store Successfully Deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function changeCurrantStore($storeID)
    {
        $objStore = Store::find($storeID);
        if($objStore->is_active)
        {
            $objUser                = Auth::user();
            $objUser->current_store = $storeID;
            $objUser->update();

            return redirect()->route('dashboard')->with('success', __('Store Change Successfully!'));
        }
        else
        {
            return redirect()->back()->with('error', __('Store is locked'));
        }
    }

    /*LMS*/
    public function ViewCourse($slug, $course_id)
    {   
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        $course_settings = Utility::getCourseThemeSetting(Crypt::decrypt($course_id));
        $banners = CourseBanner::where('course_id', Crypt::decrypt($course_id))->get();
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        $course = Course::find(Crypt::decrypt($course_id));
        $category_name = Category::find($course->category);
        $chapter = Chapters::where('course_id', $course->id)->get();
        $header = Header::where('course', $course->id)->where('store_id', $store->id)->get();
        $header_first = $header->pluck('id')->first();

        //Activity
        $chapter_activity = ChapterActivity::where('student_id', $student->id)->get();
        $activity = [];
        if($chapter_activity != null)
        {
            foreach($chapter_activity as $ch_activity)
            {
                if($ch_activity['current_time'] == null)
                {
                    $percent = $ch_activity['current_time'] = 0;
                }else{
                    $percent = round($ch_activity['current_time'] / $ch_activity['total_time'] * 100);
                }
                $activity[$ch_activity['chapter_id']] = [
                    'chapter_id' => $ch_activity['chapter_id'],
                    'percentage' => $percent
                ];
            }
        }

        if($course->external_link !== null){
            return redirect()->away($course->external_link);
        }

        if($course->skip_modules === 'on'){
            $header_id = ChapterStatus::where('course_id', Crypt::decrypt($course_id))->max('header_id');
            if(empty($header_id)){
                $header_id = Header::where('course', Crypt::decrypt($course_id))->min('id');
            }
            
            $chapter_id = ChapterStatus::where('header_id', $header_id)->max('chapter_id');
            if(empty($chapter_id)){
                $chapter_id = Chapters::where('header_id', $header_id)->min('id');
                $chapter_id = $chapter_id - 1;
            }

            return redirect()->route('store.nextFullscreen', [$slug, $course_id, Crypt::encrypt($header_id), Crypt::encrypt($chapter_id)]);
        }

        return view('storefront.viewcourse', compact('demoStoreThemeSetting', 'store_settings', 'course_settings', 'category_name','slug','student','store', 'page_slug_urls', 'course', 'chapter', 'header', 'banners', 'activity'));
    }

    public function tutor($slug, $tutor_id)
    {
        $tutor_id              = Crypt::decrypt($tutor_id);
        $store                 = Store::where('slug', $slug)->first();
        $blog                  = Blog::where('store_id', $store->id);
        $page_slug_urls        = PageOption::where('store_id', $store->id)->get();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        $tutor = User::find($tutor_id);

        $tutor_course = Course::where('store_id', $store->id)->where('created_by', $tutor_id)->where('status', 'Active')->first();
        $courses      = Course::where('store_id', $store->id)->where('created_by', $tutor_id)->where('status', 'Active')->get();

        $tutor_ratings = Ratting::where('tutor_id', $tutor_id)->where('slug', $slug)->get();
        $ratting       = Ratting::where('tutor_id', $tutor_id)->where('slug', $slug)->where('rating_view', 'on')->sum('ratting');
        $user_count    = Ratting::where('tutor_id', $tutor_id)->where('slug', $slug)->where('rating_view', 'on')->count();
        if($user_count > 0)
        {
            $avg_rating = number_format($ratting / $user_count, 1);
        }
        else
        {
            $avg_rating = number_format($ratting / 1, 1);

        }

        return view('storefront.tutor', compact('demoStoreThemeSetting', 'tutor_course', 'blog', 'user_count', 'tutor', 'tutor_ratings', 'avg_rating', 'store', 'page_slug_urls', 'courses', 'slug'));
    }

    public function searchData($slug, $search_data)
    {
        $store          = Store::where('slug', $slug)->first();
        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        $blog           = Blog::where('store_id', $store->id);
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }

        if(!empty($search_data))
        {
            $output = '';
            $query  = $search_data;
            if($query != '')
            {
                $data = Course::where('store_id', $store->id)->where('title', 'like', '%' . $query . '%')->where('status', 'Active')->get();
            }
            else
            {
                $data = Course::where('store_id', $store->id)->where('status', 'Active')->get();
            }

            $total_row = $data->count();
            $output    .= view('storefront.search.searchData', compact('blog', 'data', 'total_row', 'store'))->render();
            $data      = array(
                'table_data' => $output,
                'total_data' => $total_row,
                'slug' => $slug,
                'page_slug_urls' => $page_slug_urls,
            );

            return json_encode($data);
        }
        else
        {
            $data = array(
                'page_slug_urls' => $page_slug_urls,
                'slug' => $slug,
            );

            return json_encode($data);
        }


    }

    public function search($slug, Request $request, $search_category = null)
    {
        if($search_category != null)
        {
            $search_category = Crypt::decrypt($search_category);
        }
        $search_d              = ($request->all() != null) ? $request->search : null;
        $store                 = Store::where('slug', $slug)->first();
        $blog                  = Blog::where('store_id', $store->id);
        $page_slug_urls        = PageOption::where('store_id', $store->id)->get();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        $category = Category::where('store_id', $store->id)->get();
        if($search_d == null && $search_category == null)
        {
            $courses = Course::where('store_id', $store->id)->where('status', 'Active')->get();
        }
        else if($search_category != null)
        {
            $courses = Course::where('store_id', $store->id)->where('status', 'Active')->where('category', $search_category)->get();
        }
        else
        {
            $courses = Course::where('store_id', $store->id)->where('status', 'Active')->where('title', 'like', '%' . $search_d . '%')->get();
        }

        return view('storefront.search.index', compact('search_category', 'demoStoreThemeSetting', 'blog', 'store', 'page_slug_urls', 'courses', 'search_d', 'category', 'slug'));

    }

    public function filter($slug, Request $request)
    {
        $store          = Store::where('slug', $slug)->first();
        $blog           = Blog::where('store_id', $store->id)->count();
        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        $is_free     = [
            'off' => 'off',
            'on' => 'on',
        ];
        $level       = Utility::course_level();
        $search_data = '';
        $category    = Category::where('store_id', $store->id)->get()->pluck('id');
        if($search_data != 'null' && !empty($request->all()))
        {
            $output = '';
            $data   = Course::where('store_id', $store->id)->whereIn('level', (!empty($request->level) ? $request->level : $level))->whereIn('category', (!empty($request->checked) ? $request->checked : $category))->whereIn('is_free', (!empty($request->is_free) ? $request->is_free : $is_free))->where('status', 'Active')->get();
            if(!empty($request->is_free) && empty($request->level) && empty($request->checked))
            {
                $data = Course::where('store_id', $store->id)->whereIn('is_free', (!empty($request->is_free) ? $request->is_free : $is_free))->get();
            }
            if(!empty($request->level) && empty($request->is_free) && empty($request->checked))
            {
                $data = Course::where('store_id', $store->id)->whereIn('level', (!empty($request->level) ? $request->level : $level))->get();
            }
            if(!empty($request->checked) && empty($request->level) && empty($request->is_free))
            {
                $data = Course::where('store_id', $store->id)->whereIn('category', (!empty($request->checked) ? $request->checked : $category))->get();
            }
            $total_row = $data->count();
            $output    .= view('storefront.search.filter', compact('blog', 'data', 'total_row', 'store', 'slug'))->render();
            $data      = array(
                'table_data' => $output,
                'total_row' => $total_row,
                'slug' => $slug,
                'page_slug_urls' => $page_slug_urls,
            );

            return json_encode($data);
        }
        else
        {
            $output    = '';
            $data      = Course::where('store_id', $store->id)->where('status', 'Active')->get();
            $total_row = $data->count();
            $output    .= view('storefront.search.filter', compact('blog', 'data', 'total_row', 'store', 'slug'))->render();
            $data      = array(
                'table_data' => $output,
                'total_row' => $total_row,
                'slug' => $slug,
                'page_slug_urls' => $page_slug_urls,
            );

            return json_encode($data);
        }

    }

    public function userCreate($slug)
    {
        $store                 = Store::where('slug', $slug)->first();
        $blog                  = Blog::where('store_id', $store->id);
        $page_slug_urls        = PageOption::where('store_id', $store->id)->get();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }

        return view('storefront.user.create', compact('blog', 'demoStoreThemeSetting', 'slug', 'store', 'page_slug_urls'));
    }

    protected function userStore($slug, Request $request)
    {
        $store          = Store::where('slug', $slug)->first();
        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        $blog           = Blog::where('store_id', $store->id);

        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        $validate = Validator::make(
            $request->all(), [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'phone_number' => [
                    'required',
                    'max:255',
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                ],
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                ],
            ]
        );
        $vali     = Student::where('email', $request->email)->where('store_id', $store->id)->where('phone_number', $request->phone_number)->count();
        if($validate->fails())
        {
            $message = $validate->getMessageBag();

            return redirect()->back()->with('error', $message->first());
        }
        elseif($vali > 0)
        {
            return redirect()->back()->with('error', __('Email already exists'));
        }

        $student               = new Student();
        $student->name         = $request->name;
        $student->email        = $request->email;
        $student->phone_number = $request->phone_number;
        $student->password     = Hash::make($request->password);
        $student->lang         = !empty($settings['default_language']) ? $settings['default_language'] : 'en';
        $student->avatar       = 'avatar.png';
        $student->store_id     = $store->id;

        $student->save();

        return redirect()->route('student.home', $slug)->with('success', __('Account Created Successfully.'));
    }

    public function studentHome($slug)
    {

        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        $banners = ImageBanners::where('store_id', $store->id)->get();

        if(empty($store))
        {
            return redirect()->back()->with('error', __('Store not available'));
        }
        $purchased_courses = Course::where('store_id', $store->id)->where('status', 'on')->get();
        $categories = Category::where('store_id', $store->id)->orderBy('position', 'asc')->with(["courses" => function($q) use ($store) { $q->where('store_id', '=', $store->id)->where('status', 'on'); }])->get();

        return view('storefront.student.index', compact('purchased_courses', 'demoStoreThemeSetting', 'student', 'slug', 'store', 'page_slug_urls', 'store_settings', 'categories', 'banners'));

        print_r($browser);
    }

    public function fullscreen($slug, $course_id, $header_id, $chapter_id = null, $type = null)
    {
        $student = Auth::guard('students')->user();
        if(Utility::StudentAuthCheck($slug) == false)
        {
            return redirect()->back()->with('error', __('You need to login!'));
        }
        else if(in_array(Crypt::decrypt($course_id), Auth::guard('students')->user()->purchasedCourse())){
            $store = Store::where('slug', $slug)->first();
            $course_id = Crypt::decrypt($course_id);

            if($header_id !== null){
                $header_id = Crypt::decrypt($header_id);
                $current_header = Header::find($header_id);
            }else{
                $header_id = Header::where('course', $course_id)->max('id');
                $last_header = ChapterStatus::where('course_id', $course_id)->max('header_id');
                if(empty($header_id) || empty($last_header)){
                    $last_header = Header::where('course', $course_id)->min('id');
                }
                $current_header = Header::find($last_header);
            }

            if($chapter_id != null){
                $chapter_id = Crypt::decrypt($chapter_id);
            }else{
                $last_chapter_in_header = Chapters::where('header_id', $header_id)->max('id');
                $chapter_id = ChapterStatus::where('header_id', $header_id)->max('chapter_id');
                if(empty($chapter_id) || $last_chapter_in_header == $chapter_id){
                    $chapter_id = Chapters::where('header_id', $header_id)->min('id');
                }
            }

            $current_chapter = Chapters::find($chapter_id);
            $comments = $store->approval_comments_required == 1 ? ChapterComment::where('chapter_id', $chapter_id)->where(function($query) use ($student) {
                $query->where('approved', '1')->orwhere('user_id', $student->id);
            })->with('student')->get() : ChapterComment::where('chapter_id', $chapter_id)->with('student')->get();
            
            $courses = Course::find($course_id);
            $headers = Header::where('course', $course_id)->get();
            $page_slug_urls = PageOption::where('store_id', $store->id)->get();
            $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
            $store_settings = Utility::getStoreThemeSetting($store->id);
            $nextChapterID = Chapters::where('course_id', $course_id)->where('id', '>', $chapter_id)->min('id');
            $next = Chapters::find($nextChapterID);

            $chapters_count = Chapters::where('course_id', $course_id)->count();
            $chapter_status_student = ChapterStatus::where('chapter_id', $chapter_id)->where('student_id', $student->id)->first();
            $status = ChapterStatus::all();
            $files = ChapterFiles::where('chapter_id', $chapter_id)->get();
            $links = ChapterLinks::where('chapter_id', $chapter_id)->get();
            
            $likes = ChapterActivity::where('chapter_id', $chapter_id)->where('type', 'like')->count();
            $dislikes = chapterActivity::where('chapter_id', $chapter_id)->where('type', 'dislike')->count();
            $user_like = ChapterActivity::where('chapter_id', $chapter_id)->where('student_id', $student->id)->where('type', 'like')->first();
            $user_dislike = ChapterActivity::where('chapter_id', $chapter_id)->where('student_id', $student->id)->where('type', 'dislike')->first();
            $notes = ChapterNote::where('chapter_id', $chapter_id)->where('student_id', $student->id)->get();
            $bookmarks = ChapterBookmark::where('chapter_id', $chapter_id)->where('student_id', $student->id)->first();

            $chapters_activity = ChapterStatus::where('course_id', $course_id)->where('student_id', $student->id)->get();
        }
        else{
            return redirect()->back()->with('error', __('You need to Purchase this course!'));
        }
        
        return view('storefront.fullscreen', compact('demoStoreThemeSetting', 'store_settings', 'store','headers', 'current_chapter', 'courses', 'next', 'student', 'slug', 'current_header', 'chapters_count', 'status', 'chapter_status_student', 'files', 'links', 'comments', 'likes', 'dislikes', 'notes', 'bookmarks', 'chapters_activity'));
    }

    public function nextFullscreen($slug, $course_id, $header_id, $chapter_id, $completed = null)
    {
        $student = Auth::guard('students')->user();
        $chapter_id = Crypt::decrypt($chapter_id);
        $course_id = Crypt::decrypt($course_id);

        $store = Store::where('slug', $slug)->first();
        $courses = Course::find($course_id);
        $headers = Header::where('course', $course_id)->get();

        $page_slug_urls = PageOption::where('store_id', $store->id)->get();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        $purchased_course = Course::where('store_id', $store->id)->where('status', 'on')->get();
        $files = ChapterFiles::where('chapter_id', $chapter_id)->get();
        $links = ChapterLinks::where('chapter_id', $chapter_id)->get();
        $comments = $store->approval_comments_required == 1 ? ChapterComment::where('chapter_id', $chapter_id)->where(function($query) use ($student) {
            $query->where('approved', '1')->orwhere('user_id', $student->id);
        })->with('student')->get() : ChapterComment::where('chapter_id', $chapter_id)->with('student')->get();

        $next = Chapters::where('course_id', $course_id)->where('id', '>', $chapter_id)->min('id') ?? Chapters::where('course_id', $course_id)->min('id');
        $last = Chapters::where('course_id', $course_id)->max('id');
        $current_chapter = Chapters::find($next);

        $current_header = Header::find($current_chapter->header_id);
        $chapters_count = Chapters::where('course_id', $course_id)->count();
        $status = ChapterStatus::all();

        $likes = ChapterActivity::where('chapter_id', $chapter_id)->where('type', 'like')->count();
        $dislikes = chapterActivity::where('chapter_id', $chapter_id)->where('type', 'dislike')->count();

        $user_like = ChapterActivity::where('chapter_id', $chapter_id)->where('student_id', $student->id)->where('type', 'like')->first();
        $user_dislike = ChapterActivity::where('chapter_id', $chapter_id)->where('student_id', $student->id)->where('type', 'dislike')->first();
        $notes = ChapterNote::where('chapter_id', $chapter_id)->where('student_id', $student->id)->get();
        $bookmarks = ChapterBookmark::where('chapter_id', $current_chapter->id)->where('student_id', $student->id)->first();

        $chapters_activity = ChapterStatus::where('course_id', $course_id)->where('student_id', $student->id)->get();

        if($completed != null){
            return view('storefront.student.index', compact('purchased_course', 'demoStoreThemeSetting', 'store_settings', 'student', 'slug', 'store', 'page_slug_urls', 'nav_links', 'notes', 'chapters_count', 'bookmarks', 'chapters_activity'));
        }else{
            $status_count = ChapterStatus::where('course_id', $course_id)->count();
            $completed = ($chapters_count == $status_count && $current_chapter->id == $last) ? true : false;
            
            return view('storefront.fullscreen', compact('demoStoreThemeSetting', 'store_settings', 'store','headers', 'current_chapter', 'completed', 'courses', 'next', 'student', 'slug', 'current_header', 'chapters_count', 'status','files', 'links', 'comments', 'likes', 'dislikes', 'user_like', 'user_dislike', 'notes', 'bookmarks', 'chapters_activity'));
        }
    }

    public function chapterMarker($header_id, $chapter_id, $course_id, $slug)
    {
        if(Utility::StudentAuthCheck($slug) == false)
        {
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'Error',
                    'error' => __('You need to login'),
                ]
            );
        }
        else
        {
            $student = Auth::guard('students')->user();
            $chapter = ChapterStatus::where('chapter_id', $chapter_id)->where('student_id', $student->id)->first();

            if($chapter !== null){
                ChapterStatus::where('id', $chapter->id)->delete();
            }else{
                ChapterStatus::create(
                    [
                        'student_id' => $student->id,
                        'chapter_id' => $chapter_id,
                        'course_id' => $course_id,
                        'header_id' => $header_id,
                    ]
                );
            }

            return response()->json(
                [
                    'code' => 200,
                    'status' => 'Success',
                    'success' => __('Updated')
                ]
            );
        }
    }

    public function chapterRatting($chapter_id, $value, $slug)
    {
        if(Utility::StudentAuthCheck($slug) == false)
        {
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'Error',
                    'error' => __('You need to login'),
                ]
            );
        }
        else
        {
            $student = Auth::guard('students')->user();
            $chapter = ChapterRatting::where('chapter_id', $chapter_id)->where('student_id', $student->id)->first();

            if($chapter !== null){
                ChapterRatting::where('id', $chapter->id)->update(
                    [
                        'chapter_id' => $chapter_id,
                        'student_id' => $student->id,
                        'ratting' => $value,
                    ]
                );
            }else{
                ChapterRatting::create(
                    [
                        'chapter_id' => $chapter_id,
                        'student_id' => $student->id,
                        'ratting' => $value,
                    ]
                );
            }

            return response()->json(
                [
                    'code' => 200,
                    'status' => 'Success',
                    'success' => __('Updated')
                ]
            );
        }
    }

    /*STORE EDIT*/
    public function StoreEdit(Request $request, $slug)
    {
        $store = Store::where('slug', $slug)->first();

        /*HEADER*/
        if(isset($request->enable_header_img) && $request->enable_header_img == 'on')
        {
            /*HEADER*/
            if(!empty($request->header_img))
            {
                $filenameWithExt  = $request->file('header_img')->getClientOriginalName();
                $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension        = $request->file('header_img')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir              = storage_path('uploads/store_logo/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }

                $path = $request->file('header_img')->storeAs('uploads/store_logo/', $fileNameToStores);
            }

            $post['enable_header_img'] = $request->enable_header_img;
            $post['header_title']      = $request->header_title;
            $post['header_desc']       = $request->header_desc;
            $post['button_text']       = $request->button_text;
            if(!empty($fileNameToStores))
            {
                $post['header_img'] = $fileNameToStores;
            }
        }
        else
        {
            $post['enable_header_img'] = 'off';
        }

        /*HEADER SECTION*/
        if(isset($request->enable_header_section_img) && $request->enable_header_section_img == 'on')
        {
            if(!empty($request->header_section_img))
            {
                $filenameWithExt  = $request->file('header_section_img')->getClientOriginalName();
                $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension        = $request->file('header_section_img')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir              = storage_path('uploads/store_logo/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('header_section_img')->storeAs('uploads/store_logo/', $fileNameToStores);
            }

            $post['enable_header_section_img'] = $request->enable_header_section_img;
            $post['header_section_title']      = $request->header_section_title;
            $post['header_section_desc']       = $request->header_section_desc;
            $post['button_section_text']       = $request->button_section_text;
            $post['button_section_url']        = $request->button_section_url;
            if(!empty($fileNameToStores))
            {
                $post['header_section_img'] = $fileNameToStores;
            }
        }
        else
        {
            $post['enable_header_section_img'] = 'off';
        }

        /*FOOTER 1*/
        if(isset($request->enable_footer_note) && $request->enable_footer_note == 'on')
        {
            if(!empty($request->footer_logo))
            {
                $filenameWithExt  = $request->file('footer_logo')->getClientOriginalName();
                $filename         = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension        = $request->file('footer_logo')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $dir              = storage_path('uploads/store_logo/');

                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }

                $path = $request->file('footer_logo')->storeAs('uploads/store_logo/', $fileNameToStores);
            }
            $post['enable_footer_note'] = $request->enable_footer_note;

            /*QUICK LINK 1*/
            if(isset($request->enable_quick_link1) && $request->enable_quick_link1 == 'on')
            {
                $post['enable_quick_link1'] = $request->enable_quick_link1;

                $post['quick_link_header_name1'] = $request->quick_link_header_name1;
                $post['quick_link_name11']       = $request->quick_link_name11;
                $post['quick_link_url11']        = $request->quick_link_url11;

                $post['quick_link_name12'] = $request->quick_link_name12;
                $post['quick_link_url12']  = $request->quick_link_url12;

                $post['quick_link_name13'] = $request->quick_link_name13;
                $post['quick_link_url13']  = $request->quick_link_url13;

                $post['quick_link_name14'] = $request->quick_link_name14;
                $post['quick_link_url14']  = $request->quick_link_url14;

            }
            else
            {
                $post['enable_quick_link1'] = 'off';
            }

            /*QUICk LINK 2*/
            if(isset($request->enable_quick_link2) && $request->enable_quick_link2 == 'on')
            {
                $post['enable_quick_link2'] = $request->enable_quick_link2;

                $post['quick_link_header_name2'] = $request->quick_link_header_name2;
                $post['quick_link_name21']       = $request->quick_link_name21;
                $post['quick_link_url21']        = $request->quick_link_url21;

                $post['quick_link_name22'] = $request->quick_link_name22;
                $post['quick_link_url22']  = $request->quick_link_url22;

                $post['quick_link_name23'] = $request->quick_link_name23;
                $post['quick_link_url23']  = $request->quick_link_url23;

                $post['quick_link_name24'] = $request->quick_link_name24;
                $post['quick_link_url24']  = $request->quick_link_url24;

            }
            else
            {

                $post['enable_quick_link2'] = 'off';
            }
            /*QUICK LINK 3*/
            if(isset($request->enable_quick_link3) && $request->enable_quick_link3 == 'on')
            {
                $post['enable_quick_link3'] = $request->enable_quick_link3;

                $post['quick_link_header_name3'] = $request->quick_link_header_name3;
                $post['quick_link_name31']       = $request->quick_link_name31;
                $post['quick_link_url31']        = $request->quick_link_url31;

                $post['quick_link_name32'] = $request->quick_link_name32;
                $post['quick_link_url32']  = $request->quick_link_url32;

                $post['quick_link_name33'] = $request->quick_link_name33;
                $post['quick_link_url33']  = $request->quick_link_url33;

                $post['quick_link_name34'] = $request->quick_link_name34;
                $post['quick_link_url34']  = $request->quick_link_url34;

            }
            else
            {

                $post['enable_quick_link3'] = 'off';
            }
            if(!empty($fileNameToStores))
            {
                $post['footer_logo'] = $fileNameToStores;
            }
        }
        else
        {
            $post['enable_footer_note'] = 'off';
        }

        /*FOOTER 2*/
        if(isset($request->enable_footer) && $request->enable_footer == 'on')
        {
            $post['enable_footer'] = $request->enable_footer;
            $post['email']         = $request->email;
            $post['whatsapp']      = $request->whatsapp;
            $post['facebook']      = $request->facebook;
            $post['instagram']     = $request->instagram;
            $post['twitter']       = $request->twitter;
            $post['youtube']       = $request->youtube;
            $post['footer_note']   = $request->footer_note;
            $post['storejs']       = $request->storejs;
        }
        else
        {
            $post['enable_footer'] = 'off';
        }


        //Brand Logo Setting
        if(isset($request->enable_brand_logo) && $request->enable_brand_logo == 'on')
        {
            $post['enable_brand_logo'] = $request->enable_brand_logo;
        }
        else
        {
            $post['enable_brand_logo'] = 'off';
        }

        if(isset($request->file) && !empty($request->file))
        {
            $file_name = [];
            if(!empty($request->file) && count($request->file) > 0)
            {
                $i = 0;
                foreach($request->file as $file)
                {
                    $i++;
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME) . '_brand';
                    $extension       = $file->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . $i . time() . '.' . $extension;
                    $file_name[]     = $fileNameToStore;
                    $dir             = storage_path('uploads/store_logo/');
                    if(!file_exists($dir))
                    {
                        mkdir($dir, 0777, true);
                    }
                    $path = $file->storeAs('uploads/store_logo/', $fileNameToStore);
                }
            }

            if(!empty($file_name) && count($file_name) > 0)
            {
                $post['brand_logo'] = implode(',', $file_name);
            }
        }

        //Categories
        if(isset($request->enable_categories) && $request->enable_categories == 'on')
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'categories' => 'required',
                                   'categories_title' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $post['enable_categories'] = $request->enable_categories;
            $post['categories']        = !empty($request->categories) ? $request->categories : '';
            $post['categories_title']  = !empty($request->categories_title) ? $request->categories_title : '';
        }
        else
        {
            $post['enable_categories'] = 'off';
        }

        // FEATURED COURSE
        if(isset($request->enable_featuerd_course) && $request->enable_featuerd_course == 'on')
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'featured_title' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $post['enable_featuerd_course'] = $request->enable_featuerd_course;
            $post['featured_title']         = !empty($request->featured_title) ? $request->featured_title : '';
        }
        else
        {
            $post['enable_featuerd_course'] = 'off';
        }

        foreach($post as $key => $data)
        {
            $arr = [
                'name' => $key,
                'value' => $data,
                'store_id' => $store->id,
                'created_by' => Auth::user()->creatorId(),
            ];

            StoreThemeSettings::updateOrCreate(
                [
                    'name' => $key,
                    'store_id' => $store->id,
                ], $arr
            );

        }

        return redirect()->back()->with('success', __('Successfully Saved!'));
    }

    public function brandfileDelete($slug, $name)
    {
        $store                = Store::where('id', $slug)->first();
        $getStoreThemeSetting = Utility::getStoreThemeSetting($slug, $name);
        $dir                  = storage_path('uploads/store_logo/');
        $brandarray           = explode(',', $getStoreThemeSetting['brand_logo']);
        if(!empty($name))
        {
            foreach($brandarray as $k => $val)
            {
                if($val == $name)
                {
                    if(!file_exists($dir . $name))
                    {
                        unset($brandarray[$k]);
                        $brand_logo_update        = StoreThemeSettings::where('name', 'brand_logo')->where('store_id', $store->id)->first();
                        $brand_logo_update->value = implode(',', $brandarray);
                        $brand_logo_update->save();

                        return response()->json(
                            [
                                'error' => __('File not exists in folder!'),
                                'id' => $name,
                            ]
                        );
                    }
                    else
                    {
                        unlink($dir . $name);
                        unset($brandarray[$k]);
                        $post['brand_logo']       = implode(',', $brandarray);
                        $brand_logo_update        = StoreThemeSettings::where('name', 'brand_logo')->where('store_id', $store->id)->first();
                        $brand_logo_update->value = implode(',', $brandarray);
                        $brand_logo_update->save();

                        return response()->json(
                            [
                                'success' => __('Record deleted successfully!'),
                                'name' => $name,
                            ]
                        );
                    }
                }

            }
        }

    }

    public function changeTheme(Request $request, $slug)
    {
        $validator = \Validator::make(
            $request->all(), [
                               'theme_color' => 'required',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $store                = Store::find($slug);
        $store['store_theme'] = $request->theme_color;
        $store['theme_dir']   = $request->themefile;
        $store->save();

        return redirect()->back()->with('success', __('Theme Successfully Updated.'));

    }

    public function certificatedl(Request $request)
    {
        $objUser  = \Auth::guard('students')->user();
        $settings = Store::saveCertificate();
        
        $chap_id = Chapters::select('id','course_id','duration')->where('course_id',$objUser->courses_id)->get();
        $times   = Chapters::pluck('duration')->toArray();
     
        $totaltime = str_replace(':', '.', Utility::sum_time($chap_id));

        $hours  = floor($totaltime/60);
        $minute = floor($totaltime%60);
        $total_hour = sprintf('%02d:%02d', $hours, $minute);

        $course = Course::all();
        $stud   = Student::all();
        
        // $user   = Student::where('id', $objUser->id)->first();
        // dd($user);
        $course_id = Course::where('id' , $objUser->courses_id)->first();

        $student                = new \stdClass();
        $student->name          = $objUser->name;
        $student->course_name   = $course_id->title;
        $student->course_time   = $total_hour;

        
        
        return view('settings.templates.' . $settings->certificate_template, compact('settings','stud','course','student','total_hour','chap_id'));
    }

    public function ownerPassword($id)
    {
        // if(\Auth::user()->type == 'super admin')
        // {
            $eId        = \Crypt::decrypt($id);
            $user = User::find($eId);
            
            $employee = User::where('id', $eId)->first();

            return view('admin_store.reset', compact('user', 'employee'));
        // }
        
    }
    
    public function ownerPasswordReset(Request $request, $id){
        $validator = \Validator::make(
            $request->all(), [
                               'password' => 'required|confirmed|same:password_confirmation',
                           ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $user   = User::where('id', $id)->first();
        $user->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        return redirect()->back()->with('success', 'Owner Password successfully updated.');

    }

    public function paymentwallstoresession(Request $request,$slug)
    {
        $store = Store::where('slug',$slug)->first();
        $cart = session()->get($slug);
        if(\Auth::check())
        {
            $store_payment_setting = Utility::getPaymentSetting();
        }
        else
        {
            $store_payment_setting = Utility::getPaymentSetting($store->id);
        }
        if(!empty($cart))
        {
            $products = $cart['products'];
        }
        else
        {
            return redirect()->back()->with('error', __('Please add to product into cart'));
        }
        if(isset($cart['coupon']['data_id']))
        {
            $coupon = ProductCoupon::where('id', $cart['coupon']['data_id'])->first();
        }
        else
        {
            $coupon = '';
        }
        $product_name   = [];
        $product_id     = [];
        $totalprice     = 0;
        $sub_totalprice = 0;

        foreach($products as $key => $product)
        {
            $product_name[] = $product['product_name'];
            $product_id[]   = $product['id'];
            $sub_totalprice += $product['price'];
            $totalprice     += $product['price'];
        }

        return redirect()->route('paymentwall.callback',[$slug,"totalprice"=>$totalprice]);
    }

    public function community($slug, $space = null)
    {
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        $space = CommunitySpaces::where('slug', $space)->first();
        $categories = CommunityCategories::where('store_id', $store->id)->get();
        
        if($space !== null){
            $posts = CommunityPosts::where('store_id', $store->id)->where('space_id', $space->id)->orderBy('id', 'DESC')->get();
        }else{
            $posts = CommunityPosts::where('store_id', $store->id)->orderBy('id', 'DESC')->get();
        }
        
        return view('storefront.student.community', compact('store_settings', 'demoStoreThemeSetting', 'student', 'store', 'slug', 'categories', 'posts'));
    }

    public function communityStorePost(Request $request, $slug, $space = null) {
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
    
        if( $space !== null ) {
            $space = CommunitySpaces::where('slug', $space)->first();
            $space = $space->id;
        }

        $post = new CommunityPosts();
        $post->space_id = $space;
        $post->user_id = $student->id;
        $post->store_id = $store->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->author = $student->id;

        $post->save();

        if(!empty($request->image) || !empty($request->video) || !empty($request->file)){
            $media = new CommunityMedia();
        }

        if(!empty($request->image))
        {
            $image = $request->image;
            $filenameWithExt  = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = Str::slug($filename);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir = storage_path('uploads/community/media/image');
            $image_path = $dir . $media->image;
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $media->media = $fileNameToStores;
            $path = $image->storeAs('uploads/community/media/image', $fileNameToStores);

            $media->post_id = $post->id;
            $media->type = 'image';
            $media->save();
        }

        if(!empty($request->video)){
            $video = $request->video;
            $filenameWithExt  = $video->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = Str::slug($filename);
            $extension = $video->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir = storage_path('uploads/community/media/video');
            $video_path = $dir . $media->video;
            if(File::exists($video_path))
            {
                File::delete($video_path);
            }
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $post->video = $fileNameToStores;
            $path = $video->storeAs('uploads/community/media/video', $fileNameToStores);

            $media->post_id = $post->id;
            $media->media = $post->video;
            $media->type = 'video';
            $media->save();
        }

        if(!empty($request->file && count($request->file) > 0)){
            $file = $request->file;
            $filenameWithExt  = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_slug($filename);
            $extension = $file->getClientOriginalExtension();
            $fileNameToStores = $filename . '_' . time() . '.' . $extension;
            $dir = storage_path('uploads/community/media/file');
            $file_path = $dir . $media->file;
            if(File::exists($file_path))
            {
                File::delete($file_path);
            }
            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $post->file = $fileNameToStores;
            $path = $file->storeAs('uploads/community/media/file', $fileNameToStores);

            $media->post_id = $post->id;
            $media->media = $post->file;
            $media->type = 'file';
            $media->save();
        }

        return response()->json([
            'success' => true,
            'user' => $student,
            'data' => $post,
            'media' => $post->media,
        ]);
    }

    public function chapterBookmark($slug, $course_id, $header_id, $chapter_id)
    {  
        $student = Auth::guard('students')->user();
        $bookmark = new ChapterBookmark();
        $bookmark->student_id = $student->id;
        $bookmark->course_id = $course_id;
        $bookmark->header_id = $header_id;
        $bookmark->chapter_id = $chapter_id;

        $validate = chapterBookmark::where('student_id', $student->id)->where('course_id', $course_id)->first();

        if($validate !== null){
            chapterBookmark::where('student_id', $student->id)->where('course_id', $course_id)->delete();
            return response()->json([
                'status' => true,
                'action' => 'remove',
                'message' => 'Chapter removed successfully',
            ]);
        }

        $bookmark->save();
        
        return response()->json([
            'status' => true,
            'action' => 'add',
            'message' => 'Chapter saved successfully',
        ]);
    }

    public function chapterSaved($slug)
    {
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);

        $courses = ChapterBookmark::where('student_id', $student->id)->with('course')->groupBy('course_id')->get();
        $chapters = ChapterBookmark::where('student_id', $student->id)->with('chapter')->get();

        //Activity
        $chapter_activity = ChapterActivity::where('student_id', $student->id)->get();
        $activity = [];
        if($chapter_activity != null)
        {
            foreach($chapter_activity as $ch_activity)
            {
                if($ch_activity['current_time'] == null)
                {
                    $percent = $ch_activity['current_time'] = 0;
                }else{
                    $percent = round($ch_activity['current_time'] / $ch_activity['total_time'] * 100);
                }
                
                $activity[$ch_activity['chapter_id']] = [
                    'chapter_id' => $ch_activity['chapter_id'],
                    'percentage' => $percent
                ];
            }
        }
        
        return view('storefront.student.chapterSave', compact('student', 'store', 'slug', 'store_settings', 'demoStoreThemeSetting', 'chapters', 'courses', 'activity'));
    }

    function createChapterNotes(Request $request, $slug, $course_id, $header_id, $chapter_id, $current_time)
    {
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();

        $notes = new ChapterNote();
        $notes->student_id = $student->id;
        $notes->course_id = $course_id;
        $notes->header_id = $header_id;
        $notes->chapter_id = $chapter_id;
        $notes->description = $request->description;
        $notes->current_time = $current_time;
        $notes->store_id = $store->id;
        $notes->updateOrInsert(
            ['student_id' => $student->id, 'course_id' => $course_id, 'header_id' => $header_id, 'chapter_id' => $chapter_id], 
            ['description' => $request->description, 'current_time' => $current_time]
        );

        return response()->json([
            'status' => true,
            'message' => 'Chapter notes saved successfully',
        ]);
    }

    public function chapterNotes($slug)
    {
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        $notes = ChapterNote::where('student_id', $student->id)->get();

        return view('storefront.student.annotations', compact('student', 'store', 'slug', 'store_settings', 'demoStoreThemeSetting', 'notes'));
    }

    public function deleteChapterNotes($slug, $id){
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
        $store_settings = Utility::getStoreThemeSetting($store->id);
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $note_id = ChapterNote::where('id', $id)->where('student_id', $student->id)->first();
        $note_id->delete();
        $notes = ChapterNote::where('student_id', $student->id)->get();

        return view('storefront.student.annotations', compact('student', 'store', 'slug', 'store_settings', 'demoStoreThemeSetting', 'notes'));
    }

    public function live($slug)
    {   
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);
        $meetings = Meetings::where('created_by', $store->id)->get();
        $courses = Course::where('store_id', $store->id)->get();

        $last_meetings = array_filter($meetings->toArray(), function($meeting) {
            return strtotime($meeting['start_date']) < strtotime(date('Y-m-d H:i:s'));
        });

        $next_meetings = array_filter($meetings->toArray(), function($meeting){
            return strtotime($meeting['start_date']) > strtotime(date('Y-m-d H:i:s'));
        });

        $now = Carbon::now();

        $current_meeting = Meetings::where('start_date', '<=', $now)
            ->where(function ($query) use ($now) {
                $query->whereRaw('TIMESTAMPADD(HOUR, duration, start_date) > ?', [$now]);
            })
            ->first();

        $empty_meetings = $meetings ? true : false;

        return view('storefront.student.live', compact('student', 'store', 'slug', 'store_settings', 'demoStoreThemeSetting', 'last_meetings', 'next_meetings', 'current_meeting', 'empty_meetings', 'courses'));
    }

    public function ranking($slug)
    {   
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();
        $demoStoreThemeSetting = Utility::demoStoreThemeSetting($store->id);
        $store_settings = Utility::getStoreThemeSetting($store->id);

        return view('storefront.student.ranking', compact('student', 'store', 'slug', 'store_settings', 'demoStoreThemeSetting'));
    }

    public function chapterActivityStore($slug, $course_id, $chapter_id, $current_time = null, $total_time = null, $type = null){
        $student = Auth::guard('students')->user();
        $store = Store::where('slug', $slug)->first();

        $current_time = $current_time == 0 ? null : $current_time;
        $total_time = $total_time == 0 ? null : $total_time;

        if($type !== null){
            DB::table('chapter_activities')
                ->updateOrInsert(
                    ['store_id' => $store->id, 'student_id' => $student->id, 'chapter_id' => $chapter_id, 'course_id' => $course_id],
                    ['type' => $type]
                );
        }else{
            DB::table('chapter_activities')
                ->updateOrInsert(
                    ['store_id' => $store->id, 'student_id' => $student->id, 'chapter_id' => $chapter_id, 'course_id' => $course_id],
                    ['current_time' => $current_time, 'total_time' => $total_time]
                );
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Chapter activity saved successfully',
        ]);
    }
}
