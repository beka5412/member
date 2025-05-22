@php
    $logo=asset(Storage::url('uploads/logo/'));
    $favicon= Utility::getValByName('company_favicon');
    $company_logo = \App\Models\Utility::GetLogo();
    $setting = App\Models\Utility::colorset();

    $intercom_name = json_encode(\Auth::user()->name);
    $intercom_mail = json_encode(\Auth::user()->email);
    $intercom_created_at = strtotime(\Auth::user()->created_at);
@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="RocketMember">
    <meta name="author" content="Rajodiya Infotech">

    <title>@yield('page-title') - {{( Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'LMSGo')}}</title>
    <link rel="icon" href="https://rocketpays.app/uploads/1/22/12/63af8d37ba71a3012221672449335.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- New CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/newcss/libs/fontawesome-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newcss/dashlite.css'.'?ver'.time()) }}">
    <link rel="stylesheet" href="{{ asset('assets/newcss/theme.css'.'?ver'.time()) }}">
    <link rel="stylesheet" href="{{ asset('assets/newcss/editors/summernote.css?ver=3.0.3') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iconpicker.css'.'?ver'.time()) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css'.'?ver'.time()) }}">

    <script>
      (function(d,t) {
        var BASE_URL="https://app.chatwoot.com";
        var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=BASE_URL+"/packs/js/sdk.js";
        g.defer = true;
        g.async = true;
        s.parentNode.insertBefore(g,s);
        g.onload=function(){
          window.chatwootSDK.run({
            websiteToken: 'JiDCGieg1gE8E6vfr7zCUxeg',
            baseUrl: BASE_URL
          })
        }
      })(document,"script");
    </script>
</head>
