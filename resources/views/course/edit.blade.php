@extends('layouts.admin')
@section('page-title')
    {{__('Course')}}
@endsection
@section('title')
    {{__('Edit Course')}}
@endsection
@section('breadcrumb')

    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('course.index') }}">{{ __('Course') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit') }}</li>

@endsection
@section('action-btn')
    <!--<a href="{{ route('course.index') }}" class="btn btn-sm btn-white btn-icon-only rounded-circle">
        <i class="fa fa-arrow-left"></i>
    </a>-->
@endsection
@section('filter')
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{asset('assets/newscss/editors/summernote.css')}}">
    <style>
        .dropdown-toggle::after {
            content: none;
        }

        .dropdown-toggle {
            cursor: pointer;
        }

        .margin-r {
            margin-right: 44px;
        }
    </style>
@endpush
@push('script-page')
    <script src="{{asset('assets/newjs/libs/editors/summernote.js')}}"></script>
    <script src="{{ asset('assets/newjs/libs/dragula.js?ver=3.0.3') }}"></script>
    <script>
        function updateOrder(){
            var chapters = document.querySelectorAll('.chapter_item');
            var chapterOrder = [];
            
            for (var i = 0; i < chapters.length; i++) {
                var chapterId = chapters[i].dataset.chapterId;
                var newPosition = i;
                chapterOrder.push({ id: chapterId, order: newPosition });
            }

            $.ajax({
                url: "{{ route('chapters.order') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: {chapterOrder},
                success: function(response) {
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var container = document.querySelectorAll('#dragContainer');
            
            for (var i = 0; i < container.length; i++) {
                var drake = dragula([container[i]]);

                drake.on('drop', function(el, target, source, sibling) {
                    setTimeout(() => {
                        updateOrder()
                    }, 300);
                });
            }
        });
    </script>
    {{--Switch--}}
    <script>
        $(document).ready(function () {
            duration();
            function duration() {
                $("#duration").change(function () {
                    $(this).find('option:selected').each(function() {
                        let option = $(this).attr("value");

                        if(option == 'limited') {
                            $('#duration_time').removeClass('d-none');
                            $('#duration_time').addClass('d-block');
                        } else if(option == 'unlimited') {
                            $('#duration_time').removeClass('d-block');
                            $('#duration_time').addClass('d-none');
                        }
                    })
                }).change();
            }

            $("input[name='modal_banner_type']").change(function () {
                var selectValue = $("input[name='modal_banner_type']:checked").val();
                if (selectValue != 'image') {

                    $('#video_url').removeClass('d-none');
                    $('#image_url').addClass('d-none');

                } else {
                    $('#image_url').removeClass('d-none');
                    $('#video_url').addClass('d-none');
                }
            }).change();

            $('#summernote').on('summernote.paste', function(e, nativeEvent){
                nativeEvent.preventDefault();

                var clipboardData = nativeEvent.originalEvent.clipboardData;
                var pastedData = clipboardData.getData('Text');

                $(this).summernote('editor.insertText', pastedData);
            })
        });
    </script>
    {{--Subcategory--}}
    <script>
        function getSubcategory(cid) {
            $.ajax({
                url: '{{route('course.getsubcategory')}}',
                type: 'POST',
                data: {
                    "category_id": cid, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#subcategory').empty();
                    $('#subcategory').append('<option value="" disabled>{{__('Select Subcategory')}}</option>');

                    $.each(data, function (key, value) {
                        var select = '';
                        if (key == '{{ $course->sub_category }}') {
                            select = 'selected';
                        }
                        $('#subcategory').append('<option value="' + key + '"' + select + '>' + value + '</option>');
                    });
                }
            });
        }

        $(document).on('change', '#category_id', function () {
            var category_id = $(this).val();
            getSubcategory(category_id);
        });

        function createRow(val){
            let html = `
            <tr class="tb-tnx-item" id="banner-item-${val.id}">
                <td>${val.type}</td>
                <td>${val.title}</td>
                <td>${val.link}</td>
                <td>
                    <a href="#!" onclick="deleteBanner('${val.type}', ${val.id})" class="show_confirm_link" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}"><em class="icon ni ni-trash"></em><span>Remover</span></a>
                </td>
            </tr>`

            $('#tb-banner').append(html)
        }

        $(document).on('click', '#create_banner_submit', function () {

            var fd = new FormData();
            var banner = $('[data-toggle="banner"]').get(0).dropzone.getAcceptedFiles();
            var mobile_banner = $('[data-toggle="mobile_banner"]').get(0).dropzone.getAcceptedFiles();

            $.each(banner, function(key, file) {
                fd.append('images['+ key +']', $('[data-toggle="banner"]')[0].dropzone.getAcceptedFiles()[key])
            })

            $.each(mobile_banner, function(key, file) {
                fd.append('mobile_images['+ key +']', $('[data-toggle="mobile_banner"]')[0].dropzone.getAcceptedFiles()[key])
            })

            let description = tinymce.get("modal_banner_description").getContent();
            $('#modal_banner_description').val(description)

            var other_data = $('#frmBanner').serializeArray();
            var valid = this.form.checkValidity();
            $.each(other_data, function (key, input) {
                fd.append(input.name, input.value);
            });

            if (valid) {
                $.ajax({
                    url: "{{route('course.createbanners', $course->id)}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fd,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        if (data.flag == "success") {
                            createRow(data.row)
                            // setInterval('location.reload()', 1500);
                        } else {
                            alert(data.msg)
                        }
                    },
                    error: function (data) {
                        if (data.error) {
                        } else {
                        }
                    },
                });
            } else {
                show_toastr('{{__('Error')}}', '{{__('Name & Chapter Description are Required')}}', 'error');
                {{ Session::forget('error') }}
            }
        });

        function deleteBanner(type, id) {
            var token = $("meta[name='csrf-token']").attr("content");

            setTimeout(() => {
                let btn = $('.btn-success')
                btn.on('click', function(){
                    $.ajax({
                        url: '{{ route('course.destroybanners', ['_type', '_id']) }}'.replace('_id', id).replace('_type', type),
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        contentType: false,
                        processData: false,
                        type: 'DELETE',
                        success: function (data) {
                            if (data.flag == "success") {
                                $("#banner-item-"+id).remove()
                                // setInterval('location.reload()', 1500);
                            } else {
                                alert(data.msg)
                            }
                        },
                        error: function (data) {
                            if (data.error) {
                            } else {
                            }
                        },
                    });
                })
            }, 200);
        }
    </script>
