@php
    $setting = App\Models\Utility::colorset();
    $color = (!empty($setting['color'])) ? $setting['color'] : 'theme-3';
    // $color = 'theme-3';
    // if (!empty($setting['color'])) {
    //     $color = $setting['color'];
    // }

$logo = asset(Storage::url('uploads/logo/'));
$company_logo = \App\Models\Utility::GetLogo();
$footer_text = isset(Utility::settings()['footer_text']) ? Utility::settings()['footer_text'] : '';

@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{$setting['SITE_RTL'] == 'on'?'rtl':''}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="LMSGo - Learning Management System">
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech">

    <title> @yield('page-title') - {{( Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'LMSGo-SaaS')}} </title>
    <!-- Favicon -->
    <link rel="icon" href="https://rocketpays.app/uploads/1/22/12/63af8d37ba71a3012221672449335.png">

    <link rel="stylesheet" href="{{ asset('assets/newcss/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newcss/theme.css') }}">

</head>
<body class="nk-body bg-white npc-general pg-auth">
<div class="nk-app-root">
    <!-- main @s -->

    <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content " style=" background-image: url(https://painel.rocketleads.com.br/images/plataformas/fundo.png); background-position: top;">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-dark logo-img logo-img-lg" src="{{asset('images/login-logo.png')}}" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Acessar dashboard</h4>
                                        <div class="nk-block-des">
                                            <p>Acesse o painel usando seu e-mail e senha.</p>
                                        </div>
                                    </div>
                                </div>
                                {{Form::open(array('route'=>'login','method'=>'post','id'=>'loginForm', 'class'=>'form-validate is-alter'))}}
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            {{Form::label('email',__('Email'),array('class' => 'form-label','id'=>'email'))}}
                                        </div>
                                        <div class="form-control-wrap">
                                            {{Form::text('email',null,array('class'=>'form-control form-control-lg','placeholder'=>__('Enter Your Email address')))}}
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            {{Form::label('password',__('Password'),array('class' => 'form-label','id'=>'password'))}}
                                            <a class="link link-primary link-sm" tabindex="-1" href="{{ route('password.request',$lang) }}">{{ __('Enter Your Password') }}</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            {{Form::password('password',array('class'=>'form-control form-control-lg','placeholder'=>__('Enter Your Password')))}}
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">{{ __('Login') }}</button>
                                    </div>
                                {{Form::close()}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>

</div>
<!-- app-root @e -->
<!-- JavaScript -->
<!-- select region modal -->


    <script src="{{ asset('assets/newjs/bundle.js') }}"></script>
    <script src="{{ asset('assets/newjs/scripts.js') }}"></script>

</body>

<!-- Required Js -->

@stack('custom-scripts')

</html>

