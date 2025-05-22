<!DOCTYPE html>
<html lang="en" dir="{{env('SITE_RTL') == 'on'?'rtl':''}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="keywords" content="" />
        <meta name="author" content="">

        <title> @yield('page-title') - {{( Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'Rocketmember')}} </title>
        <!-- Favicon -->
        <link rel="icon" href="{{asset(Storage::url('uploads/logo/')).'/favicon.png'}}" type="image/png">

        <link rel="stylesheet" href="{{ asset('assets/newcss/dashlite.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/newcss/theme.css') }}">
        @stack('style')

    </head>
    <body class="nk-body bg-white npc-general pg-auth {{ $store_settings['cust_darklayout'] == 'on' ? 'dark-mode' : '' }}">
        <div class="wrapper">
            @yield('content')
        </div>
    </body>

    <script src="{{ asset('assets/newjs/bundle.js') }}"></script>
    <script src="{{ asset('assets/newjs/scripts.js') }}"></script>
    @stack('scripts')
    <script>
        let user__mail = document.getElementById('user__mail');
        if (user__mail) {
            user__mail.focus();
        }
    </script>
    @if(Session::has('success'))
        <script>
            toastr.clear();
            NioApp.Toast("{{ session('success') }}", 'success', {position: 'top-center'});
        </script>
        {{ Session::forget('success') }}
    @endif
    @if(Session::has('error'))
        <script>
            toastr.clear();
            NioApp.Toast("{{ session('error') }}", 'error', {position: 'top-center'});
        </script>
        {{ Session::forget('error') }}
    @endif
</html>

