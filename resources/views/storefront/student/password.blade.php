@extends('layouts.studentauth')
@section('page-title')
    {{__('Login')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@push('css-page')
@endpush
@push('scripts')
    <script>
        let button  = document.getElementById('saveBtn')
        let form = document.getElementById('frmTarget')
        
        button.addEventListener('click', function(e){
            e.preventDefault();
            button.setAttribute('disabled', '')
            form.submit()
        })
    </script>
@endpush
@section('head-title')
    {{__('Rest Password')}}
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
                                    <div class="card-inner card-inner-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content w-50 mb-2">
                                                @if ($store_settings['cust_logo'] !== '')
                                                    <img src="{{ asset(Storage::url('uploads/logo/'.$store_settings['cust_logo'])) }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        {!! Form::open(array('route' => array('student.password.email', $slug), 'method' => 'POST', 'id' => 'frmTarget')) !!}
                                            <p class="small">{{__('Enter your email below to proceed')}}.</p>
                                            <div class="form-group">
                                                {{Form::text('email',null,array('class'=>'form-control form-control-lg','placeholder'=>__('Enter Your Email')))}}
                                            </div>
                                            <div class="text-center">
                                                {{Form::submit(__('Send password reset link'),array('class'=>'btn btn-block btn-lg btn-primary mt-4 mb-3','id'=>'saveBtn'))}}
                                                {{__('Back to')}}
                                                <a href="{{route('student.login',$slug)}}">{{__('Login')}}</a>
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
