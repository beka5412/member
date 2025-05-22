@extends('layouts.admin')
@section('page-title')
    {{ $platform }}
@endsection
@section('title')
{{ $platform }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ $platform }}</li>
@endsection

@section('action-btn')
    <div class="nk-block-tools g-3">
        <li>
            <a href="{{route('meeting.create', $platform)}}" class="btn btn-icon btn-primary @if(empty($meeting_config)) disabled @endif" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Create Meeting')}}"><em class="icon ni ni-plus"></em></a>
        </li>
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
                                <a href="#streaming_list" data-bs-toggle="tab">
                                    <em class="icon ni ni-tag"></em>
                                    <span>{{ __('Meetings') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#streaming_config" data-bs-toggle="tab">
                                    <em class="icon ni ni-setting"></em>
                                    <span>{{ __('Configurations') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="tab-content">
                                <div class="tab-pane @if(!empty($meeting_config)) active @endif" id="streaming_list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ __('Title') }}</th>
                                                <th scope="col">{{ __('Meeting Time') }}</th>
                                                <th scope="col">{{ __('Duration') }}</th>
                                                <th scope="col">{{ __('Join URL') }}</th>
                                                <th scope="col">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($meetings)
                                                @foreach($meetings as $meeting)
                                                    <tr>
                                                        <th scope="row">{{ $meeting->title }}</th>
                                                        <td>{{ $meeting->start_date }}</td>
                                                        <td>{{ $meeting->duration }} h</td>
                                                        <td>
                                                            <a class="btn btn-dim btn-info" href="{{ $meeting->join_url }}" target="_blank">{{ __('Join URL') }}</a>
                                                        </td>
                                                        <td>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane @if(empty($meeting_config)) active @endif" id="streaming_config">
                                    {{ Form::open(array('route' => array('meeting.store', $platform),'method' =>'post','enctype'=>'multipart/form-data')) }}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                    {{Form::label('client_id',__('Client ID'),['class'=>'form-label'])}}
                                                    {{Form::text('client_id',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                            </div>
                                            <div class="form-group">
                                                    {{Form::label('client_secret',__('Client secret'),['class'=>'form-label'])}}
                                                    {{Form::text('client_secret',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                            </div>
                                            <div class="form-group">
                                                    {{Form::label('account_id',__('Account ID'),['class'=>'form-label'])}}
                                                    {{Form::text('account_id',null,array('class'=>'form-control font-style','required'=>'required'))}}
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