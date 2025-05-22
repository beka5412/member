@extends('layouts.shopfront')
@section('page-title')
    {{ ucfirst($pageoption->name) }} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@push('css-page')
@endpush
@section('head-title')
    {{ ucfirst($pageoption->name) }}
@endsection
@section('content')

    <section class="common-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="common-banner-content">
                        <a href="{{route('store.slug',$store->slug)}}" class="back-btn">
                            <span class="svg-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="5" viewBox="0 0 11 5" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5791 2.28954C10.5791 2.53299 10.3818 2.73035 10.1383 2.73035L1.52698 2.73048L2.5628 3.73673C2.73742 3.90636 2.74146 4.18544 2.57183 4.36005C2.40219 4.53467 2.12312 4.53871 1.9485 4.36908L0.133482 2.60587C0.0480403 2.52287 -0.000171489 2.40882 -0.000171488 2.2897C-0.000171486 2.17058 0.0480403 2.05653 0.133482 1.97353L1.9485 0.210321C2.12312 0.0406877 2.40219 0.044729 2.57183 0.219347C2.74146 0.393966 2.73742 0.673036 2.5628 0.842669L1.52702 1.84888L10.1383 1.84875C10.3817 1.84874 10.5791 2.04609 10.5791 2.28954Z" fill="white"></path>
                                </svg>
                            </span>
                            {{__('Back to home')}}
                        </a>
                        <div class="section-title">
                            <h2>{{ ucfirst($pageoption->name) }}</h2>
                        </div>
                        <p> {{ __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.') }}</p>
                    </div>
                </div>
            </div>
            <div class="banner-image">
                {{-- <img src="{{ asset('assets/imgs/Male-Running-common.png') }}" alt=""> --}}
                @php
                    $data=explode(".",$store->store_theme);                               
                @endphp

                @if($data[0]=='yellow-style')
                    <img src="{{ asset('assets/imgs/Male-Running-common1.png') }}" alt="">
                @elseif($data[0]=='blue-style')
                    <img src="{{ asset('assets/imgs/Male-Running-common2.png') }}" alt="">
                @else
                    <img src="{{ asset('assets/imgs/Male-Running-common3.png') }}" alt="">
                @endif
            </div>
        </div>
    </section>
    <section class="padding-top padding-bottom about-our-shop-section">
        <div class="container">
            <div class="aboutus-content">
                {{-- <h4>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h4> --}}
                <p> {!! $pageoption->contents !!} </p>
            </div>
        </div>
    </section>
    @if($store->enable_subscriber == 'on')
        <section class="newsletter-section padding-bottom" id="newsletter">
            <div class="container">
                <div class="newsletter-content-wrap">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="newsletter-left">
                                <div class="section-title">
                                    <h2><b>{{ $store->subscriber_title }}</b></h2>
                                </div>
                                <p>{{ $store->sub_title }}</p>
                                <div class="newsletter-form">
                                    {{Form::open(array('route' => array('subscriptions.store_email', $store->id),'method' => 'POST'))}}
                                        <div class="input-wrapper">
                                            {{Form::email('email',null,array('aria-label'=>'Enter your email address','placeholder'=>__('Enter Your Email Address')))}}
                                                <button type="submit" class="btn btn-secondary ">{{__('SUBSCRIBE')}}</button>
                                        </div>
                                        <p>{{__('We will never spam to you. Only useful info')}}</p>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 newsletter-right-side">
                            <div class="newsletter-image">
                                @if(!empty($store->sub_img))
                                    <img src="{{asset(Storage::url('uploads/store_logo/'.$store->sub_img))}}" alt="newsletter">
                                @else
                                    <img src="{{asset('assets/'.$store->theme_dir.'/img/newsletter.png')}}" alt="newsletter">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif


@endsection
@push('script-page')
@endpush


