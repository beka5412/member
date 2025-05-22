@if(!empty($item))
    <div class="nk-block">
        <div class="nk-block-head nk-block-head-lg wide-sm">
            <div class="nk-block-head-content">
            <h5 class="nk-block-title">
                <em class="icon ni ni-play-circle"></em> Acontecendo agora
            </h5>
            </div>
        </div>
        <div class="card">
            <div class="card-inner">
                <div class="row g-gs">
                    <div class="col-sm-4">
                        <div class="status mb-5">
                            <span class="btn btn-danger fs-12px">Ao vivo</span>
                        </div>
                        <p class="text-soft fs-14px">{{ $item->course->title }}</p>
                        <h3 class="mb-2">{{ $item->title }}</h3>
                        <p class="text-soft mb-5">{{ \Carbon\Carbon::parse($item['start_date'])->format('Y-m-d H') }}</p>
                        <a href="{{ $item->join_url }}" class="btn btn-outline-light"><span class="ms-2">Assistir</span> <em class="icon ni ni-play fs-20px"></em></a>
                    </div>
                    <div class="col-sm-8">
                        <img src="{{ asset(Storage::url('uploads/meetings/' . $item->media)) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif