@extends('layouts.admin')
@section('page-title')
    {{ $platform->name }}
@endsection
@section('title')
{{ $platform->name }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ $platform->name }}</li>
    <li class="breadcrumb-item">{{ __('create') }}</li>
@endsection
@section('action-btn')
    <div class="nk-block-tools g-3">
        <ul class="nav me-2">
            <li>
                <a href="#" class="btn btn-icon btn-primary disabled" data-bs-toggle="tab" data-bs-placement="top" title="{{__('Create Integration')}}"><em class="icon ni ni-plus"></em></a>
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
                                <a href="#integrations_list" data-bs-toggle="tab">
                                    <em class="icon ni ni-tag"></em>
                                    <span>{{ __('Products') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#integrations_create" data-bs-toggle="tab">
                                    <em class="icon ni ni-setting"></em>
                                    <span>{{ __('Configurations') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="tab-content">
                                <div class="tab-pane" id="integrations_list">
                                    <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                        <thead>
                                            <tr class="nk-tb-item nk-tb-head">
                                                <th class="nk-tb-col nk-tb-col-check">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input" id="uid">
                                                        <label class="custom-control-label" for="uid"></label>
                                                    </div>
                                                </th>
                                                <th class="nk-tb-col">
                                                    <span class="sub-text">Nome da integração</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="nk-tb-item">
                                            </tr><!-- .nk-tb-item  -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane active" id="integrations_create">
                                    {{ Form::open(array('route' => array('integrations.store', $platform_id),'method' =>'post','enctype'=>'multipart/form-data')) }}
                                        <div class="row g-gs">
                                            @if($platform->slug !== 'rocketpay')
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">{{ __('Webhook URL') }}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" disabled class="form-control" id="default-01" value="{{url('')}}/whook/{{$hash_url}}">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                        {{Form::label('name',__('Integration Name'),['class'=>'form-label'])}}
                                                        {{Form::text('name',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                                </div>
                                            </div>
                                            @if($platform->slug !== 'rocketpay')
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        {{Form::label('token',__('Token'),['class'=>'form-label'])}}
                                                        {{Form::text('token',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-12 mb-4 float-end">
                                                <div class="col-lg-12 text-right text-end float-end">
                                                    <input type="hidden" name="url" value="{{$hash_url}}">
                                                    <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" id="submit-all">
                                                </div>                               
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                </div>
                                <div class="tab-pane" id="integrations_new">
                                    <div class="row g-gs">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label" for="default-01">{{ __('Product name') }}</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="default-01" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label" for="default-01">{{ __('Product ID') }}</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="default-01" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">{{ __('Choose your courses') }}</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                                        @if(!empty($courses) && count($courses) > 0)
                                                            @foreach($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->title }}</option>  
                                                            @endforeach
                                                        @endif
                                                    </select>
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
    </div>
</div>
@endsection