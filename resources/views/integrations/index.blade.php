@extends('layouts.admin')
@section('page-title')
    {{__('Integrations')}}
@endsection
@section('title')
    {{__('Integrations')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{__('Integrations')}}</li>
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12">   
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">{{__('Integrations')}}</h6>
                    </div>
                </div>
            </div>
            <div class="card-inner">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tabIntegration">
                            <em class="icon ni ni-globe"></em>
                            <span>Pagamento</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tabLive">
                            <em class="icon ni ni-live"></em>
                            <span>Live</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabIntegration">
                        <div class="row g-gs">
                            @foreach($integrationPlatforms as $platform)
                                <x-platform :name="$platform" />
                            @endforeach
                        </div> 
                    </div>
                    <div class="tab-pane" id="tabLive">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="card card-bordered">
                                    <div class="card-inner border-bottom">
                                        <div class="row g-gs">
                                            <div class="col-sm-3 ml-2 px-0">
                                                <img src="{{ asset('images/streaming/zoom.png') }}" id="blah4" width="140px" class="img_integration"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner card-text">
                                        <p>Zoom</p>
                                        <div class="mt-2">
                                            <a href="meeting/zoom" class="btn btn-primary"><em class="icon ni ni-setting"></em><span>{{ __('Configure') }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-bordered">
                                    <div class="card-inner border-bottom">
                                        <div class="row g-gs">
                                            <div class="col-sm-3 ml-2 px-0">
                                                <img src="{{ asset('images/streaming/google-meet.png') }}" id="blah4" width="140px" class="img_integration"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner card-text">
                                        <p>Google Meet</p>
                                        <div class="mt-2">
                                            <a href="meeting/meet" class="btn btn-primary"><em class="icon ni ni-setting"></em><span>{{ __('Configure') }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-bordered">
                                    <div class="card-inner border-bottom">
                                        <div class="row g-gs">
                                            <div class="col-sm-3 ml-2 px-0">
                                                <img src="{{ asset('images/streaming/jitsi.png') }}" id="blah4" width="140px" class="img_integration"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner card-text">
                                        <p>Jitsi</p>
                                        <div class="mt-2">
                                            <a href="meeting/jitsi" class="btn btn-primary"><em class="icon ni ni-setting"></em><span>{{ __('Configure') }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-bordered">
                                    <div class="card-inner border-bottom">
                                        <div class="row g-gs">
                                            <div class="col-sm-3 ml-2 px-0">
                                                <img src="{{ asset('images/streaming/agora.png') }}" id="blah4" width="140px" class="img_integration"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner card-text">
                                        <p>Agora</p>
                                        <div class="mt-2">
                                            <a href="meeting/agora" class="btn btn-primary"><em class="icon ni ni-setting"></em><span>{{ __('Configure') }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

