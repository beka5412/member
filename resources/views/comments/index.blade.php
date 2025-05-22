@extends('layouts.admin')
@section('page-title')
    {{__('Comments')}}
@endsection
@section('title')
    {{__('Comments')}}
@endsection
 @section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{__('Comment')}}</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title">
                        <h6 class="title">{{__('Comments')}}</h6>
                    </div>
                </div>
                <div class="card-inner">
                    @component('comments.components.nav')
                        @slot('tabs', $tabs)
                    @endcomponent
                    <div data-id="panels">
                        @component('comments.components.tabs')
                            @slot('tabs', $tabs)
                            @slot('data', $data)
                            @slot('store', $store)
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection