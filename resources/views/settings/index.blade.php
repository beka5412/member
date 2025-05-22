@extends('layouts.admin')
@php
    $logo = asset(Storage::url('uploads/logo/'));
    $dark_logo = Utility::getValByName('company_logo_dark');
    $light_logo = Utility::getValByName('company_logo_light');
    $company_logo = \App\Models\Utility::GetLogo();
    $company_favicon = Utility::getValByName('company_favicon');
    $store_logo = asset(Storage::url('uploads/store_logo/'));
    $lang = Utility::getValByName('default_language');
    if (Auth::user()->type == 'Owner') {
        $store_lang = $store_settings->lang;
    }

    $SITE_RTL = $settings['SITE_RTL'];
    if($SITE_RTL == ''){
        $SITE_RTL == 'off';
    }
@endphp
@section('content')

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="row g-gs">
                <div class="col-md-12">
                    <div class="card-inner pt-0">
                        <h3 class="nk-block-title page-title">
                            @if (Auth::user()->type == 'super admin')
                                {{ __('Settings') }}
                            @else
                                {{ __('Store Settings') }}
                            @endif
                        </h3>
                        <div class="nk-block-des text-soft">
                            <p>Here you can change and edit your needs</p>
                        </div>
                    </div><!-- .card-inner -->
                </div>
                <div class="col-md-4">
                    <div class="card-inner p-0">
                        @if (Auth::user()->type == 'Owner')
                            <ul class="nav link-list-menu border border-light round m-0">
                                <li>
                                    <a href="#store_theme_setting" data-bs-toggle="tab" id="theme_setting_tab">
                                        <em class="icon ni ni-user-fill-c"></em>
                                        <span>{{ __('Store Theme Settings') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#store_site_setting" data-bs-toggle="tab" id="site_setting_tab">
                                        <em class="icon ni ni-user-fill-c"></em>
                                        {{ __('Site Settings') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#store_setting" data-bs-toggle="tab" id="store_setting_tab">
                                        <em class="icon ni ni-reports"></em>
                                        {{ __('Store Settings') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#certificate_setting" data-bs-toggle="tab" id="certificate_store_setting">
                                        <em class="icon ni ni-user-fill-c"></em>
                                        {{ __('Certificate Settings') }}
                                    </a>
                                </li>
                                <!--<li>
                                    <a href="#slack-setting" data-bs-toggle="tab" id="slack_store_setting" id="email_store_setting">
                                        <em class="icon ni ni-user-fill-c"></em>
                                        {{ __('Slack Settings') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#telegram-setting" data-bs-toggle="tab" id="telegram_store_setting" id="email_store_setting">
                                        <em class="icon ni ni-user-fill-c"></em>
                                        {{ __('Telegram Settings') }}
                                    </a>
                                </li>-->
                            </ul>
                        @endif
                        @if (Auth::user()->type == 'super admin')
                            <ul class="nav link-list-menu border border-light round m-0">
                                <li>
                                    <a href="#site_setting" data-bs-toggle="tab" id="site_setting_tab">
                                        <em class="icon ni ni-user-fill-c"></em>
                                        {{ __('Site Settings') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#email_setting" data-bs-toggle="tab" id="system_setting_tab">
                                        <em class="icon ni ni-user-fill-c"></em>
                                        {{ __('Email Settings') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#recaptcha-settings" data-bs-toggle="tab" id="system_setting_tab">
                                        <em class="icon ni ni-user-fill-c"></em>
                                        {{ __('ReCaptcha Settings') }}
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content">
                        @if (Auth::user()->type == 'super admin')
                            <div id="site_setting" class="tab-pane active nk-block-head nk-block-head-lg">
                                <div class="card-title">
                                    <h5 class="title">{{ __('Site Settings') }}</h5>
                                </div>
                                {{ Form::model($settings, ['route' => 'business.setting','method' => 'POST','enctype' => 'multipart/form-data']) }}
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">                                   
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="small-title">{{ __('Dark Logo') }}</h5>
                                                    </div>
                                                    <div class="card-body setting-card setting-logo-box p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="logo-content logo-set-bg  text-center py-2">
                                                                    @if (!empty($store_settings->logo))
                                                                        <a href="{{ asset(Storage::url('uploads/store_logo/' . $store_settings->logo)) }}" target="_blank">
                                                                            <img src="{{ asset(Storage::url('uploads/store_logo/' . $store_settings->logo)) }}" id="logoDark" width="170px" class="img_setting">
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" target="_blank">
                                                                            <img src="{{ asset(Storage::url('uploads/logo/logo-dark.png')) }}" id="logoDark" width="170px" class="img_setting">
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="choose-files mt-4">
                                                                    <label for="logo_dark" class="form-label d-block">
                                                                        <div class="bg-primary m-auto"> <i class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                                            <input type="file" name="logo_dark" id="logo_dark" class="form-control file mb-3" data-filename="logo_dark" onchange="document.getElementById('logoDark').src = window.URL.createObjectURL(this.files[0])">
                                                                        </div>                                                                 
                                                                    </label>
                                                                    {{-- <input type="file" name="logo_dark" id="logo_dark" class="form-control file" data-filename="logo_dark"> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="small-title">{{ __('Light Logo') }}</h5>
                                                    </div>
                                                    <div class="card-body setting-card setting-logo-box p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="logo-content logo-set-bg  text-center py-2">
                                                                    @if (!empty($store_settings->logo))
                                                                        <a href="{{ asset(Storage::url('uploads/store_logo/' . $store_settings->logo)) }}" target="_blank">
                                                                            <img src="{{ asset(Storage::url('uploads/store_logo/' . $store_settings->logo)) }}" id="logoLight" width="170px" class="img_setting">
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ asset(Storage::url('uploads/logo/logo-light.png')) }}" target="_blank">
                                                                            <img src="{{ asset(Storage::url('uploads/logo/logo-light.png')) }}" id="logoLight" width="170px" class="img_setting">
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="choose-files mt-4">
                                                                    <label for="logo_light" class="form-label d-block">
                                                                        <div class="bg-primary m-auto"> <i class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                                            <input type="file" name="logo_light" id="logo_light" class="form-control file mb-3" data-filename="company_logo_update" onchange="document.getElementById('logoLight').src = window.URL.createObjectURL(this.files[0])">
                                                                        </div>
                                                                        {{-- <input type="file" name="logo_light" id="logo_light" class="form-control file" data-filename="company_logo_update"> --}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="small-title">{{ __('Favicon') }}</h5>
                                                    </div>
                                                    <div class="card-body setting-card setting-logo-box p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="logo-content logo-set-bg  text-center py-2">
                                                                    <a href="{{ $logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}" target="_blank">
                                                                        <img src="{{ $logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png') }}" id="blah" width="50px" class="img_setting">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">

                                                                <div class="choose-files mt-4">
                                                                    <label for="favicon" class="form-label d-block">
                                                                        <div class="bg-primary m-auto"> <i class="ti ti-upload px-1"></i>{{ __('Choose file here') }}
                                                                            <input type="file" name="favicon" id="favicon" class="form-control file mb-3" data-filename="company_logo_update" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                                        </div>
                                                                        {{-- <input type="file" name="favicon" id="favicon" class="form-control file" data-filename="company_logo_update"> --}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                {{ Form::label('title_text', __('Title Text'), ['class' => 'form-label']) }}
                                                {{ Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')]) }}
                                                @error('title_text')
                                                    <span class="invalid-title_text" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{ Form::label('footer_text', __('Footer Text'), ['class' => 'form-label']) }}
                                                {{ Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')]) }}
                                                @error('footer_text')
                                                    <span class="invalid-footer_text" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{ Form::label('default_language', __('Default Language'), ['class' => 'form-label']) }}
                                                <div class="changeLanguage">
                                                    <select name="default_language" id="default_language"
                                                        class="form-control form-select">
                                                        @foreach (Utility::languages() as $language)
                                                            <option @if ($lang == $language) selected @endif
                                                                value="{{ $language }}">
                                                                {{ Str::upper($language) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-12 col-md-12">
                                                <div class="row">
                                                    <div class="col switch-width">
                                                        <div class="form-group">
                                                            {{ Form::label('display_landing_page_', __('Landing Page Display'), ['class' => 'form-label']) }}
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="" name="display_landing_page" id="display_landing_page" {{ $settings['display_landing_page'] == 'on' ? 'checked="checked"' : '' }}>
                                                                <label class="custom-control-label" for="display_landing_page"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col switch-width">
                                                        <div class="form-group">
                                                            <div class="custom-switch">
                                                                <input type="checkbox" class="custom-control-input" name="SITE_RTL" id="SITE_RTL" {{ $settings['SITE_RTL'] == 'on' ? 'checked="checked"' : '' }}>
                                                                <label class="custom-control-label" for="SITE_RTL"></label>
                                                            </div>
                                                        </div>
                                                    </div>                                    
                                                    <div class="col switch-width">
                                                        <div class="form-group">
                                                            {{ Form::label('signup', __('Signup'), ['class' => 'form-label']) }}
                                                            <div class="custom-switch">
                                                                <input type="checkbox" class="custom-control-input" name="signup" id="signup" {{ $settings['signup'] == 'on' ? 'checked="checked"' : '' }}>
                                                                <label class="custom-control-label" for="signup"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>                            
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('currency_symbol', __('Default Currency Symbol *')) }}
                                                    {{ Form::text('currency_symbol', null, ['class' => 'form-control']) }}
                                                    <small>{{ __('Note: This value will assign when any new store created by Store Owner.') }}</small>
                                                    @error('currency_symbol')
                                                        <span class="invalid-currency_symbol" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('currency', __('Default Currency *')) }}
                                                    {{ Form::text('currency', null, ['class' => 'form-control font-style']) }}
                                                    {{ __('Note: Add currency code as per three-letter ISO code.') }}
                                                    <small>
                                                        <a href="https://stripe.com/docs/currencies"
                                                            target="_blank">{{ __('you can find out here..') }}</a>
                                                    </small>
                                                    <br>
                                                    <small>
                                                        {{ __('This value will assign when any new store created by Store Owner.') }}
                                                    </small>    
                                                    @error('currency')
                                                        <span class="invalid-currency" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h4 class="small-title">{{ __('Theme Customizer') }}</h4>
                                                <div class="setting-card setting-logo-box p-3">
                                                    <div class="row">
                                                        <div class="pct-body">
                                                            <div class="row">
                                                                <div class="col-lg-4 col-xl-4 col-md-4">
                                                                    <h6 class="mt-2">
                                                                        <i data-feather="credit-card"
                                                                            class="me-2"></i>{{ __('Primary color settings') }}
                                                                    </h6>
                                                                    <hr class="my-2" />
                                                                    <div class="theme-color themes-color">
                                                                        <a href="#!" class="{{($settings['color'] == 'theme-1') ? 'active_color' : ''}}" data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                                        <input type="radio" class="theme_color" name="color" value="theme-1" style="display: none;">
                                                                        <a href="#!" class="{{($settings['color'] == 'theme-2') ? 'active_color' : ''}}" data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                                        <input type="radio" class="theme_color" name="color" value="theme-2" style="display: none;">
                                                                        <a href="#!" class="{{($settings['color'] == 'theme-3') ? 'active_color' : ''}}" data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                                        <input type="radio" class="theme_color" name="color" value="theme-3" style="display: none;">
                                                                        <a href="#!" class="{{($settings['color'] == 'theme-4') ? 'active_color' : ''}}" data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                                        <input type="radio" class="theme_color" name="color" value="theme-4" style="display: none;">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-xl-4 col-md-4">
                                                                    <h6 class="mt-2">
                                                                        <i data-feather="layout" class="me-2"></i>{{ __('Sidebar settings') }}
                                                                    </h6>
                                                                    <hr class="my-2"/>
                                                                    <div class="form-check form-switch">
                                                                        <input type="checkbox" class="form-check-input" id="cust-theme-bg" name="cust_theme_bg" {{ Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : '' }} />
                                                                        <label class="form-check-label f-w-600 pl-1" for="cust-theme-bg">{{ __('Transparent layout') }}</label>
                                                                    </div>                                                                
                                                                </div>

                                                                <div class="col-lg-4 col-xl-4 col-md-4">
                                                                    <h6 class="mt-2">
                                                                        <i data-feather="sun" class="me-2"></i>{{ __('Layout settings') }}
                                                                    </h6>
                                                                    <hr class="my-2"/>
                                                                    <div class="form-check form-switch mt-2">
                                                                        <input type="checkbox" class="form-check-input" id="cust-darklayout" name="cust_darklayout" {{ Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : '' }} />
                                                                        <label class="form-check-label f-w-600 pl-1" for="cust-darklayout">{{ __('Dark Layout') }}</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    </div>
                                {{ Form::close() }}
                            </div>

                            <div id="payment-setting" class="tab-pane">
                                <div class="card-header">
                                    <h5 class="mb-2">{{ __('Payment Settings') }}</h5>
                                    <small class="text-secondary">{{ __('This detail will use for make purchase of plan.') }}</small>
                                </div>
                                {{ Form::open(['route' => 'payment.setting', 'method' => 'post']) }}
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                        <label class="col-form-label">{{__('Currency')}} *</label>
                                                        <input type="text" name="currency" class="form-control" value="{{ env('CURRENCY')}}" required>
                                                        <small class="text-xs">
                                                            {{ __('Note: Add currency code as per three-letter ISO code') }}.
                                                            <a href="https://stripe.com/docs/currencies" target="_blank">{{ __('you can find out here..') }}</a>
                                                        </small>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                        <label for="currency_symbol" class="col-form-label">{{__('Currency Symbol*')}}</label>
                                                        <input type="text" name="currency_symbol" class="form-control" value=" {{ env('CURRENCY_SYMBOL') }}" required>
                                                    </div>                                                        
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="faq justify-content-center">
                                            <div class="col-sm-12 col-md-10 col-xxl-12">
                                                <div class="accordion accordion-flush" id="accordionExample">

                                                    <!-- Strip -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-2">
                                                            <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Stripe') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse1" class="accordion-collapse collapse"aria-labelledby="heading-2-2"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Stripe') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">

                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_stripe_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_stripe_enabled" id="is_stripe_enabled" {{ isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_stripe_enabled">{{__('Enable Stripe')}}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="stripe_key" class="col-form-label">{{__('Stripe Key')}}</label>
                                                                            <input class="form-control" placeholder="{{__('Stripe Key')}}" name="stripe_key" type="text" value="{{ isset($admin_payment_setting['stripe_key']) ? $admin_payment_setting['stripe_key'] : '' }}" id="stripe_key">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="stripe_secret" class="col-form-label">{{__('Stripe Secret')}}</label>
                                                                            <input class="form-control " placeholder="{{ __('Stripe Secret') }}" name="stripe_secret" type="text" value="{{ isset($admin_payment_setting['stripe_secret']) ? $admin_payment_setting['stripe_secret'] : '' }}" id="stripe_secret">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Paypal -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-3">
                                                            <button class="accordion-button collapsed"  type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Paypal') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse2" class="accordion-collapse collapse"aria-labelledby="heading-2-3"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Paypal') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>                                                               

                                                                    
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_paypal_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_paypal_enabled" id="is_paypal_enabled" {{ isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_paypal_enabled">{{__('Enable Paypal')}}</label>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="paypal-label col-form-label" for="paypal_mode">{{__('Paypal Mode')}}</label> <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-labe text-dark {{ isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox' ? 'active' : ''  }}">
                                                                                            <input type="radio" name="paypal_mode" value="sandbox" class="form-check-input" {{ (isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == '') || (isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox') ? 'checked="checked"' : '' }}>{{ __('Sandbox') }} 
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-labe text-dark {{ isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'active' : '' }}">
                                                                                            <input type="radio" name="paypal_mode" value="live" class="form-check-input"   {{ isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : '' }}>{{ __('Live') }}
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="paypal_client_id" class="col-form-label">{{ __('Client ID') }}</label>
                                                                            <input type="text" name="paypal_client_id" id="paypal_client_id" class="form-control" value="{{ isset($admin_payment_setting['paypal_client_id']) ? $admin_payment_setting['paypal_client_id'] : '' }}" placeholder="{{ __('Client ID') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="paypal_secret_key" class="col-form-label">{{ __('Secret Key') }}</label>
                                                                            <input type="text" name="paypal_secret_key" id="paypal_secret_key" class="form-control" value="{{ isset($admin_payment_setting['paypal_secret_key']) ? $admin_payment_setting['paypal_secret_key'] : '' }}" placeholder="{{ __('Secret Key') }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Paystack -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-4">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Paystack') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse3" class="accordion-collapse collapse"aria-labelledby="heading-2-4"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Paystack') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_paystack_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_paystack_enabled" id="is_paystack_enabled" {{ isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_paystack_enabled">{{__('Enable Paystack')}}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="paypal_client_id" class="col-form-label">{{ __('Public Key')}}</label>
                                                                            <input type="text" name="paystack_public_key" id="paystack_public_key" class="form-control" value="{{ isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key'] : '' }}" placeholder="{{ __('Public Key')}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="paystack_secret_key" class="col-form-label">{{ __('Secret Key') }}</label>
                                                                            <input type="text" name="paystack_secret_key" id="paystack_secret_key" class="form-control" value="{{ isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key'] : '' }}" placeholder="{{ __('Secret Key') }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- FLUTTERWAVE -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-5">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Flutterwave') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse4" class="accordion-collapse collapse"aria-labelledby="heading-2-5"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Flutterwave') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_flutterwave_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_flutterwave_enabled" id="is_flutterwave_enabled" {{ isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_flutterwave_enabled">{{__('Enable Flutterwave')}}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="paypal_client_id" class="col-form-label">{{ __('Public Key')}}</label>
                                                                            <input type="text" name="flutterwave_public_key" id="flutterwave_public_key" class="form-control" value="{{ isset($admin_payment_setting['flutterwave_public_key']) ? $admin_payment_setting['flutterwave_public_key'] : '' }}"
                                                                            placeholder="{{ __('Public Key') }}" placeholder="Public Key">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="paystack_secret_key" class="col-form-label">{{ __('Secret Key') }}</label>
                                                                            <input type="text" name="flutterwave_secret_key" id="flutterwave_secret_key" class="form-control" value="{{ isset($admin_payment_setting['flutterwave_secret_key']) ? $admin_payment_setting['flutterwave_secret_key'] : '' }}" placeholder="Secret Key">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Razorpay -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-6">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Razorpay') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse5" class="accordion-collapse collapse"aria-labelledby="heading-2-6"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Razorpay') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_razorpay_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_razorpay_enabled" id="is_razorpay_enabled" {{ isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_razorpay_enabled">{{__('Enable Razorpay')}}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="razorpay_public_key" class="col-form-label">{{ __('Public Key') }}</label>

                                                                            <input type="text" name="razorpay_public_key" id="razorpay_public_key" class="form-control" value="{{ isset($admin_payment_setting['razorpay_public_key']) ? $admin_payment_setting['razorpay_public_key'] : '' }}" placeholder="Public Key">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="razorpay_secret_key" class="col-form-label">{{ __('Secret Key') }}</label>
                                                                            <input type="text" name="razorpay_secret_key" id="razorpay_secret_key" class="form-control" value="{{ isset($admin_payment_setting['razorpay_secret_key']) ? $admin_payment_setting['razorpay_secret_key'] : '' }}" placeholder="Secret Key">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Paytm -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-7">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Paytm') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse6" class="accordion-collapse collapse"aria-labelledby="heading-2-7"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Paytm') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>

                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_paytm_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_paytm_enabled" id="is_paytm_enabled" {{ isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_paytm_enabled">{{__('Enable Paytm')}}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="paypal-label col-form-label" for="paypal_mode">{{ __('Paytm Environment') }}</label> <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-labe text-dark {{  isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local' ? 'active' : ''  }}">

                                                                                            <input type="radio" name="paytm_mode" value="local" class="form-check-input" {{ (isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == '') || (isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local') ? 'checked="checked"' : '' }}>
                                                                                        
                                                                                            {{__('Local')}}  
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-labe text-dark {{ isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'live' ? 'active' : '' }}">
                                                                                            <input type="radio" name="paytm_mode" value="production" class="form-check-input" {{ isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : '' }}>
                                                                                        
                                                                                            {{__('Production')}}
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="paytm_public_key" class="col-form-label">{{ __('Merchant ID') }}</label>
                                                                            <input type="text" name="paytm_merchant_id" id="paytm_merchant_id" class="form-control" value="{{ isset($admin_payment_setting['paytm_merchant_id']) ? $admin_payment_setting['paytm_merchant_id'] : '' }}"
                                                                            placeholder="{{ __('Merchant ID') }}" placeholder="Merchant ID">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="paytm_secret_key" class="col-form-label">{{ __('Merchant Key') }}</label>
                                                                            <input type="text" name="paytm_merchant_key" id="paytm_merchant_key" class="form-control" value="{{ isset($store_payment_setting['paytm_merchant_key']) ? $store_payment_setting['paytm_merchant_key'] : '' }}" placeholder="Merchant Key">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="paytm_industry_type" class="col-form-label">{{ __('Industry Type') }}</label>
                                                                            <input type="text" name="paytm_industry_type" id="paytm_industry_type" class="form-control" value="{{ isset($store_payment_setting['paytm_industry_type']) ? $store_payment_setting['paytm_industry_type'] : '' }}" placeholder="Industry Type">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Mercado Pago-->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-8">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Mercado Pago') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse7" class="accordion-collapse collapse"aria-labelledby="heading-2-8"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Mercado Pago') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_mercado_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_mercado_enabled" id="is_mercado_enabled" {{ isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_mercado_enabled">{{__('Enable Mercado Pago')}}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="coingate-label col-form-label" for="mercado_mode">{{__('Mercado Mode')}}</label> <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-labe text-dark{{ isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'sandbox' ? 'active' : '' }}">
                                                                                            <input type="radio" name="mercado_mode" value="sandbox" class="form-check-input"  {{ (isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == '') || (isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'sandbox') ? 'checked="checked"' : '' }}>
                                                                                            {{__('Sandbox')}}  
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-labe text-dark {{ isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'live' ? 'active' : '' }}">
                                                                                            <input type="radio" name="mercado_mode" value="live" class="form-check-input" {{ isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'live' ? 'checked="checked"' : '' }}>
                                                                                            {{__('Live')}}
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="mercado_access_token" class="col-form-label">{{ __('Access Token') }}</label>
                                                                            <input type="text" name="mercado_access_token" id="mercado_access_token" class="form-control" value="{{ isset($admin_payment_setting['mercado_access_token']) ? $admin_payment_setting['mercado_access_token'] : '' }}" placeholder="{{ __('Access Token') }}"/>                                                        
                                                                            @if ($errors->has('mercado_secret_key'))
                                                                                <span class="invalid-feedback d-block">
                                                                                    {{ $errors->first('mercado_access_token') }}
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Mollie -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-9">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Mollie') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse8" class="accordion-collapse collapse"aria-labelledby="heading-2-9"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Mollie') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_mollie_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_mollie_enabled" id="is_mollie_enabled" {{ isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_mollie_enabled">{{__('Enable Mollie')}}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="mollie_api_key" class="col-form-label">{{ __('Mollie Api Key') }}</label>
                                                                            <input type="text" name="mollie_api_key" id="mollie_api_key" class="form-control" value="{{ isset($admin_payment_setting['mollie_api_key']) ? $admin_payment_setting['mollie_api_key'] : '' }}" placeholder="Mollie Api Key">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="mollie_profile_id" class="col-form-label">{{ __('Mollie Profile Id') }}</label>
                                                                            <input type="text" name="mollie_profile_id" id="mollie_profile_id" class="form-control" value="{{ isset($admin_payment_setting['mollie_profile_id']) ? $admin_payment_setting['mollie_profile_id'] : '' }}" placeholder="Mollie Profile Id">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="mollie_partner_id" class="col-form-label">{{ __('Mollie Partner Id') }}</label>
                                                                            <input type="text" name="mollie_partner_id" id="mollie_partner_id" class="form-control" value="{{ isset($admin_payment_setting['mollie_partner_id']) ? $admin_payment_setting['mollie_partner_id'] : '' }}" placeholder="Mollie Partner Id">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Skrill -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-10">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="true" aria-controls="collapse9">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('Skrill') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse9" class="accordion-collapse collapse"aria-labelledby="heading-2-10"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('Skrill') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_skrill_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_skrill_enabled" id="is_skrill_enabled"  {{ isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_skrill_enabled">{{__('Enable Skrill')}}</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="mollie_api_key" class="col-form-label">{{ __('Skrill Email') }}</label>
                                                                            <input type="text" name="skrill_email" id="skrill_email" class="form-control" value="{{ isset($admin_payment_setting['skrill_email']) ? $admin_payment_setting['skrill_email'] : '' }}" placeholder="Enter Skrill Email">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- CoinGate -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-11">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('CoinGate') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse10" class="accordion-collapse collapse"aria-labelledby="heading-2-11"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('CoinGate') }}</h5>
                                                                        <small> {{ __('Note: This detail will use for make checkout of shopping cart.') }}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_coingate_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_coingate_enabled" id="is_coingate_enabled" {{ isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_coingate_enabled">{{__('Enable CoinGate')}}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="col-form-label" for="coingate_mode">{{ __('CoinGate Mode') }}</label> <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-labe text-dark {{ isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'active' : '' }}">

                                                                                            <input type="radio" name="coingate_mode" value="sandbox" class="form-check-input" {{ (isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == '') || (isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox') ? 'checked="checked"' : '' }}>
                                                                                            {{__('Sandbox')}}  
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-3">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-labe text-dark {{ isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'active' : '' }}">
                                                                                            <input type="radio" name="coingate_mode" value="live" class="form-check-input" {{ isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : '' }}>
                                                                                            {{__('Live')}}
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="coingate_auth_token" class="col-form-label">{{ __('CoinGate Auth Token') }}</label>
                                                                            <input type="text" name="coingate_auth_token" id="coingate_auth_token" class="form-control" value="{{ isset($admin_payment_setting['coingate_auth_token']) ? $admin_payment_setting['coingate_auth_token'] : '' }}" placeholder="{{ __('CoinGate Auth Token') }}">
                                                                        </div>

                                                                        @if ($errors->has('coingate_auth_token'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('coingate_auth_token') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- PaymentWall -->
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header" id="heading-2-12">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
                                                                <span class="d-flex align-items-center">
                                                                    <i class="ti ti-credit-card text-primary"></i> {{ __('PaymentWall') }}
                                                                </span>
                                                            </button>
                                                        </h2>
                                                        <div id="collapse11" class="accordion-collapse collapse"aria-labelledby="heading-2-12"data-bs-parent="#accordionExample" >
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-6 py-2">
                                                                        <h5 class="h5">{{ __('PaymentWall') }}</h5>
                                                                        <small> {{__('Note: This detail will use for make checkout of plan.')}}</small>
                                                                    </div>
                                                                    <div class="col-6 py-2 text-end">
                                                                        <div class="form-check form-switch d-inline-block">
                                                                            <input type="hidden" name="is_paymentwall_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input" name="is_paymentwall_enabled" id="is_paymentwall_enabled" {{ isset($admin_payment_setting['is_paymentwall_enabled'])  && $admin_payment_setting['is_paymentwall_enabled']== 'on' ? 'checked="checked"' : '' }}>
                                                                            <label class="custom-control-label form-label" for="is_paymentwall_enabled">{{__('Enable PaymentWall')}}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="paymentwall_public_key" class="col-form-label">{{ __('Public Key')}}</label>
                                                                            <input type="text" name="paymentwall_public_key" id="paymentwall_public_key" class="form-control" value="{{ isset($admin_payment_setting['paymentwall_public_key'])?$admin_payment_setting['paymentwall_public_key']:''}}" placeholder="{{ __('Public Key')}}">
                                                                        </div>
                                                                        @if ($errors->has('paymentwall_public_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paymentwall_public_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="paymentwall_secret_key" class="col-form-label">{{ __('Secret Key') }}</label>
                                                                            <input type="text" name="paymentwall_secret_key" id="paymentwall_secret_key" class="form-control" value="{{ isset($admin_payment_setting['paymentwall_secret_key'])?$admin_payment_setting['paymentwall_secret_key']:''}}" placeholder="{{ __('Secret Key') }}">
                                                                        </div>
                                                                        @if ($errors->has('paymentwall_secret_key'))
                                                                            <span class="invalid-feedback d-block">
                                                                                {{ $errors->first('paymentwall_secret_key') }}
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        {{ Form::submit(__('Save Changes'), ['class' =>'btn btn-primary']) }}
                                    </div>
                                {{ Form::close() }}
                            </div>

                            <div id="email_setting" class="tab-pane">
                                <div class="card-header">
                                    <h5 class="mb-2">{{ __('Email Settings') }}</h5>
                                </div>
                                {{ Form::open(['route' => 'email.setting', 'method' => 'post']) }}
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                {{ Form::label('mail_driver', __('Mail Driver'), array('class'=>'form-label')) }}
                                                {{ Form::text('mail_driver', env('MAIL_DRIVER'), ['class' => 'form-control','placeholder' => __('Enter Mail Driver')]) }}
                                                @error('mail_driver')
                                                    <span class="invalid-mail_driver" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('mail_host', __('Mail Host'), array('class'=>'form-label')) }}
                                                {{ Form::text('mail_host', env('MAIL_HOST'), ['class' => 'form-control ','placeholder' => __('Enter Mail Host')]) }}
                                                @error('mail_host')
                                                    <span class="invalid-mail_driver" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('mail_port', __('Mail Port'), array('class'=>'form-label')) }}
                                                {{ Form::text('mail_port', env('MAIL_PORT'), ['class' => 'form-control','placeholder' => __('Enter Mail Port')]) }}
                                                @error('mail_port')
                                                    <span class="invalid-mail_port" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('mail_username', __('Mail Username'), array('class'=>'form-label')) }}
                                                {{ Form::text('mail_username', env('MAIL_USERNAME'), ['class' => 'form-control','placeholder' => __('Enter Mail Username')]) }}
                                                @error('mail_username')
                                                    <span class="invalid-mail_username" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('mail_password', __('Mail Password', array('class'=>'form-label'))) }}
                                                {{ Form::text('mail_password', env('MAIL_PASSWORD'), ['class' => 'form-control','placeholder' => __('Enter Mail Password')]) }}
                                                @error('mail_password')
                                                    <span class="invalid-mail_password" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('mail_encryption', __('Mail Encryption'), array('class'=>'form-label')) }}
                                                {{ Form::text('mail_encryption', env('MAIL_ENCRYPTION'), ['class' => 'form-control','placeholder' => __('Enter Mail Encryption')]) }}
                                                @error('mail_encryption')
                                                    <span class="invalid-mail_encryption" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('mail_from_address', __('Mail From Address'), array('class'=>'form-label')) }}
                                                {{ Form::text('mail_from_address', env('MAIL_FROM_ADDRESS'), ['class' => 'form-control','placeholder' => __('Enter Mail From Address')]) }}
                                                @error('mail_from_address')
                                                    <span class="invalid-mail_from_address" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('mail_from_name', __('Mail From Name'), array('class'=>'form-label')) }}
                                                {{ Form::text('mail_from_name', env('MAIL_FROM_NAME'), ['class' => 'form-control','placeholder' => __('Enter Mail From Name')]) }}
                                                @error('mail_from_name')
                                                    <span class="invalid-mail_from_name" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row card-footer reverse-rtl-row">
                                        <div class="form-group col-md-6">
                                            <a href="#" data-url="{{ route('test.mail') }}" data-ajax-popup="true"
                                                data-title="{{ __('Send Test Mail') }}"
                                                class="btn btn-primary">
                                                {{ __('Send Test Mail') }}
                                            </a>
                                        </div>
                                        <div class="form-group col-md-6 text-end">
                                            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                        </div>
                                    </div>
                                {{ Form::close() }}                                                      
                            </div>

                            <div id="recaptcha-settings" class="tab-pane">
                                <form method="POST" action="{{ route('recaptcha.settings.store') }}" accept-charset="UTF-8">
                                    @csrf
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="mb-2">{{ __('ReCaptcha settings') }}</h5>
                                                <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                                    target="_blank" class="text-blue">
                                                    <small>({{ __('How to Get Google reCaptcha Site and Secret key') }})</small>
                                                </a>
                                            </div>
                                            <div class="col switch-width text-end">
                                                <div class="form-group mb-0">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="" name="recaptcha_module" id="recaptcha_module" value="yes" {{ env('RECAPTCHA_MODULE') == 'yes' ? 'checked="checked"' : '' }}>
                                                        <label class="custom-control-label" for="recaptcha_module"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                            
                            
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_key"
                                                    class="form-label">{{ __('Google Recaptcha Key') }}</label>
                                                <input class="form-control"
                                                    placeholder="{{ __('Enter Google Recaptcha Key') }}"
                                                    name="google_recaptcha_key" type="text"
                                                    value="{{ env('NOCAPTCHA_SITEKEY') }}" id="google_recaptcha_key">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                                <label for="google_recaptcha_secret"
                                                    class="form-label">{{ __('Google Recaptcha Secret') }}</label>
                                                <input class="form-control "
                                                    placeholder="{{ __('Enter Google Recaptcha Secret') }}"
                                                    name="google_recaptcha_secret" type="text"
                                                    value="{{ env('NOCAPTCHA_SECRET') }}" id="google_recaptcha_secret">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-lg-12  text-end">
                                            <input type="submit" value="{{ __('Save Changes') }}"
                                                class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>                          
                            </div>
                        @endif

                        @if (\Auth::user()->type == 'Owner')

                            <div id="store_site_setting" class="tab-pane active">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="card-title">
                                        <h5 class="title">{{ __('Store Site Settings') }}</h5>
                                    </div>
                                </div>
                                {{ Form::model($settings, ['route' => 'business.setting','method' => 'POST','enctype' => 'multipart/form-data']) }}
                                    <div class="card g-3">
                                        <div class="row g-3">
                                            <div class="col-sm-12">
                                                <div class="card-inner card-bordered">
                                                    <div class="card-title">
                                                        <h5 class="title">{{ __('Favicon') }}</h5>
                                                    </div>
                                                    <div class="card-body setting-card setting-logo-box p-3">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="logo-content logo-set-bg text-center py-2">
                                                                    <a href="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" target="_blank">
                                                                        <img src="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')}}" id="blah4" width="50px" class="img_setting">  
                                                                    </a>                                                            
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="choose-files mt-4">
                                                                    <label for="favicon"  class="form-label d-block">
                                                                        <div class="m-auto">
                                                                            <input type="file" name="favicon" id="favicon" class="form-control file" data-filename="company_logo_update" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])">
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                {{ Form::label('title_text', __('Title Text')) }}
                                                {{ Form::text('title_text', null, ['class' => 'form-control', 'placeholder' => __('Title Text')]) }}
                                                @error('title_text')
                                                    <span class="invalid-title_text" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('footer_text', __('Footer Text')) }}
                                                {{ Form::text('footer_text', null, ['class' => 'form-control', 'placeholder' => __('Footer Text')]) }}
                                                @error('footer_text')
                                                    <span class="invalid-footer_text" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="site_date_format" class="form-control-label">{{__('Date Format')}}</label>
                                                <select type="text" name="site_date_format" class="form-control selectric" id="site_date_format">
                                                    <option value="M j, Y" @if(@$settings['site_date_format'] == 'M j, Y') selected="selected" @endif>Jan 1,2015</option>
                                                    <option value="d-m-Y" @if(@$settings['site_date_format'] == 'd-m-Y') selected="selected" @endif>d-m-y</option>
                                                    <option value="m-d-Y" @if(@$settings['site_date_format'] == 'm-d-Y') selected="selected" @endif>m-d-y</option>
                                                    <option value="Y-m-d" @if(@$settings['site_date_format'] == 'Y-m-d') selected="selected" @endif>y-m-d</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="site_time_format" class="form-control-label">{{__('Time Format')}}</label>
                                                <select type="text" name="site_time_format" class="form-control selectric" id="site_time_format">
                                                    <option value="g:i A" @if(@$settings['site_time_format'] == 'g:i A') selected="selected" @endif>10:30 PM</option>
                                                    <option value="g:i a" @if(@$settings['site_time_format'] == 'g:i a') selected="selected" @endif>10:30 pm</option>
                                                    <option value="H:i" @if(@$settings['site_time_format'] == 'H:i') selected="selected" @endif>22:30</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col switch-width">
                                                <div class="form-group">
                                                    <div class="custom-switch">
                                                        <input type="checkbox" name="SITE_RTL" class="custom-control-input" id="active" {{ $settings['SITE_RTL'] == 'on' ? 'checked="checked"' : '' }}>
                                                        <label class="custom-control-label" for="active">{{ __('RTL') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="row">
                                            <h4 class="title">{{ __('Theme Customizer') }}</h4>
                                            <div class="setting-card setting-logo-box p-3">
                                                <div class="row">
                                                    <div class="pct-body">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-xl-4 col-md-4">
                                                                <h6 class="mt-2">{{ __('Primary color settings') }}
                                                                </h6>
                                                                <div class="theme-color themes-color">
                                                                    <a href="#!" class="{{($settings['color'] == 'theme-1') ? 'active_color' : ''}}" data-value="theme-1" onclick="check_theme('theme-1')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-1" style="display: none;" {{($settings['color'] == 'theme-1') ? 'checked' : ''}}>
                                                                    <a href="#!" class="{{($settings['color'] == 'theme-2') ? 'active_color' : ''}}" data-value="theme-2" onclick="check_theme('theme-2')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-2" style="display: none;" {{($settings['color'] == 'theme-2') ? 'checked' : ''}}>
                                                                    <a href="#!" class="{{($settings['color'] == 'theme-3') ? 'active_color' : ''}}" data-value="theme-3" onclick="check_theme('theme-3')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-3" style="display: none;" {{($settings['color'] == 'theme-3') ? 'checked' : ''}}>
                                                                    <a href="#!" class="{{($settings['color'] == 'theme-4') ? 'active_color' : ''}}" data-value="theme-4" onclick="check_theme('theme-4')"></a>
                                                                    <input type="radio" class="theme_color" name="color" value="theme-4" style="display: none;" {{($settings['color'] == 'theme-4') ? 'checked' : ''}}>
                                                                </div>
                                                            </div>
                                                            

                                                            <div class="col-lg-4 col-xl-4 col-md-4">
                                                                <h6 class="mt-2">
                                                                    {{ __('Sidebar settings') }}
                                                                </h6>
                                                                <div class="form-check form-switch mt-2">
                                                                    <input type="checkbox" class="form-check-input" id="cust-theme-bg" name="cust_theme_bg" {{ Utility::getValByName('cust_theme_bg') == 'on' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="cust-theme-bg">{{ __('Transparent layout') }}</label>
                                                                </div>                                                             
                                                            </div>

                                                            <div class="col-lg-4 col-xl-4 col-md-4">
                                                                <h6 class="mt-2">
                                                                    {{ __('Layout settings') }}
                                                                </h6>
                                                                <div class="form-check form-switch mt-2">
                                                                    <input type="checkbox" class="form-check-input" id="cust-darklayout" name="cust_darklayout" {{ Utility::getValByName('cust_darklayout') == 'on' ? 'checked' : '' }} />
                                                                    <label class="form-check-label" for="cust-darklayout">{{ __('Dark Layout') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 text-end">
                                            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                        </div>                                
                                    </div>
                                {{ Form::close() }}
                            </div>

                            <div id="store_setting" class="tab-pane">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="card-title">
                                        <h5 class="title">{{ __('Store Settings') }}</h5>
                                    </div>
                                </div>
                                {{ Form::model($store_settings, ['route' => ['settings.store', $store_settings['id']],'method' => 'POST','enctype' => 'multipart/form-data']) }}
                                    <div class="card">
                                        <div class="row g-gs">
                                            <div class="col-sm-6">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title">
                                                            <h5 class="title">{{ __(' Logo') }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="logo-content logo-set-bg  text-center py-2">
                                                                    @if (!empty($store_settings['logo']))
                                                                        <a href="{{ $store_logo . '/' . (isset($store_settings['logo']) && !empty($store_settings['logo']) ? $store_settings['logo'] : 'logo.png') }}" target="_blank">
                                                                            <img src="{{ $store_logo . '/' . (isset($store_settings['logo']) && !empty($store_settings['logo']) ? $store_settings['logo'] : 'logo.png') }}" id="blah5" width="170px" class="img_setting">
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ $store_logo . '/' . 'logo.png' }}" target="_blank">
                                                                            <img src="{{ $store_logo . '/' . 'logo.png' }}" id="blah5" width="170px" class="img_setting">
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="choose-files mt-4">
                                                                    <label for="logo" class="form-label d-block">
                                                                        <div class="m-auto company_logo_update">
                                                                            <input type="file" name="logo" id="logo" class="form-control file" data-filename="company_logo_update" onchange="document.getElementById('blah5').src = window.URL.createObjectURL(this.files[0])">
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                   
                                            <div class="col-sm-6">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title">
                                                            <h5 class="title">{{ __('Invoice Logo') }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="logo-content logo-set-bg  text-center py-2">
                                                                    <a href="{{$store_logo.'/'.(isset($store_settings['invoice_logo']) && !empty($store_settings['invoice_logo'])?$store_settings['invoice_logo']:'invoice_logo.png')}}" target="_blank">
                                                                        <img src="{{$store_logo.'/'.(isset($store_settings['invoice_logo']) && !empty($store_settings['invoice_logo'])?$store_settings['invoice_logo']:'invoice_logo.png')}}" id="blah6" width="170px" class="img_setting">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="choose-files mt-4">
                                                                    <label for="invoice_logo" class="form-label d-block">
                                                                        <div class="m-auto company_logo_update">
                                                                            <input type="file" name="invoice_logo" id="invoice_logo" class="form-control file" data-filename="company_logo_update" onchange="document.getElementById('blah6').src = window.URL.createObjectURL(this.files[0])">
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('store_name', __('Store Name'), ['class' => 'form-label']) }}
                                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Store Name')]) !!}
                                                @error('store_name')
                                                    <span class="invalid-store_name" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email')]) }}
                                                @error('email')
                                                    <span class="invalid-email" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            @if ($plan->enable_custdomain == 'on')
                                                <div class="col-md-12">
                                                    <ul class="custom-control-group">
                                                        <li class="mb-2">
                                                            <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                <input type="radio" class="custom-control-input" name="enable_domain" value="enable_storelink" id="enable_storelink" {{ $store_settings['enable_storelink'] == 'on' ? 'active' : '' }}>
                                                                <label class="custom-control-label" for="enable_domain">{{ __('Store Link') }}</label>
                                                            </div>
                                                        </li>
                                                        <li class="mb-2">
                                                            <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                <input type="radio" class="custom-control-input" name="enable_domain" value="enable_domain" id="enable_domain" {{ $store_settings['enable_domain'] == 'on' ? 'active' : '' }}>
                                                                <label class="custom-control-label" for="enable_domain">{{ __('Domain') }}</label>
                                                            </div>
                                                        </li>                                                     
                                                        @if ($plan->enable_custsubdomain == 'on')
                                                            <li class="mb-2">
                                                                <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                                                    <input type="radio" class="custom-control-input" name="enable_domain" value="enable_subdomain" id="enable_subdomain" {{ $store_settings['enable_subdomain'] == 'on' ? 'active' : '' }}>
                                                                    <label class="custom-control-label" for="enable_domain">{{ __('Sub Domain') }}</label>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                    <div class="text-sm mt-2" id="domainnote" style="display: none">
                                                        {{ __('Note : Before add custom domain, your domain A record is pointing to our server IP :') }}{{ $serverIp }}
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12" id="StoreLink"
                                                    style="{{ $store_settings['enable_storelink'] == 'on' ? 'display: block' : 'display: none' }}">
                                                    {{ Form::label('store_link', __('Store Link'), ['class' => 'form-label']) }}
                                                    <div class="input-group">
                                                        <input type="text" value="{{ $store_settings['store_url'] }}"
                                                            id="myInput" class="form-control d-inline-block"
                                                            aria-label="Recipient's username" aria-describedby="button-addon2"
                                                            readonly>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary" type="button"
                                                                onclick="myFunction()" id="button-addon2"><i
                                                                    class="far fa-copy"></i>
                                                                {{ __('Copy Link') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 domain"
                                                    style="{{ $store_settings['enable_domain'] == 'on' ? 'display:block' : 'display:none' }}">
                                                    {{ Form::label('store_domain', __('Custom Domain'), ['class' => 'form-label']) }}
                                                    {{ Form::text('domains', $store_settings['domains'], ['class' => 'form-control','placeholder' => __('xyz.com')]) }}
                                                </div>
                                                @if ($plan->enable_custsubdomain == 'on')
                                                    <div class="form-group col-md-6 sundomain"
                                                        style="{{ $store_settings['enable_subdomain'] == 'on' ? 'display:block' : 'display:none' }}">
                                                        {{ Form::label('store_subdomain', __('Sub Domain'), ['class' => 'form-label']) }}
                                                        <div class="input-group">
                                                            {{ Form::text('subdomain', $store_settings['slug'], ['class' => 'form-control','placeholder' => __('Enter Domain'),'readonly']) }}
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="basic-addon2">.{{ $subdomain_name }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="form-group col-md-6" id="StoreLink">
                                                    {{ Form::label('store_link', __('Store Link'), ['class' => 'form-label']) }}
                                                    <div class="input-group">
                                                        <input type="text" value="{{ $store_settings['store_url'] }}"
                                                            id="myInput" class="form-control d-inline-block"
                                                            aria-label="Recipient's username" aria-describedby="button-addon2"
                                                            readonly>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary" type="button"
                                                                onclick="myFunction()" id="button-addon2"><i
                                                                    class="far fa-copy"></i>
                                                                {{ __('Copy Link') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="form-group col-md-4">
                                                {{ Form::label('tagline', __('Tagline'), ['class' => 'form-label']) }}
                                                {{ Form::text('tagline', null, ['class' => 'form-control', 'placeholder' => __('Tagline')]) }}
                                                @error('tagline')
                                                    <span class="invalid-tagline" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{ Form::label('address', __('Address'), ['class' => 'form-label']) }}
                                                {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('Address')]) }}
                                                @error('address')
                                                    <span class="invalid-address" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{ Form::label('city', __('City'), ['class' => 'form-label']) }}
                                                {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('City')]) }}
                                                @error('city')
                                                    <span class="invalid-city" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{ Form::label('state', __('State'), ['class' => 'form-label']) }}
                                                {{ Form::text('state', null, ['class' => 'form-control', 'placeholder' => __('State')]) }}
                                                @error('state')
                                                    <span class="invalid-state" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{ Form::label('zipcode', __('Zipcode'), ['class' => 'form-label']) }}
                                                {{ Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => __('Zipcode')]) }}
                                                @error('zipcode')
                                                    <span class="invalid-zipcode" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{ Form::label('country', __('Country'), ['class' => 'form-label']) }}
                                                {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => __('Country')]) }}
                                                @error('country')
                                                    <span class="invalid-country" role="alert">
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                {{ Form::label('store_default_language', __('Store Default Language'), ['class' => 'form-label']) }}
                                                <div class="changeLanguage">
                                                    <select name="store_default_language" id="store_default_language"
                                                        class="form-control form-select">
                                                        @foreach (\App\Models\Utility::languages() as $language)
                                                            <option @if ($store_lang == $language) selected @endif value="{{ $language }}"> {{ Str::upper($language) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <i class="fab fa-google" aria-hidden="true"></i>
                                                    {{ Form::label('google_analytic', __('Google Analytic'), ['class' => 'form-label']) }}
                                                    {{ Form::text('google_analytic', null, ['class' => 'form-control', 'placeholder' => 'UA-XXXXXXXXX-X']) }}
                                                    @error('google_analytic')
                                                        <span class="invalid-google_analytic" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('storejs', __('Store Custom JS'), ['class' => 'form-label']) }}
                                                    {{ Form::textarea('storejs', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Store Custom JS')]) }}
                                                    @error('storejs')
                                                        <span class="invalid-storejs" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                                    {{ Form::label('facebook_pixel_code', __('Facebook Pixel'), ['class' => 'form-label']) }}
                                                    {{ Form::text('fbpixel_code', null, ['class' => 'form-control', 'placeholder' => 'UA-0000000-0']) }}
                                                    @error('facebook_pixel_code')
                                                        <span class="invalid-google_analytic" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('zoom_apikey', __('Zoom API Key'), ['class' => 'form-label']) }}
                                                    {{ Form::text('zoom_apikey', isset($store_settings['zoom_apikey']) ? $store_settings['zoom_apikey'] : '', ['class' => 'form-control','placeholder' => __('Enter Zoom API Key')]) }}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('zoom_apisecret', __('Zoom API Secret'), ['class' => 'form-label']) }}
                                                    {{ Form::text('zoom_apisecret',isset($store_settings['zoom_apisecret']) ? $store_settings['zoom_apisecret'] : '',['class' => 'form-control', 'placeholder' => __('Enter Zoom API Secret')]) }}
                                                </div>
                                            </div>
                                            <div class="col-12 pt-4">
                                                <h5 class="h6 mb-0">{{ __('Email Subscriber Setting') }}</h5>
                                                <small>{{ __('This detail will use to change header setting.') }}</small>
                                                <hr class="my-4">
                                            </div>

                                            <div class="col-12 pt-4">
                                                <h5 class="h6 mb-0">{{ __('Footer Note') }}</h5>
                                                <small>{{ __('This detail will use for make explore social media.') }}</small>
                                                <hr class="my-4">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <i class="fas fa-envelope"></i>
                                                    {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                                                    {{ Form::text('email', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Email')]) }}
                                                    @error('email')
                                                        <span class="invalid-email" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                                    {{ Form::label('whatsapp', __('Whatsapp'), ['class' => 'form-label']) }}
                                                    {{ Form::text('whatsapp', null, ['class' => 'form-control','rows' => 3,'placeholder' => 'https://wa.me/1XXXXXXXXXX']) }}
                                                    @error('whatsapp')
                                                        <span class="invalid-whatsapp" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <i class="fab fa-facebook-square" aria-hidden="true"></i>
                                                    {{ Form::label('facebook', __('Facebook'), ['class' => 'form-label']) }}
                                                    {{ Form::text('facebook', null, ['class' => 'form-control','rows' => 3,'placeholder' => 'https://www.facebook.com/']) }}
                                                    @error('facebook')
                                                        <span class="invalid-facebook" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <i class="fab fa-instagram" aria-hidden="true"></i>
                                                    {{ Form::label('instagram', __('Instagram'), ['class' => 'form-label']) }}
                                                    {{ Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'https://www.instagram.com/']) }}
                                                    @error('instagram')
                                                        <span class="invalid-instagram" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                                    {{ Form::label('twitter', __('Twitter'), ['class' => 'form-label']) }}
                                                    {{ Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'https://twitter.com/']) }}
                                                    @error('twitter')
                                                        <span class="invalid-twitter" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <i class="fab fa-youtube" aria-hidden="true"></i>
                                                    {{ Form::label('youtube', __('Youtube'), ['class' => 'form-label']) }}
                                                    {{ Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'https://www.youtube.com/']) }}
                                                    @error('youtube')
                                                        <span class="invalid-youtube" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <i class="fas    fa-copyright" aria-hidden="true"></i>
                                                    {{ Form::label('footer_note', __('Footer Note'), ['class' => 'form-label']) }}
                                                    {{ Form::text('footer_note', null, ['class' => 'form-control', 'placeholder' => __('Footer Note')]) }}
                                                    @error('footer_note')
                                                        <span class="invalid-footer_note" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card g-3">
                                        <div class="col-sm-12">
                                            <div class="text-end">
                                                <button type="button" class="btn bs-pass-para btn-secondary btn-light"
                                                    data-title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?') }}"
                                                    data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                                                    data-confirm-yes="delete-form-{{ $store_settings->id }}">
                                                    <span class="text-black">{{ __('Delete Store') }}</span>
                                                </button>
                                                {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary mx-2']) }}
                                            </div>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                                {!! Form::open(['method' => 'DELETE', 'route' => ['ownerstore.destroy', $store_settings->id], 'id' => 'delete-form-' . $store_settings->id]) !!}
                                {!! Form::close() !!}
                            </div>

                            <div id="certificate_setting" class="tab-pane">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="card-title">
                                        <h5 class="title">{{ __('Certificate Settings')}}</h5>
                                    </div>
                                </div>                       
                                <div class="card">
                                    <form id="setting-form" method="post" action="{{ route('certificate.template.setting') }}">
                                        @csrf
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h6 class="font-weight-bold">{{ __('Certificate Variable') }}</h6>
                                                            <div class="col-6 float-left">
                                                                <p class="mb-1">{{ __('Store Name') }} : <span class="pull-right text-primary">{header_name}</span></p>
                                                                <p class="mb-1">{{ __('Student Name') }} : <span class="pull-right text-primary">{student_name}</span></p>
                                                                <p class="mb-1">{{ __('Course Time') }} : <span class="pull-right text-primary">{course_time}</span></p>
                                                                <p class="mb-1">{{ __('Course Name') }} : <span class="pull-right text-primary">{course_name}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="storejs"
                                                                    class="form-label">{store_name}</label>
                                                                {{ Form::text('header_name', $store->header_name, ['class' => 'form-control','placeholder' => '{header_name}']) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body pb-0">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row justify-content-between">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="address"
                                                                        class="form-label">{{ __('Certificate Template') }}</label>
                                                                    <select class="form-control select2" name="certificate_template">
                                                                        @foreach (Utility::templateData()['templates'] as $key => $template)
                                                                            <option value="{{ $key }}"
                                                                                {{ isset($store->certificate_template) && $store->certificate_template == $key ? 'selected' : '' }}>
                                                                                {{ $template }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <label class="form-label form-label">{{ __('Color Input') }}</label>
                                                                    <div class="row gutters-xs">
                                                                        @foreach (Utility::templateData()['colors'] as $key => $color)
                                                                            <div class="col-auto">
                                                                                <label class="colorinput">
                                                                                    <input name="certificate_color" type="radio"
                                                                                        value="{{ $color['hex'] }}"
                                                                                        class="colorinput-input"
                                                                                        {{ isset($store->certificate_color) && $store->certificate_color == $color['hex'] ? 'checked' : '' }}
                                                                                        data-gradiant='{{ $color['gradiant'] }}'>
                                                                                    <span class="colorinput-color"
                                                                                        style="background: #{{ $color['hex'] }}"></span>
                                                                                </label>
                                                                            </div>
                                                                        @endforeach
                                                                        <input type="hidden" name="gradiant" id="gradiant"
                                                                            value="{{ $color['gradiant'] }} ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 mb-3 text-end align-items-end d-flex justify-content-end">
                                                                <button class="btn btn-primary">
                                                                    {{ __('Save') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <iframe id="certificate_frame" class="certificate_iframe w-100" frameborder="0" src="{{ route('certificate.preview', [isset($store->certificate_template) && !empty($store->certificate_template)? $store->certificate_template: 'template1',isset($store->certificate_color) && !empty($store->certificate_color) ? $store->certificate_color : 'b10d0d',isset($store->certificate_gradiant) && !empty($store->certificate_gradiant)? $store->certificate_gradiant: 'color-one']) }}"></iframe>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>                            
                            </div>

                            <div id="slack-setting" class="tab-pane">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="card-title">
                                        <h5 class="title">{{('Slack Settings')}}</h5>
                                    </div>
                                </div>
                                {{ Form::open(['route' => 'slack.setting','id' => 'setting-form','method' => 'post','class' => 'd-contents']) }}
                                    <div class="card g-3">
                                        <div class="row g-gs">
                                            <div class="col-md-12">
                                                <h4 class="title">{{ __('Slack Webhook URL') }}</h4>
                                                <div class="col-md-8">
                                                    {{ Form::text('slack_webhook', isset($notifications['slack_webhook']) ? $notifications['slack_webhook'] : '', ['class' => 'form-control w-100','placeholder' => __('Enter Slack Webhook URL'),'required' => 'required']) }}
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-6">
                                                <h4 class="title">{{ __('Module Setting') }}</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <span>{{ __('Course create') }}</span>
                                                <div class="form-check form-check form-switch custom-control-inline">
                                                    {{ Form::checkbox('course_notification','1',isset($notifications['course_notification']) && $notifications['course_notification'] == '1' ? 'checked' : '',['class' => 'form-check-input', 'id' => 'course_notification']) }}
                                                    <label class="form-check-label" for="course_notification"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <span>{{ __('Store create') }}</span>
                                                <div class="form-check form-check form-switch custom-control-inline">
                                                    {{ Form::checkbox('store_notification','1',isset($notifications['store_notification']) && $notifications['store_notification'] == '1' ? 'checked' : '',['class' => 'form-check-input', 'id' => 'store_notification']) }}
                                                    <label class="form-check-label" for="store_notification"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <span>{{ __('Order create') }}</span>
                                                <div class="form-check form-check form-switch custom-control-inline">
                                                    {{ Form::checkbox('order_notification','1',isset($notifications['order_notification']) && $notifications['order_notification'] == '1' ? 'checked' : '',['class' => 'form-check-input', 'id' => 'order_notification']) }}
                                                    <label class="form-check-label" for="order_notification"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <span> {{ __('Zoom Meeting create') }}</span>
                                                <div class="form-check form-check form-switch custom-control-inline">
                                                    {{ Form::checkbox('zoom_meeting_notification','1',isset($notifications['zoom_meeting_notification']) && $notifications['zoom_meeting_notification'] == '1'? 'checked': '',['class' => 'form-check-input', 'id' => 'zoom_meeting_notification']) }}
                                                    <label class="form-check-label" for="zoom_meeting_notification"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="text-end">
                                            <input class="btn btn-primary" type="submit" value="{{ __('Save Changes') }}">
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>

                            <div id="telegram-setting" class="tab-pane">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="card-title">
                                        <h5 class="title">{{('Telegram Settings')}}</h5>
                                    </div>
                                </div>
                                {{ Form::open(['route' => 'telegram.setting','id' => 'telegram-setting','method' => 'post','class' => 'd-contents']) }}
                                    <div class="card g-3">
                                        <div class="row g-gs">
                                            <div class="card-body pd-0">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label
                                                            class="form-label mb-0">{{ __('Telegram AccessToken') }}</label>
                                                        <br>
                                                        {{ Form::text('telegram_accestoken',isset($notifications['telegram_accestoken']) ? $notifications['telegram_accestoken'] : '',['class' => 'form-control', 'placeholder' => __('Enter Telegram AccessToken')]) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label
                                                            class="form-label mb-0">{{ __('Telegram ChatID') }}</label>
                                                        <br>
                                                        {{ Form::text('telegram_chatid',isset($notifications['telegram_chatid']) ? $notifications['telegram_chatid'] : '',['class' => 'form-control', 'placeholder' => __('Enter Telegram ChatID')]) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <h4 class="small-title">{{ __('Module Setting') }}</h4>
                                                </div>
                                                <div class="row g-gs">
                                                    <div class="col-md-6">
                                                        <span>{{ __('Course create') }}</span>
                                                        <div class="form-check form-check form-switch custom-control-inline">
                                                            {{ Form::checkbox('telegram_course_notification','1',isset($notifications['telegram_course_notification']) && $notifications['telegram_course_notification'] == '1'? 'checked': '',['class' => 'form-check-input', 'id' => 'telegram_course_notification']) }}
                                                            <label class="form-check-label"
                                                                for="telegram_course_notification"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span>{{ __('Store create') }}</span>
                                                        <div class="form-check form-check form-switch custom-control-inline">
                                                            {{ Form::checkbox('telegram_store_notification','1',isset($notifications['telegram_store_notification']) && $notifications['telegram_store_notification'] == '1'? 'checked': '',['class' => 'form-check-input', 'id' => 'telegram_store_notification']) }}
                                                            <label class="form-check-label"
                                                                for="telegram_store_notification"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span>{{ __('Order create') }}</span>
                                                        <div class="form-check form-check form-switch custom-control-inline">
                                                            {{ Form::checkbox('telegram_order_notification','1',isset($notifications['telegram_order_notification']) && $notifications['telegram_order_notification'] == '1'? 'checked': '',['class' => 'form-check-input', 'id' => 'telegram_order_notification']) }}
                                                            <label class="form-check-label" for="telegram_order_notification"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span> {{ __('Zoom Meeting create') }}</span>
                                                        <div class="form-check form-check form-switch custom-control-inline">
                                                            {{ Form::checkbox('telegram_zoom_meeting_notification','1',isset($notifications['telegram_zoom_meeting_notification']) &&$notifications['telegram_zoom_meeting_notification'] == '1'? 'checked': '',['class' => 'form-check-input', 'id' => 'telegram_zoom_meeting_notification']) }}
                                                            <label class="form-check-label" for="telegram_zoom_meeting_notification"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="text-end">
                                            <input class="btn btn-primary" type="submit" value="{{ __('Save Changes') }}">
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
