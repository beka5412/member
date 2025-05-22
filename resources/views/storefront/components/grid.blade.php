<div class="row g-gs grid-items-{{ $row }}">
    @if(count($header) > 0  && !empty($header))
        @foreach($header as $i => $header)
            <div class="grid-item-courses">
                <a href="{{route('store.fullscreen',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($id), \Illuminate\Support\Facades\Crypt::encrypt($header->id)])}}" class="block__card block__card--lg">
                    <div class="block__grid__image">
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