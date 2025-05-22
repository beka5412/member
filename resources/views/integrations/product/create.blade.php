@extends('layouts.admin')
@section('page-title')
    {{ $integrationPlatforms->name }}
@endsection
@section('title')
    {{ $integrationPlatforms->name }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ $integrationPlatforms->slug }}</li>
    <li class="breadcrumb-item">{{ __('create') }}</li>
@endsection
@section('action-btn')
    <div class="nk-block-tools g-3">
        <ul class="nav me-2">
            <li>
                <a href="{{route('integrations.product.create', $id)}}" class="btn btn-icon btn-primary" data-bs-toggle="tab" data-bs-placement="top" title="{{__('Create Integration')}}"><em class="icon ni ni-plus"></em></a>
            </li>
        </ul>
    </div>
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12">   
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="row">
                    <div class="col-sm-4">
                        <ul class="nav link-list-menu border border-light round m-0">
                            <li>
                                <a href="/integrations/{{ $integrationPlatforms->slug }}/{{ $id }}/edit">
                                    <em class="icon ni ni-tag"></em>
                                    <span>{{ __('Products') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="/integrations/{{ $integrationPlatforms->slug }}/{{ $id }}/edit">
                                    <em class="icon ni ni-setting"></em>
                                    <span>{{ __('Configurations') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div>
                                <div id="integrations_new">
                                    {{ Form::open(array('route' => array('integrations.product', $id),'method' =>'post','enctype'=>'multipart/form-data')) }}
                                    <div class="row g-gs">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label" for="default-01">{{ __('Product name') }}</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="name" class="form-control" id="default-01" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label" for="default-01">{{ __('Product ID') }}</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="productId" class="form-control" id="default-01" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{ __('Choose your courses') }}</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" name="courses[]" multiple="multiple" data-placeholder="Select Multiple options">
                                                        <option value="all">Todos</option>  
                                                        @if(!empty($courses) && count($courses) > 0)
                                                            @foreach($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->title }}</option>  
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4 float-end">
                                            <div class="col-lg-12 text-right text-end float-end">
                                                <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" id="submit-all">
                                            </div>                               
                                        </div>
                                    </div>
                                    {{ Form::close() }}
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