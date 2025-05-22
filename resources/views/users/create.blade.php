@extends('layouts.admin')
@section('page-title')
    {{__('Create User')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
    <li class="breadcrumb-item">{{ __('create') }}</li>
@endsection
@section('title')
    {{__('Create User')}}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!--account edit -->
            <div id="account_edit" class="tabs-card">
                <div class="card card-bordered">
                    <div class="card-inner">
                        {{ Form::open(array('route' => 'users.store','method' =>'post','enctype'=>'multipart/form-data')) }}
                            <div class="row">
                                <div class="form-group">
                                    <div>
                                        <div class="custom-switch">
                                            <input type="checkbox" name="status" class="custom-control-input" id="active" checked>
                                            <label class="custom-control-label" for="active">{{ __('Active') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('name',__('Name'),['class'=>'form-label'])}}
                                    {{Form::text('name',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('taxpayer',__('CPF'),['class'=>'form-label'])}}
                                    {{Form::text('taxpayer',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('phone',__('Phone_number'),['class'=>'form-label'])}}
                                    {{Form::text('phone_number',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('email',__('Email'),['class'=>'form-label'])}}
                                    {{Form::text('email',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                </div>
                                <div class="form-group col-md-12">
                                    {{Form::label('password',__('Password'),['class'=>'form-label'])}}
                                    {{Form::text('password',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                </div>
                                <div class="form-group col-md-12">
                                    <!-- Card header -->
                                        <div class="card-title mt-4">
                                            <h5 class="title">{{__('All Courses')}}</h5>
                                        </div>
                                    <!-- Table -->
                                    <div class="card">
                                        <div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">{{ __('Select')}}</th>
                                                        <th scope="col">{{ __('Id')}}</th>
                                                        <th scope="col">{{ __('course')}}</th>
                                                    </tr>
                                                </thead>
                                                @if(!empty($courses) && count($courses) > 0)
                                                    <tbody>
                                                        @foreach($courses as $course)
                                                            <tr>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" value="{{$course->id}}" name="courses[]" id="courses_{{$course->id}}">
                                                                        <label class="custom-control-label" for="courses_{{$course->id}}"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $course->id }}</span>
                                                                </td>
                                                                <td>
                                                                    <span>{{ $course->title }}</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                @else
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7">
                                                                <div class="text-center">
                                                                    <i class="fas fa-folder-open text-primary" style="font-size: 48px;"></i>
                                                                    <h2>{{__('Opps')}}...</h2>
                                                                    <h6>{{__('No data Found')}}. </h6>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4 float-end">
                                    <div class="col-lg-12 text-right text-end float-end">
                                        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" data-id="input__submit" id="submit-all">
                                    </div>                           
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <!--account edit end-->
        </div>
    </div>
@endsection