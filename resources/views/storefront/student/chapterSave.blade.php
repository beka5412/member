@extends('storefront.user.user')
@section('page-title')
    {{__('Saved Chapters')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@section('head-title')
@endsection
@section('content')
<section class="nk-content">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body ">
        @if(!empty($courses) && count($courses) > 0)
          @foreach($courses as $item)
            <div class="nk-block">
              <div class="nk-block-head nk-block-head-lg wide-sm">
                <div class="nk-block-head-content">
                  <h5 class="nk-block-title">
                    <em class="icon ni ni-play-circle"></em> {{ $item->course->title }}
                  </h5>
                </div>
              </div>
              
              <div class="row g-gs">
                <div class="block__grid__items">
                  @foreach($chapters as $chapter)
                    @if($chapter->course_id == $item->course_id)
                      <div class="block__grid__item block__grid__lg">
                        <div class="card card-bordered">
                          <a href="{{route('store.fullscreen',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($item->course_id),\Illuminate\Support\Facades\Crypt::encrypt($item->header_id),\Illuminate\Support\Facades\Crypt::encrypt($item->chapter_id)])}}">
                            <div class="block__grid__image">
                              <img src="{{ asset(Storage::url('uploads/chapter/thumbnail/' . $chapter->chapter->thumbnail)) }}" alt="">
                              <div class="play__icon"></div>
                            </div>
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped progress-bar-animated" data-progress="{{ (!empty($activity[$chapter->chapter_id])) ? $activity[$chapter->chapter_id]['percentage'] : 0 }}"></div>
                            </div>
                            <div class="card-inner">
                              <a href="">
                                <h6>{{ $chapter->chapter->name }}</h6>
                              </a>
                            </div>
                          </a>
                        </div>
                      </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
</section>
@endsection
