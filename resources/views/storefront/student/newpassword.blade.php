@extends('layouts.studentauth')
@section('page-title')
    {{__('Login')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@push('css-page')
@endpush
@section('head-title')
    {{__('Reset your password')}}
@endsection
@section('content')
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content">
                    <div style="height: 100vh; display: flex;align-items: center;justify-content: center;">
                        <div class="">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="card bg-blur">
                                    <div class="card-inner card-inner-lg" style="min-width: 360px">
                                        {!! Form::open(array('route' => array('student.password.update', $slug)), ['method' => 'post']) !!}
                                            <input type="hidden" name="token" value="{{ $token }}">
                                            <div class="form-group">
                                                {{Form::text('email',null,array('class'=>'form-control form-control-lg','placeholder'=>__('Enter Your Email')))}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::password('password',array('class'=>'form-control form-control-lg','placeholder'=>__('Enter Your Password')))}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::password('password_confirmation',array('class'=>'form-control form-control-lg','placeholder'=>__('Confirm Password')))}}
                                            </div>
                                            <div class="text-center">
                                                {{Form::submit(__('Enviar'),array('class'=>'btn btn-block btn-lg btn-primary mt-4 mb-3','id'=>'saveBtn'))}}
                                            </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script>
        if('{!! !empty($is_cart) && $is_cart==true !!}'){
            show_toastr('Error', 'You need to login!', 'error');
        }
    </script>
@endpush
