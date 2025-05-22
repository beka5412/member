@extends('layouts.admin')
@section('page-title')
    {{__('Course')}}
@endsection
@section('title')
    {{__('Courses')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Course') }}</li>
@endsection
@section('action-btn')

    <div class="nk-block-tools-opt">
        <a href="{{route('course.create')}}" class="btn btn-icon btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Create Course')}}">
            <em class="icon ni ni-plus"></em><span>Criar novo curso</span>
        </a>
        
    </div>
       
@endsection
@section('filter')
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{asset('libs/summernote/summernote-bs4.css')}}">
@endpush
@push('script-page')
    <script src="{{asset('libs/summernote/summernote-bs4.js')}}"></script>
    
    <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Listing -->
        <div class="card card-bordered">
            <!-- Card header -->
            <div class="card-inner-group">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">                
                            <h6 class="title">{{__('All Courses')}}</h6>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="card-inner">
                    <div class="col-lg-12 col-md-12">
                        <table class="table table-tranx">
                            <thead>
                                <tr class="tb-tnx-head">
                                    <th scope="col" style=" width: 123px; ">{{ __('Thumbnail')}}</th>
                                    <th scope="col">{{ __('Title')}}</th>
                                    <th scope="col">{{ __('Aulas')}}</th>
                                    <th scope="col">{{ __('Alunos')}}</th>
                                    <th scope="col">{{ __('Category')}}</th>
                                    <th scope="col">{{ __('Status')}}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            @if(!empty($courses) && count($courses) > 0)
                                <tbody>
                                    @foreach($courses as $course)
                                        <tr class="tb-tnx-item">
                                            <td scope="row">
                                                <div class="media align-items-center">
                                                    <div>
                                                        @if(!empty($course->thumbnail))
                                                            <a class="course-thumb" href="{{route('course.edit',\Illuminate\Support\Facades\Crypt::encrypt($course->id))}}">
                                                                    <img alt="Image placeholder" src="{{asset(Storage::url('uploads/thumbnail/'.$course->thumbnail))}}" class="course-thumb-img" style="width: 80px;">
                                                                </a>
                                                            @else
                                                            <a href="{{route('course.edit',\Illuminate\Support\Facades\Crypt::encrypt($course->id))}}">
                                                                    <img alt="Image placeholder" src="{{asset(Storage::url('uploads/is_cover_image/default.jpg'))}}" class="" style="width: 80px;">
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="{{route('course.edit',\Illuminate\Support\Facades\Crypt::encrypt($course->id))}}"><h5 class="title">{{$course->title}}</h5></a></td>
                                            <td>{{!empty($course->chapter_count)?$course->chapter_count->count():'0'}} Aulas</td>
                                            <td>{{$course->student_count->count()}}</td>
                                            <td>{{!empty($course->category_id)?$course->category_id->name:'-'}}</td>
                                            <td><span class="badge  {{$course->status == 'on' ? 'bg-success' : 'bg-danger'}}">{{$course->status == 'on' ? 'Publicado' : 'Rascunho'}}</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                        <ul class="link-list-plain">
                                                            <li>
                                                                <a href="{{route('course.edit',\Illuminate\Support\Facades\Crypt::encrypt($course->id))}}">{{ __('Edit') }}</a>
                                                            </li>
                                                            <li>
                                                                {!! Form::open(['method' => 'DELETE', 'route' => ['course.destroy', $course->id]]) !!}
                                                                    <a href="#!" class="show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}">{{ __('Remove') }}</a>
                                                                {!! Form::close() !!}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="10">
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
                {{ $courses->links('partials.admin.pagination') }}
            </div>
        </div>       
    </div>
</div>
@endsection

