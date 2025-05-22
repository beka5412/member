@extends('layouts.admin')
@section('page-title')
    {{__('Chapters')}}
@endsection
@section('title')
    {{__('Edit Chapter')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('course.index') }}">{{ __('Course') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('course.edit',$course_id) }}">{{ __('Edit') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit') }}</li>
@endsection
@section('action-btn')
    <a href="{{route('course.edit',$course_id)}}" class="btn-primary p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Edit')}}">
    <em class="icon ni ni-arrow-left"></em>
    </a>
@endsection
@section('filter')
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{asset('assets/newscss/editors/summernote.css')}}">
@endpush
@push('script-page')
    <script src="{{asset('assets/newjs/libs/editors/summernote.js')}}"></script>
    <script>
        let labelHidden = []
        let linkHidden = []
        var attachment
        
        $(document).ready(function () {
            $("input[name='type']").change(function () {
                var radioValue = $("input[name='type']:checked").val();
                if (radioValue != 'text_content') {

                    $('#video_url_div').removeClass('d-none');
                    $('#video_url_div').addClass('d-block');

                    if(radioValue == 'youtube'){
                        let span = document.getElementById('video_legend').children[0]
                        let txt = document.createTextNode("https://www.youtube.com/watch?v=")
                        span.replaceChild(txt, span.childNodes[0])

                    }else{
                        let span = document.getElementById('video_legend').children[0]
                        let txt = document.createTextNode("https://vimeo.com/")
                        span.replaceChild(txt, span.childNodes[0])
                    }

                } else if (radioValue == 'text_content') {

                    $('#video_url_div').addClass('d-none');
                    $('#video_url_div').removeClass('d-block');
                }
            }).change();

            $('#summernote').on('summernote.paste', function(e, nativeEvent){
                nativeEvent.preventDefault();

                var clipboardData = nativeEvent.originalEvent.clipboardData;
                var pastedData = clipboardData.getData('Text');

                $(this).summernote('editor.insertText', pastedData);
            });
        });

        $(document).on('click', '#create_link_submit', function (e) {
            e.preventDefault()
            e.stopPropagation()

            let label = $('#modal_link_label').val()
            let link = $('#modal_link').val()

            labelHidden.push(label)
            linkHidden.push(link)

            $("input[name='link_label_link[]']").val(labelHidden.join(","))
            $("input[name='chapter_link[]']").val(linkHidden.join(","))

            let html = '<tr>'
            html += `<td>${label}</td>`
            html += '<td><span>Link</span></td>'
            html += '<td></td>'
            html += '</tr>'

            $('#tb-attachment').append(html)

            $('#modal_link_label').val('')
            $('#modal_link').val('')
        })

        $(document).on('click', '#create_file_submit', function(e){
            e.preventDefault()
            e.stopPropagation()

            let html = '<tr>'
            html += `<td>${attachment.name}</td>`
            html += '<td><span>Anexo</span></td>'
            html += '<td></td>'
            html += '</tr>'

            $('#tb-attachment').append(html)
            attachment = $('[data-toggle="dropzone1"]').get(0).dropzone.getAcceptedFiles()
            setTimeout(() => {
                $('[data-toggle="dropzone1"]').get(0).dropzone.removeAllFiles(true)
            }, 1000);
        })

        Dropzone.options.uploadFiles = {
            init: function() {
                let th = this
                this.on("addedfile", function(file, xhr, data) {
                    attachment = file
                });
            }
        };

        Dropzone.options.thumbnail = {
            init: function() {
                this.on("addedfile", function(file, xhr, data) {
                    $('.preview_thumbnail').parent().remove()
                });
            }
        };

        $(document).on('click', '#chapter_update_submit', function () {

            var fd = new FormData();
            //var attachment = $('[data-toggle="dropzone1"]').get(0).dropzone.getAcceptedFiles();
            let thumbnail = $('[data-toggle="dropzone2"]').get(0).dropzone.getAcceptedFiles();
            console.log(attachment);

            $.each(attachment, function (key, file) {
                fd.append('multiple_files[' + key + ']', attachment[key]); // attach dropzone image element
            });

            $.each(thumbnail, function(key, file) {
                fd.append('thumbnail['+ key +']', $('[data-toggle="dropzone2"]')[0].dropzone.getAcceptedFiles()[key])
            })

            var other_data = $('#frmTarget').serializeArray();
            var form = document.getElementById("frmTarget")
            var valid = form.checkValidity();
            $.each(other_data, function (key, input) {
                fd.append(input.name, input.value);
            });

            if (valid) {
                $.ajax({
                    url: "{{route('chapters.update',$chapters->id)}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fd,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    success: function (data) {
                        if (data.flag == "success") {
                            alert(data.msg)
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
    </script>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div id="account_edit" class="tabs-card">
                <div class="card ">
                    <div class="card-body">
                        {{Form::model($chapters,array('id'=>'frmTarget','enctype'=>'multipart/form-data')) }}
                        <div class="row">
                            <div>
                                {{Form::label('type',__('Chapter Type'),['class'=>'form-label'])}}
                            </div>
                            
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control @if ($chapters->type == 'youtube') checked @endif">
                                        <input type="radio" class="custom-control-input type" value="youtube" name="type" @if ($chapters->type == 'youtube') checked @endif id="type1">
                                        <label class="custom-control-label" for="type1">
                                            <em class="icon ni ni-youtube"></em>
                                            <span>Youtube</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control @if ($chapters->type == 'vimeo') checked @endif">
                                    <input type="radio" class="custom-control-input type" value="vimeo" name="type" @if ($chapters->type == 'vimeo') checked @endif id="type2">
                                    <label class="custom-control-label" for="type2">
                                    <em class="icon ni ni-vimeo"></em>
                                        <span>Vimeo</span>
                                    </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control @if ($chapters->type == 'text_content') checked @endif">
                                    <input type="radio" class="custom-control-input type" value="text_content" name="type" id="type3" @if ($chapters->type == 'text_content') checked @endif>
                                    <label class="custom-control-label" for="type3">
                                    <em class="icon ni ni-article"></em>
                                        <span>Somente Texto</span>
                                    </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control @if ($chapters->type == 'quiz') checked @endif">
                                    <input type="radio" class="custom-control-input type" name="type" id="type4" @if ($chapters->type == 'quiz') checked @endif>
                                    <label class="custom-control-label" for="type4">
                                    <em class="icon ni ni-list-ol"></em>
                                        <span>Quiz</span>
                                    </label>
                                    </div>
                                </li>
                            </ul>
                            <div class="form-group col-md-6 mt-4">
                                {{Form::label('name',__('Chapter Name'),['class'=>'form-label'])}}
                                {{Form::text('name',null,array('class'=>'form-control font-style','required'=>'required'))}}
                            </div>
                            <div class="col-md-6 mt-4">
                                {{Form::label('header_category',__('Select an option'),['class'=>'form-label'])}}
                                {{ $header_id }}
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" id="default-06" name="header_id">
                                            @foreach($headers as $header)
                                                <option value="{{ $header->id }}" @if($header->id == $header_id) selected @endif>{{ $header->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">                                
                                <div class="mb-2">
                                    <label for="thumbnail" class="form-label">{{ __('Upload thumbnail') }}</label>
                                    
                                    <div class="upload-zone" id="thumbnail" data-toggle="dropzone2" data-max-files="1">
                                        <div class="fallback">
                                            <input name="file" type="file" />
                                        </div>
                                        <div class="dz-message" data-dz-message>
                                            <span class="dz-message-text">Drag and drop file</span>
                                            <span class="dz-message-or">or</span>
                                            <buttom class="btn btn-primary">SELECT</buttom>
                                        </div>
                                        <div id="preview-template">
                                            <div class="dz-preview dz-file-preview">
                                                <div class="dz-details">
                                                    <img data-dz-thumbnail />
                                                </div>
                                                @if (!empty($chapters->thumbnail))
                                                    <div class="preview_thumbnail" style="background: url('{{ asset(Storage::url('uploads/chapter/thumbnail/'.$chapters->thumbnail)) }}'); background-size: cover; border-radius: 20px; width: 120px; height: 120px;">
                                                    </div>  
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                {{Form::label('chapter_description',__('Chapter Description'),['class'=>'form-label'])}}
                                <textarea name="chapter_description" id="summernote" style="opacity: 0;" class="summernote-basic">{{ $chapters->chapter_description }}</textarea>
                            </div>
                            <div class="form-group col-md-6" id="video_url_div">
                                {{Form::label('video_url',__('Video URL'),['class'=>'form-label'])}}
                                <div class="form-control-wrap">
                                    <div class="input-group">
                                        <div class="input-group-prepend" id="video_legend">
                                            <span class="input-group-text" id="basic-addon1">https://www.youtube.com/watch?v=</span>
                                        </div>
                                        {{Form::text('video_url',null,array('class'=>'form-control'))}}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <span class="preview-title">Liberar aula após um determinado tempo?</span>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="enable_time" class="custom-control-input" data-id="switch-visibility" id="time" @if($chapters->enable_time === 'on') checked @endif>
                                    <label class="custom-control-label" for="time">Sim</label>
                                </div>

                                <div class="{{ ($chapters->enable_time == 'on') ? 'd-block' : 'd-none' }} mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{Form::label('time_type',__('Select an option'),['class'=>'form-label'])}}
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                <select class="form-control" id="default-06" name="time_type">
                                                    <option @if($chapters->time_type == 'days') selected @endif value="days">{{ __('Day') }}</option>
                                                    <option @if($chapters->time_type == 'month') selected @endif value="month">{{ __('Month') }}</option>
                                                    <option @if($chapters->time_type == 'year') selected @endif value="year">{{ __('Year') }}</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{Form::label('time_number',__('Digit an number'),['class'=>'form-label'])}}
                                            {!! Form::text('time_number',null,array('class'=>'form-control font-style'))!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="link_label_link[]">
                            <input type="hidden" name="chapter_link[]">
                        </div>
                        {{ Form::close() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <span class="preview-title">Essa aula possui anexo?</span>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" data-id="switch-visibility" id="attachment" @if(count($links) > 0 || count($files) > 0) checked @endif>
                                        <label class="custom-control-label" for="attachment">Sim</label>
                                    </div>

                                    <div class="mt-3 @if(count($links) > 0 || count($files) > 0) d-block @else d-none @endif">
                                        <div class="d-flex justify-end my-3">
                                            <div class="nk-block-tools-opt">
                                                <div class="dropdown quick-add-btn">
                                                    <a class="btn btn-primary" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                        <em class="icon ni ni-plus"></em>
                                                        <span>{{ __('Add Attachment') }}</span>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalLink"><span>{{ __('Link') }}</a>
                                                        <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalFile"><span>{{ __('File') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered mb-3">
                                            <div class="card-inner nk-block-between">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                    <h6 class="title">Attachments</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-inner p-0 border-top">
                                                <table class="table table-tranx">
                                                    <thead class="tb-tnx-head">
                                                        <tr>
                                                            <th scope="col">{{ __('Name') }}</th>
                                                            <th scope="col">{{ __('Type') }}</th>
                                                            <th scope="col" class="text-right">{{ __('Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb-attachment">
                                                        @if (!empty($standarized_attachments) && count($standarized_attachments) > 0)
                                                            @foreach ($standarized_attachments as $attachment)
                                                                <tr>
                                                                    <td>{{ $attachment['label'] }}</td>
                                                                    <td>{{ $attachment['type'] }}</td>
                                                                    <td>
                                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['chapters.attachment.destroy', [$attachment['type'], $attachment['id']]]]) !!}
                                                                            <a href="#!" class="show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}">
                                                                                <em class="icon ni ni-trash"></em>
                                                                            </a>
                                                                        {!! Form::close() !!}
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-right text-end float-end">
                                <input type="button" id="chapter_update_submit" class="btn btn-primary btn-submit" value="{{ __('Update') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modalLink">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <form action="#" id="formLink">
                    <div class="row g-gs card-inner">
                        <div class="col-md-12">
                            <div class="nk-block-head col-lg-6">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">{{ __('Attachments') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" data-id="container_link">
                            <div class="row row-g-gs">
                                <div class="col-md-6">
                                    {{Form::label('chapter_label_link',__('Label'),['class'=>'form-label'])}}
                                    {{Form::text('modal_link_label',null,array('class'=>'form-control', 'id' => 'modal_link_label'))}}
                                </div>
                                <div class="col-md-6">
                                    {{Form::label('chapter_link',__('URL'),['class'=>'form-label'])}}
                                    {{Form::text('modal_link',null,array('class'=>'form-control', 'id' => 'modal_link'))}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" data-bs-dismiss="modal" class="btn btn-sm btn-primary rounded-pill mr-auto" id="create_link_submit">{{ __('Send') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modalFile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <form action="#">
                    <div class="row g-gs card-inner">
                        <div class="col-md-12" data-id="container_link">
                            <label for="thumbnail" class="form-label">{{ __('Upload thumbnail') }}</label>

                            <div class="upload-zone" data-max-files="1" data-toggle="dropzone1" id="upload-files">
                                <div class="fallback">
                                    <input name="file" type="file" />
                                </div>
                                <div class="dz-message" data-dz-message>
                                    <span class="dz-message-text">Drag and drop file</span>
                                    <span class="dz-message-or">or</span>
                                    <p class="btn btn-primary">SELECT</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" data-bs-dismiss="modal" class="btn btn-sm btn-primary rounded-pill mr-auto" id="create_file_submit">{{ __('Send') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


