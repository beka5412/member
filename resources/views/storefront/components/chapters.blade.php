@if(count($header) > 0  && !empty($header))
    @foreach($header as $i => $header)
        <div class="nk-block">
            <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title"><em class="icon ni ni-play-circle"></em> {{ $header->title }}</h5>
                </div>
            </div>
            <div class="row g-gs grid-items-{{ $row }}">
                @if($header->chapters_data->count() > 0)
                    @foreach($header->chapters_data()->orderBy('position', 'ASC')->get() as $chapter)
                        <div class="grid-item-courses">
                            <div class="card__item">
                                <a href="{{route('store.fullscreen',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($id),\Illuminate\Support\Facades\Crypt::encrypt($header->id),\Illuminate\Support\Facades\Crypt::encrypt($chapter->id)])}}" class="block__card block__card--lg">
                                    <div class="card card-bordered card__item">
                                        <div class="block__grid__image">
                                            <img src="{{ asset(Storage::url('uploads/chapter/thumbnail/' . $chapter->thumbnail)) }}" alt="">
                                            <div class="play__icon"></div>
                                        </div>
                                        <div class="progress"> 
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" data-progress="{{ (!empty($activity[$chapter->id])) ? $activity[$chapter->id]['percentage'] : 0 }}">
                                            </div>
                                        </div>
                                        @if ($showname == 'on')
                                            <div class="card-inner">
                                                <h6>{{ $chapter->name }}</h6>
                                            </div>
                                            <div class="px-4 py-2 mt-4">
                                                <small >{{ (!empty($activity[$chapter->id])) ? $activity[$chapter->id]['percentage'] : 0 }}%</small>
                                                <a href="{{route('store.fullscreen',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($id),\Illuminate\Support\Facades\Crypt::encrypt($header->id),\Illuminate\Support\Facades\Crypt::encrypt($chapter->id)])}}" class="assistir_block"><em class="icon ni ni-play-circle"></em> Assistir</a>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endforeach
@endif

