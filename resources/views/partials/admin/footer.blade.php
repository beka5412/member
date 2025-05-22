
<!-- Newjs -->
<script src="{{ asset('assets/newjs/bundle.js') }}"></script>
<script src="{{ asset('assets/newjs/scripts.js') }}"></script>
<script src="{{ asset('js/app.js'.'?ver='.time()) }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('assets/newjs/charts/gd-default.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/newcss/editors/tinymce.css?ver=3.0.3') }}">
<script src="{{ asset('assets/newjs/libs/editors/tinymce.js?ver=3.0.3') }}"></script>
<script src="{{ asset('assets/newjs/libs/editors/summernote.js?ver=3.0.3') }}"></script>
<script src="{{ asset('assets/newjs/editors.js?ver=3.0.3') }}"></script>
<script>
    Dropzone.autoDiscover = false;
</script>

@stack('script-page')
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




