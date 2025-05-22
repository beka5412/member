@extends('storefront.user.user')
@section('page-title')
    {{__('Live')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@section('head-title')
@endsection
@section('content')
  <section class="nk-content">
    <div class="container-fluid">
      <div class="nk-content-inner">
        <div class="nk-content-body">
          @if($empty_meetings == false)
            <x-onmeeting :item="$current_meeting" />
            <div class="nk-block mt-5">
              <div class="row g-gs">
                <div class="col-6">
                  <div class="form-group">
                    <label class="form-label" for="default-01">Transmissões</label>
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-left">
                            <em class="icon ni ni-search"></em>
                        </div>
                        <input type="text" class="form-control" placeholder="Buscar" style="background:transparent !important;">
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                      <label class="form-label" for="default-06">Curso</label>
                      <div class="form-control-wrap ">
                          <div class="form-control-select">
                              <select class="form-control" id="default-06" style="background:transparent !important;">
                                  <option value="default_option">Selecione um curso</option>
                                  @foreach($courses as $course)
                                      <option value="{{ $course->id }}">{{ $course->title }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <x-meeting title="Próximas transmissões" :items="$next_meetings" />
            <x-meeting title="Últimas transmissões" :items="$last_meetings" />
          @else
            <div class="row">
              <div class="col-12 text-center pt-5">
                <p class="text-soft fs-20px mt-5">Você não tem lives para assistir no momento</p>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection