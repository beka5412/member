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
    <li class="breadcrumb-item">{{ __('Create') }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">   
        <div class="card card-bordered">
            <div class="card-inner">
                {{ Form::open(array('route' => array('meeting.storeMeeting', $platform),'method' =>'post','enctype'=>'multipart/form-data')) }}
                    <div class="row g-gs">
                        <div class="col-sm-6">
                            <div class="form-group">
                                    {{Form::label('title',__('Title'),['class'=>'form-label'])}}
                                    {{Form::text('title',null,array('class'=>'form-control font-style','required'=>'required'))}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Imagem</label>
                            <div class="form-control-wrap">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" name="thumbnail" id="thumbnail">
                                    <label class="form-file-label" for="thumbnail">Choose files</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">{{ __('Choose your courses') }}</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="courses[]" multiple="multiple" data-placeholder="Select Multiple options">
                                        @if(!empty($courses) && count($courses) > 0)
                                            @foreach($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->title }}</option>  
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">{{ __('Choose your students') }}</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="students[]" multiple="multiple" data-placeholder="Select Multiple options">
                                        @if(!empty($students) && count($students) > 0)
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->name }}</option>  
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Data</label>
                                <div class="form-control-wrap">
                                    <input type="text" name="start_date" class="form-control date-picker">
                                </div>
                                <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Horário</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control time-picker" name="start_time" placeholder="00:00">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('duration', __('Duration'),['class'=>'form-label']) }}
                                {{ Form::number('duration', null, ['class' => 'form-control', 'placeholder' => __('Duration'), 'required' => 'required']) }}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('password', __('Password ( Optional )'),['class'=>'form-label']) }}
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Password')]) }}
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <div class="col-md-12 mb-4 float-end">
                                <div class="col-lg-12 text-right text-end float-end">
                                    <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" id="submit-all">
                                </div>                               
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection