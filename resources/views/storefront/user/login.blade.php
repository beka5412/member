@extends('layouts.studentauth')
@section('page-title')
    {{__('Login')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@push('style')
    <style>
        .btn__theme{
            background-color: {{ $store_settings['cust_btn_color'] }};
            color: {{ $store_settings['cust_btn_text_color'] }};
        }
    </style>
@endpush
@section('head-title')
    {{__('Student Login')}}
@endsection
@section('content')

    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content">
                    <div class="nk-split nk-split-page nk-split-lg">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="card bg-blur">
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content w-50 mb-2">
                                                @if ($store_settings['cust_logo'] !== '')
                                                    <img src="{{ asset(Storage::url('uploads/logo/'.$store_settings['cust_logo'])) }}" alt="">
                                                @endif
                                            </div>
                                            <div class="nk-block-des">
                                                </div>
                                        </div>
                                        {!! Form::open(array('route' => array('student.login', $slug,(!empty($is_cart) && $is_cart==true)?$is_cart:false),'class'=>'login-form'),['method'=>'POST']) !!}
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <label>{{ __('Username') }}:</label>
                                                    </div>
                                                    {{Form::text('email',null,array('class'=>'form-control form-control-lg', 'id' => 'user__mail' , 'tabindex' => '0', 'placeholder'=>__('Enter Your Email')))}}
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-label-group">
                                                        <label>{{ __('Password') }}:</label>
                                                        <a class="link link-primary link-sm" href="{{route('student.password.request', $store->slug)}}" tabindex="-1">{{ __('Forgot Password?') }}</a>
                                                    </div>
                                                    {{Form::password('password',array('class'=>'form-control form-control-lg','id'=>'exampleInputPassword1','tabindex' => '0', 'placeholder'=>__('Enter Your Password')))}}
                                                </div>
                                                <div class="form-group">  
                                                    <button class="btn btn-lg btn-block btn__theme" type="submit">
                                                    {{ __('Login') }}
                                                    </button> 
                                                </div>
                                            </div>
                                        
                                            <!--<div class="form-container">
                                                <div class="row align-items-center"> 
                                                    <div class="col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                                        <div class="reg-lbl">{{ __('If you dont have account') }}</div> 
                                                        <a href="{{route('store.usercreate',$slug)}}" class="btn register-btn" type="submit">
                                                            {{ __('Register') }}
                                                        </a> 
                                                    </div>
                                                </div>
                                            </div>-->
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nk-split-content nk-split-stretch" style=" background-size: cover !important; background: url({{ asset(Storage::url('uploads/background/'.$store_settings['cust_background'])) }})  center;; ">
                            
                        </div>
                    </div>
                    <!-- <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">{{ __('Terms & Condition') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">{{ __('Privacy Policy') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">{{ __('Help') }}</a>
                                        </li>
                                        <li class="nav-item dropup">
                                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-bs-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                <ul class="language-list">
                                                    <li>
                                                        <a href="#" class="language-item">
                                                            <img src="./images/flags/english.png" alt="" class="language-flag">
                                                            <span class="language-name">English</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-start">
                                        <p class="text-soft">&copy; {{ \Carbon\Carbon::now()->format('Y') }} Rocketmember. {{ __('All Rights Reserved.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
@endsection

