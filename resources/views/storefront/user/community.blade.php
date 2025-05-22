<!DOCTYPE html>
<html lang="en" dir="{{env('SITE_RTL') == 'on'?'rtl':''}}">
@php
    $userstore = \App\Models\UserStore::where('store_id', $store->id)->first();
    $settings = \DB::table('settings')->where('name','company_favicon')->where('created_by', $userstore->user_id)->first();
@endphp
@php
    if(!empty(session()->get('lang'))){
        $currantLang = session()->get('lang');
    }else{
        $currantLang = $store->lang;
    }
    $languages= Utility::languages();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta name="author" content="">

    <title> @yield('page-title') - {{( Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'Rocketmember')}} </title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset(Storage::url('uploads/favicon/'. $store_settings['cust_favicon']))}}" type="image/png">
 
    <link rel="stylesheet" href="{{ asset('assets/newcss/dashlite.css'.'?ver'.time()) }}">
    <link rel="stylesheet" href="{{ asset('assets/newcss/theme.css'.'?ver'.time()) }}">
    <link rel="stylesheet" href="{{ asset('assets/newcss/libs/fontawesome-icons.css'.'?ver'.time()) }}">
    <link rel="stylesheet" href="{{ asset('css/store.css'.'?ver'.time()) }}">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar no-touch {{ $store_settings['cust_darklayout'] == 'on' ? 'dark-mode' : '' }}">
    <div class="nk-app-root">
        <div class="nk-main">
            @yield('sidebar')
            <div class="nk-wrap" data-id="nk-wrap">
                @include('partials.student.header')
                @yield('top')
                @yield('content')
            </div>
        </div>
    </div>

    {!! $demoStoreThemeSetting['storejs'] !!}

    <script src="{{ asset('assets/newjs/bundle.js') }}"></script>
    <script src="{{ asset('assets/newjs/scripts.js') }}"></script>
    @stack('script-page')
</body>
</html>

