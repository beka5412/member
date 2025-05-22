@php
    $agent = (new \Jenssegers\Agent\Agent())->isMobile() ? true : false;
@endphp
@extends('storefront.user.user')
@section('page-title')
    {{__('My purchased Courses')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@push('script-page')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <style>
        :root{
            --swiper-theme-color: #8094ae;
        }
        .hero {
	position: relative;
	width: 100vw;
	height: 600px;
	overflow: hidden;
}

.hero--video {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 100vw;
	height: 56.25vw;
	transform: translate(-50%, -50%);
}

.hero--overlay {
	position: absolute;
	top: 0;
	left: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	height: 100%;
	text-align: center;
}

.hero--title {
    color: white;
    font-size: 47px;
    width: 800px;
    margin: 0;
}

.hero--subtitle {
	color: white;
	font-size: 32px;
	font-weight: 300;
	margin: 0;
}

.hero--button {
	display: inline-block;
	color: white;
	text-decoration: none;
	padding: 10px 30px;
	border: 1px solid;
	margin: 50px 10px 0;
	font-size: 20px;
	transition: color 0.2s, box-shadow 0.2s;
	
	&:hover {
		color: black;
		box-shadow: inset 0 0 0 2em white;
	}
}

.hero--button-alt {
	color: black;
	box-shadow: inset 0 0 0 2em white;

	&:hover {
		color: white;
		box-shadow: inset 0 0 0 0 white;
	}
}
    </style>
@endpush
@section('head-title')
    {{__('Welcome').', '.\Illuminate\Support\Facades\Auth::guard('students')->user()->name}}
@endsection
@section('content')
    <div class="home__slider">
        <div class="swiper">
            <div class="swiper-wrapper">
                @if(count($banners) > 0  && !empty($banners))
                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            @if($banner->type == 'image')
                                @php
                                    $bnn = ($agent === true) ? $banner->image_mobile : $banner->image
                                @endphp
                                <div class="header" style="background: url({{asset(Storage::url('uploads/customization/banners/'.$bnn))}}) no-repeat ; background-size: {{ ($agent == true) ? 'contain' : 'cover' }}; background-position: center;">
                                    <div class="details">
                                        <div class="description">
                                            @if(!empty($banner->title))
                                                <h3 class="title" style="line-height: 44px;">{{ $banner->title }}</h3>
                                            @endif
                                            <p>{!! html_entity_decode($banner->description) !!}</p>
                                        </div>
                                        @if (!empty($banner->link))
                                            <a href="{{ $banner->link }}" class="button" style="background:{{ $banner->btn_bg }};color:{{ $banner->btn_color }}">Saiba mais</a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($banner->type == 'video')                               
                            <div class="hero">
                                <iframe class="hero--video" frameborder="0"
                                    src="https://youtube.com/embed/{{ $banner->video }}?autoplay=1&controls=0&rel=1&showinfo=0&autohide=1&mute=1&loop=1&playsinline=1">
                                </iframe>
                                    <div class="hero--overlay">
                                        <div>
                                        @if(!empty($banner->title))
                                            <h2 class="hero--title">{{ $banner->title }}</h2>
                                        @endif
                                        <h3 class="hero--subtitle">{!! html_entity_decode($banner->description) !!}</h3>
                                        @if (!empty($banner->link))
                                            <a href="{{ $banner->link }}"class="hero--button">Saiba mais</a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
            @if (count($banners) > 1)
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            @endif
        </div>
    </div>
    <div class="over-banner">
    </div>
    <div class="container-fluid">
        <div class="nk-content">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    @if ($store_settings['cust_theme'] == 'cust_theme3')
                        <div class="nk-block">
                            <div class="nk-block-head nk-block-head-lg wide-sm">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title"><em class="icon ni ni-play-circle"></em> {{ __('My Courses') }}</h4>
                                </div>
                            </div>
                            <div class="row g-gs {{ ($store_settings['cust_per_row']) ? 'grid-items-' . $store_settings['cust_per_row'] : '' }}">
                                @if(!empty($purchased_courses))
                                    @foreach($purchased_courses as $purchased_course)
                                        @if(in_array($purchased_course->id,Auth::guard('students')->user()->purchasedCourse()))
                                            @php
                                                $pass = Utility::unlockCourseByRoles($student,$purchased_course->id, $purchased_course->created_at);
                                            @endphp
                                            <div class="grid-item-courses">
                                                <div class="card card-bordered card__item">
                                                    <a class="block__card__image {{ ($pass['continue'] == false) ? 'c-modal' : '' }}" data-type="{{ $pass['type'] }}" data-date="{{ $pass['date'] }}" data-name="{{ $pass['course_name'] }}" data-progress="{{ $pass['percent'] }}" data-size="lg" @if($pass['continue'] == false) data-bs-toggle="tooltip" data-bs-placement="top" @endif href="{{ ($pass['continue'] == 1) ? route('store.viewcourse',[$store->slug,\Illuminate\Support\Facades\Crypt::encrypt($purchased_course->id)]) : '#!' }}">
                                                        <img src="{{asset(Storage::url('uploads/thumbnail/'.$purchased_course->thumbnail))}}" alt="">
                                                    </a>
                                                </div>
                                                @if ($pass['type'] == 'time' && $pass['continue'] == false)
                                                    <p class="nk-block-title text-center mt-2">O curso será liberado em {{ $pass['date'] }}</p>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if(!empty($purchased_courses) && $store_settings['cust_hidden_not_purchased'] !== '')
                            <div class="nk-block mt-4">
                                <div class="nk-block-head nk-block-head-lg wide-sm">
                                    <div class="nk-block-head-content">
                                        <h4 class="text-3xl font-bold p-2 {{ $store_settings['cust_darklayout'] == 'on' ? 'text-white' : '' }}"><em class="icon ni ni-lock"></em> {{ __('Cursos Disponiveis') }}</h4>
                                    </div>
                                </div>
                                <div class="row g-gs {{ ($store_settings['cust_per_row']) ? 'grid-items-' . $store_settings['cust_per_row'] : '' }}">
                                    @foreach($purchased_courses as $not_purchased_course)
                                        @if(!in_array($not_purchased_course->id,Auth::guard('students')->user()->purchasedCourse()))
                                            <div class="grid-item-courses">
                                                <div class="card card-bordered card__item">
                                                    <a class="block__card__image" href="{{ $not_purchased_course->link }}" target="_blank">
                                                        <div class="locked__card">
                                                            <em class="icon ni ni-lock"></em>
                                                        </div>
                                                        <img src="{{asset(Storage::url('uploads/thumbnail/'.$not_purchased_course->thumbnail))}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @elseif ($store_settings['cust_theme'] == 'cust_theme2')
                        <div class="nk-block">
                            <div class="nk-block-head nk-block-head-lg wide-sm">
                                <div class="nk-block-head-content">
                                <h4 class="nk-block-title"><em class="icon ni ni-play-circle"></em> {{ __('My Courses') }}</h4>
                                </div>
                            </div>
                            <div class="row g-gs {{ ($store_settings['cust_per_row']) ? 'grid-items-' . $store_settings['cust_per_row'] : '' }}">
                                @if(!empty($purchased_courses) && $store_settings['cust_hidden_not_purchased'] !== '')
                                    @foreach($purchased_courses as $purchased_course)
                                        @php
                                            $route = (in_array($purchased_course->id,Auth::guard('students')->user()->purchasedCourse())) ? route('store.viewcourse',[$store->slug,\Illuminate\Support\Facades\Crypt::encrypt($purchased_course->id)]) : $purchased_course->link ;
                                        @endphp 
                                        <div class="grid-item-courses">
                                            <div class="card card-bordered card__item">
                                                <a class="block__card__image" href="{{ $route }}">
                                                    @if (!in_array($purchased_course->id,Auth::guard('students')->user()->purchasedCourse()))
                                                        <div class="locked__card">
                                                            <em class="icon ni ni-lock"></em>
                                                        </div>
                                                    @endif
                                                    <img src="{{asset(Storage::url('uploads/thumbnail/'.$purchased_course->thumbnail))}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else(!empty($purchased_courses))
                                    @foreach($purchased_courses as $purchased_course)
                                        @if(in_array($purchased_course->id,Auth::guard('students')->user()->purchasedCourse()))
                                            @php
                                                $pass = Utility::unlockCourseByRoles($student,$purchased_course->id, $purchased_course->created_at);
                                            @endphp
                                            <div class="grid-item-courses">
                                                <div class="card card-bordered card__item">
                                                    <a class="block__card__image {{ ($pass['continue'] == false) ? 'c-modal' : '' }}" data-name="{{ $pass['course_name'] }}" data-progress="{{ $pass['percent'] }}" data-size="lg" @if($pass['continue'] == false) data-bs-toggle="tooltip" data-bs-placement="top" @endif href="{{ ($pass['continue'] == 1) ? route('store.viewcourse',[$store->slug,\Illuminate\Support\Facades\Crypt::encrypt($purchased_course->id)]) : '#!' }}">
                                                        <img src="{{asset(Storage::url('uploads/thumbnail/'.$purchased_course->thumbnail))}}" alt="">
                                                    </a>
                                                </div>
                                                @if ($pass['type'] == 'time' && $pass['continue'] == false)
                                                    <p class="nk-block-title text-center mt-2">O curso será liberado em {{ $pass['date'] }}</p>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @else
                        @foreach ($categories as $category_courses)
                            <div class="nk-block">
                                <div class="nk-block-head wide-sm">
                                    <div class="nk-block-head-content">
                                        <h4 class="text-3xl font-bold p-2 {{ $store_settings['cust_darklayout'] == 'on' ? 'text-white' : '' }}"><em class="icon ni ni-play-circle"></em> {{ $category_courses->name }}</h4>
                                    </div>
                                </div>
                                <div class="row g-gs {{ ($store_settings['cust_per_row']) ? 'grid-items-' . $store_settings['cust_per_row'] : '' }}">
                                    @if(!empty($category_courses) && $store_settings['cust_hidden_not_purchased'] !== '')
                                        @foreach($category_courses->courses as $purchased_course)
                                            @php
                                                $pass = Utility::unlockCourseByRoles($student,$purchased_course->id, $purchased_course->created_at);
                                            @endphp
                                            <div class="grid-item-courses">
                                                <div class="card card-bordered card__item">
                                                    @if(!in_array($purchased_course->id,Auth::guard('students')->user()->purchasedCourse()))
                                                    <a class="block__card__image" href="{{ $purchased_course->link }}">
                                                    @else
                                                    <a class="block__card__image {{ ($pass['continue'] == false) ? 'c-modal' : '' }}" data-name="{{ $pass['course_name'] }}" data-progress="{{ $pass['percent'] }}" data-size="lg" @if($pass['continue'] == false) data-bs-toggle="tooltip" data-bs-placement="top" @endif href="{{ ($pass['continue'] == 1) ? route('store.viewcourse',[$store->slug,\Illuminate\Support\Facades\Crypt::encrypt($purchased_course->id)]) : '#!' }}">
                                                    @endif
                                                        @if (!in_array($purchased_course->id,Auth::guard('students')->user()->purchasedCourse()))
                                                            <div class="locked__card">
                                                                <em class="icon ni ni-lock"></em>
                                                            </div>
                                                        @endif
                                                        <img src="{{asset(Storage::url('uploads/thumbnail/'.$purchased_course->thumbnail))}}" alt="">
                                                        @if ($store_settings['cust_hidden_course_name'] == 'on')
                                                            <h4 class="nk-block-title curse-title">{{ $purchased_course->title }}</h4>
                                                        @endif
                                                    </a>
                                                </div>
                                                @if ($pass['type'] == 'time' && $pass['continue'] == false)
                                                    <p class="nk-block-title text-center mt-2">O curso será liberado em {{ $pass['date'] }}</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach($category_courses->courses as $purchased_course)
                                            @if(in_array($purchased_course->id,Auth::guard('students')->user()->purchasedCourse()))
                                                <div class="grid-item-courses">
                                                    <div class="card card-bordered card__item">
                                                        <a class="block__card__image {{ ($pass['continue'] == false) ? 'c-modal' : '' }}" data-name="{{ $pass['course_name'] }}" data-progress="{{ $pass['percent'] }}" data-size="lg" @if($pass['continue'] == false) data-bs-toggle="tooltip" data-bs-placement="top" @endif href="{{ ($pass['continue'] == 1) ? route('store.viewcourse',[$store->slug,\Illuminate\Support\Facades\Crypt::encrypt($purchased_course->id)]) : '#!'}}">
                                                            <img src="{{asset(Storage::url('uploads/thumbnail/'.$purchased_course->thumbnail))}}" alt="">
                                                            @if ($store_settings['cust_hidden_course_name'] == 'on')
                                                                <h4 class="nk-block-title curse-title">{{ $purchased_course->title }}</h4>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    @if ($pass['type'] == 'time' && $pass['continue'] == false)
                                                        <p class="nk-block-title text-center mt-2">O curso será liberado em {{ $pass['date'] }}</p>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
@endpush