@endpush
@section('content')

<div class="card card-bordered">
    <div class="card-inner">
        <div class="row g-gs">
            <div class="col-md-3">
                <ul class="nav link-list-menu border border-light round m-0">
                    <li>
                        <a href="#modulestab" data-bs-toggle="tab">{{ __('Modules') }}</a>
                    </li>
                    <li>
                        <a href="#coursetab" data-bs-toggle="tab">{{ __('General') }}</a>
                    </li>
                    <li>
                        <a href="#discussiontab" data-bs-toggle="tab">{{ __('Discussion') }}</a>
                    </li>
                    <li>
                        <a href="#generaltab" data-bs-toggle="tab">{{ __('Configurations') }}</a>
                    </li>
                    <li>
                        <a href="#personalizetab" data-bs-toggle="tab">{{ __('Personalize') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div id="generaltab" class="card tab-pane">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="title mb-4">{{ __('Configurations') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            {!! Form::model($course, array('route' => array('course.general', $course->id), 'method' => 'PUT')) !!}
                            <div class="row g-gs">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="visible_incourses" id="visible_incourses" {{ ($course->visible == 'on') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="visible_incourses">{{ __('Visible in courses grid') }}</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="linear_progress" id="linear_progress" {{ ($course->linear_progress == 'on') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="linear_progress">{{ __('Linear progress') }}</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="conditions" data-id="switch-visibility" id="conditions" {{ (!empty($course->course_access_rules)) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="conditions">{{ __('Condições para liberar curso') }}</label>
                                    </div>

                                    <div class="mt-3 {{ (!empty($course->course_access_rules)) ? 'd-block' : 'd-none' }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {{Form::label('condition_type',__('Select an option'),['class'=>'form-label'])}}
                                                <div class="form-control-wrap ">
                                                    <div class="form-control-select">
                                                        <select class="form-control" id="default-06" name="condition_type" data-id="select-visibility">
                                                            <option value="select-option">{{ __('Selecione uma opção') }}</option>
                                                            <option value="time" {{ (!empty($course->course_access_rules) && $course->course_access_rules->type == 'time') ? 'selected' : '' }}>{{ __('Liberar por tempo') }}</option>
                                                            <option value="percent" {{ (!empty($course->course_access_rules) && $course->course_access_rules->type == 'percent') ? 'selected' : '' }}>{{ __('Liberar por aproveitamento') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="time" class="{{ (!empty($course->course_access_rules) && $course->course_access_rules->type == 'time') ? 'd-block' : 'd-none' }}" data-id="select-visibility-options">
                                                    {{Form::label('time_rule',__('Tempo (Dias)'),['class'=>'form-label'])}}
                                                    {{Form::text('time_rule',(!empty($course->course_access_rules)) ? $course->course_access_rules->value : null,array('class'=>'form-control font-style'))}}
                                                </div>
                                                <div id="percent" class="{{ (!empty($course->course_access_rules) && $course->course_access_rules->type == 'percent') ? 'd-block' : 'd-none' }}" data-id="select-visibility-options">
                                                    {{Form::label('course_rule',__('Selecione um curso'),['class'=>'form-label'])}}
                                                    <div class="form-control-wrap mb-3">
                                                        <div class="form-control-select">
                                                            <select class="form-control" name="course_progress_id">
                                                                <option value="">{{ __('Selecione uma opção') }}</option>
                                                                @foreach($courses as $course_item)
                                                                    <option value="{{ $course_item->id }}" {{ (!empty($course->course_access_rules) && $course->course_access_rules->course_progress_id == $course_item->id) ? 'selected' : '' }}>{{ $course_item->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{Form::label('percentage_rule',__('Porcentagem de aproveitamento (%)'),['class'=>'form-label'])}}
                                                    {{Form::text('percentage_rule',(!empty($course->course_access_rules)) ? $course->course_access_rules->value : null,array('class'=>'form-control font-style'))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="skip_modules" id="skip_modules" {{ ($course->skip_modules == 'on') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="skip_modules">{{ __('Skip modules') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-6" id="course-content-2">
                                    {{Form::label('per_row',__('Quantidade de módulos por linha'),['class'=>'form-label'])}}
                                    <div class="form-control-wrap ">
                                        <div class="form-control-select">
                                            <select class="form-control" name="per_row" placeholder="{{__('Select Category')}}">
                                                <option value="5" {{ ($course->per_row === 5 ? 'selected' : '') }}>5</option>
                                                <option value="6" {{ ($course->per_row === 6 ? 'selected' : '') }}>6</option>
                                                <option value="7" {{ ($course->per_row === 7 ? 'selected' : '') }}>7</option>
                                                <option value="8" {{ ($course->per_row === 8 ? 'selected' : '') }}>8</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('link',__('Course Link'),['class'=>'form-label'])}}
                                    {{Form::text('link',$course->link,array('class'=>'form-control font-style'))}}
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="access_duration">{{ __('Access duration') }}</label>
                                        <div class="form-control-wrap">
                                            <div class="form-control-select">
                                                <select class="form-control" name="access_duration" id="duration">
                                                    <option value="unlimited">{{ __('Unlimited') }}</option>
                                                    <option value="limited">{{ __('Limited time') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 d-none" id="duration_time">
                                        <label class="form-label" for="duration_time">{{ __('Days') }}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="duration_time" value="365" placeholder="365">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {{Form::label('police',__('Police Privacy'),['class'=>'form-label'])}}
                                    <textarea class="form-control tinymce-toolbar" name="police">{{ $course->police }}</textarea>
                                </div>
                                <div class="col-lg-12 text-right text-end float-end">
                                    <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" id="submit-all">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div id="discussiontab" class="card tab-pane">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="title mb-4">{{ __('Discussion') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            {!! Form::model($course, array('route' => array('course.discussion', $course->id), 'method' => 'PUT')) !!}
                            <div class="row g-gs">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="allow_comments" class="custom-control-input" id="allow_comments" {{ ($course->comments == 'on') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="allow_comments">{{ __('Allow comments') }}</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="allow_reviews" class="custom-control-input" id="allow_reviews" {{ ($course->reviews == 'on') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="allow_reviews">{{ __('Allow reviews') }}</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="gamification" class="custom-control-input" id="gamification" {{ ($course->gamification == 'on') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="gamification">{{ __('gamification') }}</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right text-end float-end">
                                    <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" id="submit-all">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div id="modulestab" class="card tab-pane active">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="title">{{ __('Create Module') }}</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" data-url="{{route('headers.create',$course_id)}}" class="btn btn-icon btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Create Module')}}" data-ajax-popup="true" data-size="lg" data-title="{{__('Create Module')}}"><em class="icon ni ni-plus"></em><span>Criar Módulo</span></a>
                                </div> 
                            </div>
                        </div>
                        <div>
                            {{-- <form method="POST" action="{{route('headers.create',$course_id)}}" accept-charset="UTF-8">                            
                                
                                @csrf --}}
                                <div>
                                    @if(!empty($headers) && count($headers) > 0)
                                        @foreach ($headers as $header)
                                            <div class="card mt-2">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <b>{{ $header->title }}</b>
                                                        </div>
                                                        <div class="col-md-6 px-0 actions d-flex justify-end">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <a href="{{route('chapters.create',[$course_id,$header->id])}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Create Chapter')}}" data-ajax-popup="true" data-size="lg" data-title="{{__('Create Chapter')}}"><em class="icon ni ni-plus"></em><span>Criar aula</span></a>
                                                                </div>

                                                                
                                                                <div class="ms-2">
                                                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Edit Module')}}" data-ajax-popup="true" data-size="lg" data-title="{{__('Edit Header')}}" data-url="{{route('headers.edit',[$header->id,$course_id])}}"><em class="icon ni ni-edit"></em><span>Editar Módulo</span></a>
                                                                </div> 
        
                                                                <div class="ms-2">
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['headers.destroy', [$header->id,$course_id] ]]) !!}
                                                                    <a href="#!" class="show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}">
                                                                        <em class="icon ni ni-trash"></em>Deletar
                                                                    </a>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(!empty($header->chapters_data))

                                                    <table class="table">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col" style=" width: 80px;"></th>
                                                                    <th scope="col" style=" width: 80px;">#</th>
                                                                    <th scope="col"style=" width: 65px;">Tipo</th>
                                                                    <th scope="col"style=" width: 1100px;">Nome</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col" style=" width: 131px;"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="dragContainer" class="dragula-container">
                                                                @foreach($header->chapters_data()->orderBy('position', 'ASC')->get() as $chapters)
                                                                    <tr class="chapter_item" data-chapter-id="{{$chapters->id}}" style="cursor:move;">
                                                                        <td>
                                                                            <em class="icon ni ni-move"></em>
                                                                        </td>
                                                                        <th scope="row">{{$chapters->id}}</th>
                                                                        <td>
                                                                            <em class="icon ni @if ($chapters->type == 'youtube') ni-youtube @endif @if ($chapters->type == 'vimeo') ni-vimeo @endif @if ($chapters->type == 'text_content') ni-article @endif  @if ($chapters->type == 'quiz') ni-list-ol @endif" style=" font-size: 26px; "></em></td>
                                                                        <td>{{$chapters->name}}</td>
                                                                        <td><span class="badge bg-success">Publicada</span></td>
                                                                        <td style=" display: flex; ">
                                                                        <div class="tb-odr-btns d-none d-md-inline mx-xl-1"><a href="{{route('chapters.edit',[$course_id,$chapters->id,$header->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Edit Chapter')}}" data-title="{{__('Edit Chapter')}}" class="btn btn-sm btn-primary"><em class="icon ni ni-edit"></em><span>Editar</span></a></div>
                                                                        <div class="tb-odr-btns d-none d-md-inline">
                                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['chapters.destroy', [$chapters->id,$course_id,$header->id] ]]) !!}
                                                                            <a href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}" class="show_confirm btn btn-sm btn-primary"><em class="icon ni ni-trash"></em>Deletar</a>
                                                                            {!! Form::close() !!}
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                    </table>
                                                @endif
                                            </div>
                                        @endforeach
                                    @else
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <i class="fas fa-folder-open text-primary" style="font-size: 48px;"></i>
                                                    <h2>{{__('Opps')}}...</h2>
                                                    <h6>{{__('No data Found')}}. </h6>
                                                    <h6>{{__('Please Create New Header')}}. </h6>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    @endif
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                    <div id="coursetab" class="card tab-pane">
                        <div class="card-body">
                            <div class="card-title">
                                <h5 class="title">{{ __('Edit Course') }}</h5>
                            </div>
                            {{Form::model($course,array('route' => array('course.update', $course->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
                                @csrf
                                <div class="row g-gs">
                                    <div class="col-md-12">
                                        {{Form::label('title',__('Topic Title'),['class'=>'form-label'])}}
                                        {{Form::text('title',null,array('class'=>'form-control font-style','required'=>'required'))}}
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        {{Form::label('course_description',__('Course Description'),['class'=>'form-label'])}}
                                        <textarea name="course_description" id="summernote" style="opacity: 0;" class="summernote-basic">
                                            {{ $course->course_description }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-6" id="course-content-2">
                                        {{Form::label('category',__('Select Category'),['class'=>'form-label'])}}
                                        <select class="form-control" name="category" id="category_id" placeholder="{{__('Select Category')}}">
                                            <option value="">{{__('Select Category')}}</option>
                                                @foreach($category as $id=>$category)
                                                    <option value="{{ $id }}" {{ ($id == $course->category) ? 'selected' : '' }}>{{ $category }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6">                           
                                        <div class="form-file mb-2">
                                            <label for="thumbnail" class="form-label">{{ __('Upload thumbnail') }}</label>
                                            <input type="file" class="form-control mb-2" name="thumbnail" id="thumbnail" aria-label="file example" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <img src="{{asset(Storage::url('uploads/thumbnail/'.$course->thumbnail))}}" id="blah" width="25%"/>
                                            <div class="invalid-feedback">{{ __('invalid form file') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="external_link_switch" data-id="switch-visibility" id="external_link_switch" {{ ($course->external_link !== null) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="external_link_switch">{{ __('Link externo') }}</label>
                                        </div>

                                        <div class="mt-3 {{ (!empty($course->external_link)) ? 'd-block' : 'd-none' }}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-control-wrap ">
                                                        {{Form::text('external_link',null,array('class'=>'form-control font-style', 'placeholder'=>'https://'))}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="free" id="free" {{ ($course->free) !== null ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="free">{{ __('Curso gratuíto') }}</label>
                                        </div>
                                    </div>
                                    <div class="row mt-4 float-end">
                                        <div class="col-lg-12 text-right text-end float-end">
                                            <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" id="submit-all">
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    <div id="personalizetab" class="card tab-pane">
                        {{Form::model($course,array('route' => array('course.updatetheme', $course->id), 'method' => 'POST','enctype'=>'multipart/form-data')) }}
                            <div class="preview-block">
                                <span class="preview-title">Exibir banner na página do curso?</span>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="cust_enable_banner" data-id="switch-visibility" id="customSwitch2" value="on" {{ (!empty($banners) && count($banners)> 0) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customSwitch2">Sim</label> 
                                </div>

                                <div id="banners" class="{{ (!empty($banners) && count($banners) > 0) ? 'd-block' : 'd-none' }} mt-4">
                                    <div class="">
                                        <div class="card card-bordered">
                                            <div class="card-inner nk-block-between">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                    <h6 class="title">Banners</h6>
                                                    </div>
                                                </div>
                                                <div class="nk-block-tools-opt">
                                                    <a class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalBanner">
                                                        <em class="icon ni ni-plus"></em><span class="pe-3">Add Banner</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-inner p-0 border-top">
                                                <table class="table table-tranx">
                                                    <thead class="tb-tnx-head">
                                                        <tr>
                                                            <th scope="col">Tipo</th>
                                                            <th scope="col">Título</th>
                                                            <th scope="col">Link</th>
                                                            <th scope="col" class="text-right">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-banner">
                                                        @if (!empty($banners) && count($banners) > 0)
                                                            @foreach ($banners as $banner)
                                                                <tr class="tb-tnx-item" id="banner-item-{{ $banner->id }}">
                                                                    <td>{{ $banner->type }}</td>
                                                                    <td>{{ $banner->title }}</td>
                                                                    <td>{{ $banner->link }}</td>
                                                                    <td>
                                                                        <a href="#!" onclick="deleteBanner('{{ $banner->type }}', {{ $banner->id }})" class="show_confirm_link" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}"><em class="icon ni ni-trash"></em><span>Remover</span></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-block mt-4">
                                <span class="preview-title">Exibir nome da aula?</span>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="cust_enable_chapter_name" data-id="switch-visibility" id="enable_chapter_name" value="on" {{ ($course_settings['cust_enable_chapter_name'] == 'on') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="enable_chapter_name">Sim</label>
                                </div>
                            </div>
                            <div class="nk-block-head mt-4">
                                <div class="nk-block-head-content">
                                    <h4 class="title nk-block-title">Escolha um modelo</h4>
                                    <p>Escolha um modelo da página do curso</p>
                                </div>
                            </div>
                            <div class="row g-gs">
                                <div class="col-lg-4 col-xxl-3 col-sm-6">
                                    <div class="card shadow-none">
                                        <img src="https://rocketmember.app//storage/uploads/thumbnail/modelo1.png" class="border border-light rounded" alt="">
                                        <div class="card-inner pt-3 p-0">
                                            <p class="card-text">Mostrar Thumbs das aulas</p>
                                            <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input type" value="cust_theme1" name="cust_theme" @if ($course_settings['cust_theme'] == 'cust_theme1') checked @endif id="type1">
                                                <label class="custom-control-label" for="type1">
                                                    <span>{{ __('Active Theme') }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xxl-3 col-sm-6">
                                    <div class="card shadow-none">
                                        <img src="https://rocketmember.app//storage/uploads/thumbnail/modelo1.png" class="border border-light rounded" alt="">
                                        <div class="card-inner pt-3 p-0">
                                            <p class="card-text">Mostra apenas os modulos (Versão Slide)</p>
                                            <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input type" value="cust_theme2" name="cust_theme" @if ($course_settings['cust_theme'] == 'cust_theme2') checked @endif id="type2">
                                                <label class="custom-control-label" for="type2">
                                                    <span>{{ __('Active Theme') }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xxl-3 col-sm-6">
                                    <div class="card shadow-none">
                                        <img src="https://rocketmember.app//storage/uploads/thumbnail/modelo1.png" class="border border-light rounded" alt="">
                                        <div class="card-inner pt-3 p-0">
                                            <p class="card-text">Mostra apenas os modulos (Versão Grid)</p>
                                            <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                <input type="radio" class="custom-control-input type" value="cust_theme3" name="cust_theme" @if ($course_settings['cust_theme'] == 'cust_theme3') checked @endif id="type3">
                                                <label class="custom-control-label" for="type3">
                                                    <span>{{ __('Active Theme') }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right text-end float-end">
                                    <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" id="submit-all">
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBanner">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{Form::open(array('method'=>'post','id'=>'frmBanner','enctype'=>'multipart/form-data'))}}
                <div class="row">
                    <div class="col-12">
                        <div id="account_edit" class="tabs-card">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <label for="type" class="form-label">Tipo do Banner</label>
                                        </div>
                                        <ul class="custom-control-group">
                                            <li>
                                                <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input type" value="video" name="modal_banner_type" id="banner_type1">
                                                    <label class="custom-control-label" for="banner_type1">
                                                        <em class="icon ni ni-youtube"></em>
                                                        <span>Video</span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox custom-control-pro no-control">
                                                    <input type="radio" class="custom-control-input type" value="image" name="modal_banner_type" checked id="banner_type2">
                                                    <label class="custom-control-label" for="banner_type2">
                                                        <em class="icon ni ni-article"></em>
                                                        <span>Imagem</span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="form-group col-md-6 mt-4">
                                            <label for="modal_banner_title" class="form-label">Titulo do Banner</label>
                                            <input class="form-control font-style" name="modal_banner_title" type="text" value="" id="modal_title_banner">
                                        </div>
                                        <div class="form-group col-md-6 mt-4">
                                            <label for="modal_banner_link" class="form-label">Link do banner</label>
                                            <input class="form-control font-style" name="modal_banner_link" type="text" value="" id="name">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Cor do Botão</label>
                                            <div class="form-control-wrap" style=" width:60px;">
                                                <input class="form-control" type="color" name="modal_banner_bg_color" value="#25067a">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="form-label">Cor do texto</label>
                                            <div class="form-control-wrap" style=" width:60px;">
                                                <input class="form-control" type="color" name="modal_banner_text_color" value="#ffffff">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 col-lg-12">
                                            <label for="modal_banner_description" class="form-label">Descrição do Banner</label>
                                            {{Form::textarea('modal_banner_description',null,array('class'=>'tinymce-toolbar form-control modal_banner_description', 'id' => 'modal_banner_description'))}}
                                        </div>
                                        <div class="row" id="image_url">
                                            <div class="form-group col-lg-6">
                                                <div class="mb-2">
                                                    <label for="thumbnail" class="form-label">Imagem do banner dekstop</label>
                                                    <div class="upload-zone dropzone dz-clickable" data-toggle="banner" id="images" data-max-files="1">
                                                        <div class="dz-message" data-dz-message="">
                                                            <span class="dz-message-text">Drag and drop file</span>
                                                            <span class="dz-message-or">or</span>
                                                            <buttom class="btn btn-primary">SELECT</buttom>
                                                        </div>
                                                        <div id="preview-template">
                                                            <div class="dz-preview dz-file-preview">
                                                                <div class="dz-details">
                                                                    <img data-dz-thumbnail="">
                                                                </div>
                                                            </div>
                                                            <div class="preview_thumbnail"></div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <div class="mb-2">
                                                    <label for="thumbnail" class="form-label">Imagem do banner mobile</label>
                                                    <div class="upload-zone dropzone dz-clickable" data-toggle="mobile_banner" id="images" data-max-files="1">
                                                        <div class="dz-message" data-dz-message="">
                                                            <span class="dz-message-text">Drag and drop file</span>
                                                            <span class="dz-message-or">or</span>
                                                            <buttom class="btn btn-primary">SELECT</buttom>
                                                        </div>
                                                        <div id="preview-template">
                                                            <div class="dz-preview dz-file-preview">
                                                                <div class="dz-details">
                                                                    <img data-dz-thumbnail="">
                                                                </div>
                                                            </div>
                                                            <div class="preview_thumbnail"></div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12 d-block d-none" id="video_url">                                
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">https://www.youtube.com/watch?v=</span>
                                                </div>
                                                {{Form::text('modal_video_banner',null,array('class'=>'form-control'))}}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="button" data-bs-dismiss="modal" class="btn btn-sm btn-primary rounded-pill mr-auto" id="create_banner_submit" value="{{ __('Add Banner') }}" />
                                        </div>
                                    </div>                                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
