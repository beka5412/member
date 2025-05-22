@extends('storefront.user.user')
@section('page-title')
    {{__('Annotations')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@section('head-title')
@endsection
@section('content')
<section class="nk-content">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body ">
          <div class="nk-block">
            <div class="nk-block-head nk-block-head-lg wide-sm">
              <div class="nk-block-head-content">
                <h5 class="nk-block-title">
                  <em class="icon ni ni-file-plus"></em> Minhas Anotações
                </h5>
              </div>
            </div>
            
            @foreach ($notes as $note)
              <div class="row g-gs pt-3">
                <div class="col-lg-4">
                    <div class="block__grid__item block__grid__lg">
                      <div class="card card-bordered">
                        <a href="{{route('store.fullscreen',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($note->course_id),\Illuminate\Support\Facades\Crypt::encrypt($note->header_id),\Illuminate\Support\Facades\Crypt::encrypt($note->chapter_id)])}}">
                          <div class="block__grid__image">
                            <img src="{{ asset(Storage::url('uploads/chapter/thumbnail/' . $note->chapter->thumbnail)) }}" alt="">
                            <div class="play__icon"></div>
                          </div>
                        </a>
                      </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product-details entry me-xxl-3">
                      <h4>{{ $note->course->title }} - {{ $note->chapter->name }}</h4>
                      <div class="mt-2">{{ $note->description }}</div>
                    </div>
                    <small class="mt-4">Minuto da anotação - {{ Carbon\CarbonInterval::seconds($note->current_time)->cascade()->format('%H:%I:%S')  ?? '' }}</small>
                    <p>
                      {!! Form::open(['method' => 'DELETE', 'route' => ['student.notes.destroy',[$slug, $note->id]]]) !!}
                          <input class="btn btn-primary" type="submit" value="Remover">
                      {!! Form::close() !!}
                    </p>
                </div>
              </div>
            @endforeach

            <hr>
          </div>
      </div>
    </div>
  </div>
</section>
@endsection