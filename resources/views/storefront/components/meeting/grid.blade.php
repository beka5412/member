@if(!empty($items) && count($items) > 0)
    <div class="nk-block mt-5">
        <div class="nk-block-head nk-block-head-lg wide-sm">
            <div class="nk-block-head-content">
            <h5 class="nk-block-title">
                <em class="icon ni ni-play-circle"></em> Últimas transmissões ao vivo
            </h5>
            </div>
        </div>
        <div class="row g-gs">
            <div class="block__grid__items">
                @foreach($items as $item)
                    <div class="block__grid__item block__grid__lg">
                        <div class="card card-bordered">
                            <a href="#">
                                <div class="block__grid__image">
                                    @if(!empty($item['media']))
                                        <img src="{{ asset(Storage::url('uploads/meetings/' . $item['media'])) }}">
                                    @endif
                                    <div class="play__icon"></div>
                                </div>
                                <div class="block__card__title p-2">
                                    <p>{{ $item['title'] }}</p>
                                    <p class="text-soft">{{ \Carbon\Carbon::parse($item['start_date'])->diffForHumans() }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif