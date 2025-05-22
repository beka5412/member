<div class="block__slider__items">
    <div class="swiper">
        <div class="swiper-wrapper">
            @if(count($header) > 0  && !empty($header))
                @foreach($header as $i => $header)
                    <div class="swiper-slide">
                        <a href="{{route('store.fullscreen',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($id), \Illuminate\Support\Facades\Crypt::encrypt($header->id)])}}" class="block__slider__card slider__card--lg">
                            <div class="block__slider__image">
                                <img src="{{ asset(Storage::url('uploads/modules/preview_image/' . $header->thumbnail)) }}" alt="">
                                <div class="play__icon"></div>
                            </div>
                            @if ($showname == 'on')
                                <h6 class="nk-block-title curse-title">{{ $header->title }}</h6>
                            @endif
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>