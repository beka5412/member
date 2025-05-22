@php
    $agent = (new \Jenssegers\Agent\Agent())->isMobile() ? true : false;
@endphp
@extends('storefront.user.user')
@section('page-title')
    {{__('Course Details')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection

@push('script-page')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <script>
        let num_row = {{ $course->per_row }};
        const swiper = new Swiper('.swiper', {
            loop: false,
            slidesPerView: num_row,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        const banner_swiper = new Swiper('.banner_swiper', {
            loop: false,
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

        .banner_swiper{
            overflow:hidden;
            width: 100%;
        }
        .dark-mode .card-bordered {border-color: #1d2d4000 !important; }
.loader {
    position: relative;
    height: 2px;
    background: #fff;
  -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);
}
.loader::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
    90deg,
    #fb0094,
    #6b1ce3
  );
  animation: animate 20s linear infinite;
  background-size: 500%;
}

.loader::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
    90deg,
    #fb0094,
    #6b1ce3
  );
  animation: animate 20s linear infinite;
  background-size: 500%;
  filter: blur(10px);
}

@keyframes animate {
  0% {
    background-position: 0 0;
  }
  0% {
    background-position: 500% 0;
  }
}

    </style>
@endpush
@section('top')
    <div class="home__slider">
        <div class="banner_swiper">
            <div class="swiper-wrapper">
                @if(count($banners) > 0  && !empty($banners))
                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            @if($banner->type == 'image')
                                @php
                                    $bnn = ($agent == true && !empty($banner->image_mobile)) ? $banner->image_mobile : $banner->image
                                @endphp
                                <div class="header" style="background: url({{asset(Storage::url('uploads/course_banners/'.$bnn))}}) no-repeat; background-size: {{ ($agent == true) ? 'contain' : 'cover' }};">
                                    <div class="details">
                                        <div class="description">
                                            <h3 class="title">{{ $banner->title }}</h3>
                                            <p>{!! html_entity_decode($banner->description) !!}</p>
                                        </div>
                                        @if (!empty($banner->link))
                                            <a href="{{ $banner->link }}" class="button" style="background:{{ $banner->btn_bg }};color:{{ $banner->btn_color }}">Saiba mais</a>
                                        @endif
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
@endsection
@section('content')
    <section class="nk-content" style="{{ (count($banners) > 0) ? '' : 'padding-top: 120px;' }}">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body {{ ($course_settings['cust_image_banner'] == 'cust_theme2') ? 'nk-player-slider' : '' }}">
                    @if ($course_settings['cust_theme'] == 'cust_theme1')
                        <x-chapters :header="$header" :slug="$store->slug" :row="$course->per_row" size="lg" :id="$course->id" :showname="$course_settings['cust_enable_chapter_name']" :activity="$activity" />
                    @endif
                    @if ($course_settings['cust_theme'] == 'cust_theme2')
                        <x-slider :header="$header" :slug="$store->slug" size="lg" :id="$course->id" :showname="$course_settings['cust_enable_chapter_name']" />
                    @endif
                    @if ($course_settings['cust_theme'] == 'cust_theme3')
                        <x-grid :header="$header" :slug="$store->slug" :row="$course->per_row" size="lg" :id="$course->id" :showname="$course_settings['cust_enable_chapter_name']" />
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
