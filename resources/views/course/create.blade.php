@extends('layouts.admin')
@section('page-title')
    {{__('Course')}}
@endsection
@section('title')
    {{__('Create Course')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('course.index') }}">{{ __('Course') }}</a></li>
    <li class="breadcrumb-item">{{ __('create') }}</li>
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
@endpush
@push('script-page')
    <script src="{{asset('assets/newjs/libs/editors/summernote.js')}}"></script>
    {{--Switch--}}
    <script>
        $(document).ready(function(){
            type();
            $(document).on('click', '.code', function(e){
                var type = $(this).val();
                if(type == 'Quiz') {
                    $('#quiz-content-1').removeClass('d-none');
                    $('#quiz-content-1').addClass('d-block');
                    $('#course-content-1').removeClass('d-block');
                    $('#course-content-1').addClass('d-none');
                    $('#course-content-2').removeClass('d-block');
                    $('#course-content-2').addClass('d-none');
                    $('#course-content-3').removeClass('d-block');
                    $('#course-content-3').addClass('d-none');
                    $('#course-content-4').removeClass('d-block');
                    $('#course-content-4').addClass('d-none');


                    $('#duration').removeClass('d-block');
                    $('#duration').addClass('d-none');

                } else {

                    $('#course-content-1').removeClass('d-none');
                    $('#course-content-1').addClass('d-block');
                    $('#course-content-2').removeClass('d-none');
                    $('#course-content-2').addClass('d-block');
                    $('#course-content-3').removeClass('d-none');
                    $('#course-content-3').addClass('d-block');
                    $('#course-content-4').removeClass('d-none');
                    $('#course-content-4').addClass('d-block');

                    $('#duration').removeClass('d-none');
                    $('#duration').addClass('d-block');

                    $('#quiz-content-1').removeClass('d-block');
                    $('#quiz-content-1').addClass('d-none');
                }
            });
            
            $(document).on('click', '#customSwitches', function() {
                if($(this).is(":checked"))
                {
                    $('#price').addClass('d-none');
                    $('#price').removeClass('d-block');
                    $('#discount-div').addClass('d-none');
                    $('#discount-div').removeClass('d-block');
                }else{
                    $('#price').addClass('d-block');
                    $('#price').removeClass('d-none');
                    $('#discount-div').addClass('d-block');
                    $('#discount-div').removeClass('d-none');
                }
            });

            $(document).on('click', '#customSwitches2', function() {
                if($(this).is(":checked"))
                {
                    $('#discount').addClass('d-block');
                    $('#discount').removeClass('d-none');
                }else{
                    $('#discount').addClass('d-none');
                    $('#discount').removeClass('d-block');
                }
            });

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
        $(document).on('change', '#category_id', function () {
            var category_id = $(this).val();
            getSubcategory(category_id);
        });

        $("#subcategory-div").html('');
        $('#subcategory-div').append('<select class="form-control" id="subcategory" name="subcategory[]"  multiple></select>');

        function getSubcategory(cid) {
            /*console.log(cid);
            return false;*/
            $.ajax({
                url: '{{route('course.getsubcategory')}}',
                type: 'POST',
                data: {
                    "category_id": cid, "_token": "{{ csrf_token() }}",
                },
                success: function (data) {
                    $('#subcategory').empty();
                    var subcategory_option = '<option value="" disabled>{{__('Select Subcategory')}}</option>';
                    $.each(data, function (key, value) {
                        subcategory_option += '<option value="' + key + '">' + value + '</option>';
                    });                                        
                    $("#subcategory").append(subcategory_option);

                    var multipleCancelButton = new Choices('#subcategory', {
                        removeItemButton: true,
                    });
                }
            });
        }
    </script>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-inner">
                    {{ Form::open(array('route' => 'course.store','method' =>'post','enctype'=>'multipart/form-data')) }}
                    <div class="row g-gs">
                        <div class="col-md-12">
                            {{Form::label('title',__('Title'),['class'=>'form-label'])}}
                            {{Form::text('title',null,array('class'=>'form-control font-style','required'=>'required'))}}
                        </div>
                        <div class="col-md-12 col-lg-12">
                            {{Form::label('course_description',__('Course Description'),['class'=>'form-label'])}}
                            <textarea name="course_description" id="summernote" style="opacity: 0;" class="summernote-basic"></textarea>
                        </div>

                        <div class="col-md-6" id="course-content-2">
                            {{Form::label('category',__('Select Category'),['class'=>'form-label'])}}
                            <select class="form-control" name="category" id="category_id" placeholder="{{__('Select Category')}}">
                                <option value="">{{__('Select Category')}}</option>
                                    @foreach($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">                           
                            <div class="mb-2">
                                <label for="thumbnail" class="form-label">{{ __('Upload thumbnail') }}</label>
                                <input type="file" class="form-control mb-2" name="thumbnail" id="thumbnail" aria-label="file example" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <img src="" id="blah" width="25%"/>
                                <div class="invalid-feedback">{{ __('invalid form file') }}</div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="external_link_switch" data-id="switch-visibility" id="external_link_switch">
                                <label class="custom-control-label" for="external_link_switch">{{ __('Link externo') }}</label>
                            </div>

                            <div class="mt-3 {{ (!empty($course->course_access_rules)) ? 'd-block' : 'd-none' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-control-wrap ">
                                            {{Form::text('external_link',null,array('class'=>'form-control font-style', 'placeholder'=>'https://'))}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="free" id="free">
                                <label class="custom-control-label" for="free">{{ __('Liberar curso para todos os alunos') }}</label>
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
        </div>
    </div>
@endsection




