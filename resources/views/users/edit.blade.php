@extends('layouts.admin')
@section('page-title')
    {{__('Edit User')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit') }}</li>
@endsection
@section('title')
    {{__('Edit User')}}
@endsection
@section('content')
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-aside-wrap">
        <div class="tab-content" style="flex-grow: 1;">
            <div id="userinfo" class="tab-pane active">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Informações Pessoais</h4>
                                
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            {{Form::model($student,array('route' => array('users.update', \Illuminate\Support\Facades\Crypt::encrypt($student->id)), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div class="custom-switch">
                                            <input type="checkbox" name="status" class="custom-control-input" id="active" {{ ($student->status == 'on') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="active">{{ __('Active') }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="flex fled-end justify-end">
                                            <a class="btn btn-light" data-id="{{ $student->id }}" id="resend_student_data">{{ __('Reenviar notificação') }}</a>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        {{Form::label('name',__('Name'),['class'=>'form-label'])}}
                                        {{Form::text('name',$student->name,array('class'=>'form-control font-style','required'=>'required'))}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        {{Form::label('taxpayer',__('CPF'),['class'=>'form-label'])}}
                                        {{Form::text('taxpayer',$student->taxpayer,array('class'=>'form-control font-style'))}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        {{Form::label('phone',__('Phone_number'),['class'=>'form-label'])}}
                                        {{Form::text('phone_number',$student->phone_number,array('class'=>'form-control font-style','required'=>'required'))}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        {{Form::label('email',__('Email'),['class'=>'form-label'])}}
                                        {{Form::text('email',$student->email,array('class'=>'form-control font-style','required'=>'required'))}}
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
            <div id="userplan" class="tab-pane">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Cursos</h4>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            {{Form::model($student,array('route' => array('users.coursesupdate', \Illuminate\Support\Facades\Crypt::encrypt($student->id)), 'method' => 'POST','enctype'=>'multipart/form-data')) }}
                                <div class="row mb-4">
                                    <div class="mb-3 col-6">
                                        <div class="form-group">
                                            <label class="form-label">Selecione o período</label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="access_duration">
                                            </div>
                                            <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2"></label>
                                        <div class="custom-switch mt-2">
                                            <input type="checkbox" name="same_last_expires" class="custom-control-input" id="same_last_expires">
                                            <label class="custom-control-label" for="same_last_expires">Manter período anterior para novos cursos</label>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 10%;">{{ __('Select')}}</th>
                                            <th scope="col">{{ __('Id')}}</th>
                                            <th scope="col">{{ __('Curso')}}</th>
                                        </tr>
                                    </thead>
                                    @if(!empty($courses) && count($courses) > 0)
                                        <tbody>
                                            @foreach($courses as $course)
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" value="{{$course->id}}" @if($course->student_id == $student->id) checked @endif name="courses[]" id="courses_{{$course->id}}">
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
                                <div class="row">
                                    <div class="col-12 mb-4 float-end">
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
            <div id="userpasswd" class="tab-pane">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Acesso</h4>
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            {{Form::model($student,array('route' => array('users.passwordupdate', \Illuminate\Support\Facades\Crypt::encrypt($student->id)), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        {{Form::label('password',__('Password'),['class'=>'form-label'])}}
                                        {{Form::password('password',array('class'=>'form-control font-style'))}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        {{Form::label('password_confirmation',__('Confirm Password'),['class'=>'form-label'])}}
                                        {{Form::password('password_confirmation',array('class'=>'form-control font-style'))}}
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
            <div id="notifications" class="tab-pane">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">{{ __('Notifications') }}</h4>
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <!-- content -->
                        </div>
                    </div>
                </div>
            </div>
            <div id="activity" class="tab-pane">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">{{ __('Activity') }}</h4>
                                
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <!-- content -->
                        </div>
                    </div>
                </div>
            </div>
            <div id="access" class="tab-pane">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">{{ __('Access') }}</h4>
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <div class="card card-bordered card-preview">
                                <table class="table table-tranx">
                                    <thead>
                                        <tr class="tb-tnx-head">
                                            <th class="tb-tnx-info">
                                                <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                    <span>{{ __('Course') }}</span>
                                                </span>
                                                <span class="tb-tnx-date d-md-inline-block d-none">
                                                    <span class="d-md-none">Date</span>
                                                    <span class="d-none d-md-block">
                                                        <span>{{ __('Start Date') }}</span>
                                                        <span>{{ __('Expires Date') }}</span>
                                                    </span>
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($student->purchasedCourses))
                                            @foreach($student->purchasedCourses as $purchased)
                                                @if(!empty($purchased->course))
                                                    <tr class="tb-tnx-item">
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="title">{{ $purchased->course->title }}</span>
                                                            </div>
                                                            <div class="tb-tnx-date">
                                                                <span class="date">{{ $purchased->created_at }}</span>
                                                                <span class="date">{{ ($purchased->expires_at == '0000-00-00 00:00:00') ? 'Indeterminado' : $purchased->expires_at }}</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                    <div class="card-inner">
                        <div class="user-card">
                            <div class="user-avatar bg-primary">
                                <span>AB</span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text">{{$student->name}}</span>
                                <span class="sub-text">{{$student->email}}</span>
                            </div>
                            <div class="user-action">
                                <div class="dropdown">
                                    <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner p-0">
                        <ul class="nav link-list-menu border border-light round m-0">
                            <li>
                                <a href="#userinfo" data-bs-toggle="tab" class="active">
                                    <em class="icon ni ni-user-fill-c"></em>
                                    <span>{{ __('Informações') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#userplan" data-bs-toggle="tab">
                                    <em class="icon ni ni-card-view"></em>
                                    <span>{{ __('Cursos') }}</span>
                                </a> 
                            </li>  
                            <li>
                                <a href="#userpasswd" data-bs-toggle="tab">
                                <em class="icon ni ni-lock-alt-fill"></em><span>Senha</span></a>
                                </a> 
                            </li> 
                            <li>
                                <a href="#notifications" data-bs-toggle="tab">
                                    <em class="icon ni ni-bell-fill">
                                    </em><span>{{ __('Notifications') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#activity" data-bs-toggle="tab">
                                    <em class="icon ni ni-activity-round-fill">
                                    </em><span>{{ __('Activity') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="#access" data-bs-toggle="tab">
                                    <em class="icon ni ni-activity-round-fill">
                                    </em><span>{{ __('Access') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
@endsection