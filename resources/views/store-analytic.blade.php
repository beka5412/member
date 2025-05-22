@extends('layouts.admin')
@section('page-title')
    {{__('Store Analytics')}}
@endsection

@section('title')
    {{__('Store Analytics')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Store Analytics') }}</li>
@endsection

@push('css-page')  
@endpush
@section('content')

    <div class="row g-gs">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title flex-start">
                            <h6 class="title">{{ __('Visitors') }}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <div class="card-body">
                        <canvas class="analytics-line-large" id="analyticOvData"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row g-gs">
                <div class="col-xxl-6">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title flex-start">
                                    <h6 class="title">{{ __('Top URLs') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        @foreach ($visitor_url as $url)
                                            <tr>
                                                <td>
                                                    <h6 class="m-0">{{ $url->url }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="m-0">{{ $url->total }}</h6>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title flex-start">
                                    <h6 class="title">{{ __('Devices') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner">
                            <div id="pie-storedashborad"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">               
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title flex-start">
                                    <h6 class="title">{{ __('Platforms') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner">
                            <div id="user_platform-chart"></div>
                        </div>
                    </div> 
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title flex-start">
                                    <h6 class="title">{{ __('Browsers') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner">
                            <div id="pie-storebrowser"></div>
                        </div>
                    </div>                 
                </div>
            </div>
        </div>
    </div>
            
@endsection

@push('script-page')
@endpush
