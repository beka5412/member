@php
    $pass = Utility::unlockChapterByCondition($current_chapter, $student->id);
@endphp
@extends('storefront.user.user')
@section('page-title')
    {{__('Home')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@push('style')
@endpush
@push('script-page')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.3/plyr.css" />
    <script src="https://cdn.plyr.io/3.7.3/plyr.js"></script>

    <script>
        const player = new Plyr('#player', {
            youtube: { noCookie: false, rel: 0, showinfo: 0, iv_load_policy: 3, modestbranding: 1 },
            resetOnEnd: true
        });

        const next = document.getElementById("btn__next")
        var time = 0
        var total = 0

        function chapter_activity(){
            $.get('{{ route('student.chapterActivity', [$slug, $current_chapter->course_id, $current_chapter->id, '_time','_total']) }}'.replace('_time', time).replace('_total', total), function(data) {
                
            });
        }

        function chapter_bookmark(){
            $.get('{{ route('student.chapterBookmark', [$slug, $current_chapter->course_id, $current_chapter->header_id, $current_chapter->id]) }}', function(data) {
                if(data.action == 'add'){
                    $('#bookmark_check').toggleClass('btn-success')
                    $('#bookmark_check').toggleClass('btn-outline-primary')
                    $('#bookmark_check_text').text('Aula Salva')
                }else{
                    $('#bookmark_check').toggleClass('btn-success')
                    $('#bookmark_check').toggleClass('btn-outline-primary')
                    $('#bookmark_check_text').text('Salvar Aula')
                }
            });
        }

        function activity_like(value){

            let like_number = $('#like_number')
            let dislike_number = $('#dislike_number')
            
            $.get('{{ route('student.chapterActivity', [$slug, $current_chapter->course_id, $current_chapter->id, 0, 0, 'value']) }}'.replace('value', value), function(data) {
                if(value == 'like'){
                    like_number.text(parseInt(like_number.text()) + 1)
                    if(dislike_number.text() > 0){
                        dislike_number.text(parseInt(dislike_number.text()) - 1)
                    }
                }else{
                    dislike_number.text(parseInt(dislike_number.text()) + 1)
                    if(like_number.text() > 0){
                        like_number.text(parseInt(like_number.text()) - 1)
                    }
                }
            });
        }

        player.on('timeupdate', (event) => {
            time = player.currentTime
            total = player.duration
        });
        
        player.on('pause', (event) => {
            chapter_activity();
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#check').on('click', function() {
                let success = $('.btn-success')
                $('#check').toggleClass('btn-success')
                $.ajax({
                    type: "POST",
                    url: '{{ route('student.chaptermarker', [$current_chapter->header_id, $current_chapter->id, $courses->id, $slug]) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        if (response.status == "Success") {
                            if(success.length > 0){
                                $('#check_text').text('Marcar como concluída')
                            }else{
                                console.log(success);
                                $('#check_text').text('Aula concluída')
                            }
                        }
                    },
                    error: function (result) {
                    }
                });
            })

            function addNote (time, description){
                let node = $("#note")
                let clone = node.clone()
                let tabNote = $('.tab-note')
                clone.find('#note_time').text('Agora')
                clone.find('#note_description').text(description)
                tabNote.append(clone)

                console.log(description);
            }

            $('#create_note').on('click', function(e) {
                
                var fd = new FormData();

                var other_data = $('#formNotes').serializeArray();
                var valid = this.form.checkValidity();
                $.each(other_data, function (key, input) {
                    fd.append(input.name, input.value);
                });
                $.ajax({
                    type: "POST",
                    url: '{{ route('student.createChapterNotes', [$slug, $current_chapter->course_id, $current_chapter->header_id, $current_chapter->id,'__time']) }}'.replace('__time', time),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == true) {
                            addNote(time, other_data[1].value)
                        }
                    },
                    error: function (result) {
                    }
                });
            })

            $('.ratting').on('click', function(e) {
                let value = $(this).val()
                $.ajax({
                    type: "POST",
                    url: '{{ route('student.chapterratting', [$current_chapter->id, '__value', $slug]) }}'.replace('__value', value),
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        if (response.status == "Success") {
                            alert('Sucesso '+value)
                        } else {
                            alert(response.status)
                        }
                    },
                    error: function (result) {
                    }
                });
            })

            function addRow(data, student) {
                let html = `
                <div class="p-0">
                    <div class="nk-reply-header">
                        <div class="user-card">
                            <div class="user-avatar sm bg-pink">
                                <span>ST</span>
                            </div>
                            <div class="user-name">
                                <span>${student.name}</span>
                            </div>
                        </div>
                        <div class="date-time">15 Jan, 2020</div>
                    </div>
                    <div class="nk-reply-body">
                        <div class="nk-reply-entry entry">
                            ${data.comment}
                        </div>
                    </div>
                </div> 
                `
                $('#nk-comments').append(html)
            }

            $(document).on('click', '#create_comment', function() {
                var fd = new FormData();

                var other_data = $('#formComments').serializeArray();
                var valid = this.form.checkValidity();
                $.each(other_data, function (key, input) {
                    fd.append(input.name, input.value);
                });

                if(valid) {
                    $.ajax({
                        url: '{{ route('chapters.createcomment', [$current_chapter->id, $student->id]) }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: fd,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        success: function (response) {
                            if (response.flag == "success") {
                                addRow(response.data, response.student)
                                $("#formComments")[0].reset()
                            } else {
                                alert(response.flag)
                            }
                        },
                        error: function (result) {
                        }
                    });
                }
            })
        });
    </script>

    <style>
        :root{
            --plyr-color-main: {{ $store_settings['cust_btn_color'] }};
        }
        .nk-header-fixed {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            min-width: 320px;
            background: #000;
        }
        .chapter-thumb {
            margin-right: 10px;
            height: 63px !important;
            display: inline-block;
            font-size: 1rem;
            height: 3rem;
            position: relative;
        }
        .chapter-thumb-img {
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            width: 100%;
            border-radius: 0.375rem!important;
        }
        .nk-header-wrap {
        position: relative;
        display: flex;
        align-items: center;
        display: none;
        margin: 0 -0.25rem;
        }
        .chapter-head {
            padding: 15px 0;
            margin-top: 19px !important;
        }
        .plyr .plyr__video-embed iframe, .plyr__tooltip {
            pointer-events: none;
        }
        /* .plyr__video-embed iframe .ytp-chrome-top.ytp-show-cards-title{
            display: none !important;
        } */
    </style>
@endpush

@section('content')
    <div class="rm__head">
        <div class="container-fluid">
            <div class="row align-center">
                <div class="col-lg-7 px-0">
                    <ul class="nav nav-tabs border-0">
                        <li class="rm__nav__item">
                            <a onclick="history.back()">
                                <em class="icon ni ni-back-ios rm__header__back"></em>
                                <span>Voltar</span>
                            </a>
                        </li>
                        <li class="rm__nav__item">
                            <a class="rm__nav__link active" data-bs-toggle="tab" href="#tabCourses">
                                <em class="icon ni ni-layer"></em>
                                <span class="rm__nav__span">O Curso</span>
                            </a>
                        </li>
                        <li class="rm__nav__item">
                            <a class="rm__nav__link" data-bs-toggle="tab" href="#tabChapters">
                                <em class="icon ni ni-folders"></em>
                                <span class="rm__nav__span">Grade de aulas</span>
                            </a>
                        </li>
                        <li class="rm__nav__item">
                            <a class="rm__nav__link" data-bs-toggle="tab" href="#">
                                <em class="icon ni ni-template"></em>
                                <span class="rm__nav__span">Certificado</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="rm__progress">
                        <div class="d-flex align-center">
                            <span style="margin-right: 4px; display: inline-block">{{ __('Progress') }} </span>
                            <span> - {{ $chapters_activity->count() }} de {{ $chapters_count }} aulas</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped" data-progress="10" style="width: 10%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="tab-content">
        <div class="tab-pane active" id="tabCourses">
            <div class="container-fluid">
                <div class="chapter-head">
                    <div class="nk-block nk-content-fluid">
                        <div class="chapter-head-content">
                            <div class="chapter-title chapter-head-block">
                                <h3> <b>{{ $current_chapter->name }}</b></h3>
                            </div>
                            <div class="chapter-head-block pagination">
                                <div class="col-md-12 d-flex">
                                    <div data-bs-toggle="modal" data-bs-target="#modalDefault"  style=" margin-right: 10px;">
                                        <ul class="rating mt-1">
                                            <li><em class="icon ni ni-star"></em></li>
                                            <li><em class="icon ni ni-star"></em></li>
                                            <li><em class="icon ni ni-star"></em></li>
                                            <li><em class="icon ni ni-star"></em></li>
                                            <li><em class="icon ni ni-star"></em></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-content">
                    <div class="row g-gs">
                        <div class="col-md-8">
                            @if ($current_chapter->type == 'text_content' && $pass['continue'] == false)
                                @foreach ($files as $file)
                                <div class="project">
                                    <div class="project-head">
                                        <a href="{{ asset(Storage::url('uploads/chapter/files/' . $file->chapter_files)) }}"  target="_blank" download class="project-title">
                                        <div class="user-avatar sq bg-purple">
                                            <em class="icon ni ni-download"></em>
                                        </div>
                                        <div class="project-info">
                                            <h6 class="title">{{ $file->chapter_files }}</h6>
                                            <span class="sub-text">Clique aqui para baixar</span>
                                        </div>
                                        </a>
                                        <div class="drodown">
                                            <div class="sp-pdl-btn"><a href="{{ asset(Storage::url('uploads/chapter/files/' . $file->chapter_files)) }}" target="_blank" download class="btn btn-primary">Download</a></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @foreach ($links as $link)
                                    <div class="project-head">
                                        <a href="{{ $link->chapter_link }}" class="project-title" target="_blank">
                                            <div class="user-avatar sq bg-purple">
                                                <em class="icon ni ni-link-alt"></em>
                                            </div>
                                            <div class="project-info">
                                                <h6 class="title">{{ $link->chapter_label }}</h6>
                                                <span class="sub-text">Clique aqui para acessar</span>
                                            </div>
                                        </a>
                                        <div class="drodown">
                                            <div class="sp-pdl-btn"><a href="{{ $link->chapter_link }}" class="btn btn-primary" target="_blank">Acessar</a></div>
                                        </div>
                                    </div>
                                @endforeach
                                @if(!empty($current_chapter->chapter_description))
                                    <hr>
                                    <h6 class="title mt-4 mb-4"><em class="icon ni ni-row-view1"></em> Descrição</h6>
                                    <span class="text">{!! html_entity_decode($current_chapter->chapter_description) !!}</span>
                                @endif
                            @endif
                            @if ($current_chapter->type !== 'text_content')
                                @if($pass['continue'] == 0)
                                    <div id="video_element">
                                        <div id="player" data-plyr-provider="{{ $current_chapter->type }}" data-plyr-embed-id="{{ $current_chapter->video_url }}"></div>
                                    </div>
                                    <canvas id="canvas" style="display:none;" width="640" height="360"></canvas>
                                    <div class="row mt-2">
                                        <div class="col-3 d-flex mt-4">
                                            <a style="cursor:pointer;" onClick="activity_like('like')" class="" style=" margin-right: 10px; "><h6><em class="icon ni ni-thumbs-up"></em></h6></a>
                                            <a style="cursor:pointer;position:relative;left:12px;" onClick="activity_like('dislike')" class="" style=" margin-right: 10px; "><h6><em class="icon ni ni-thumbs-down"></em></h6></a>
                                        </div>
                                        <div class="d-flex col-9 justify-end mt-2">
                                            <a data-bs-toggle="modal" data-bs-target="#modalNote" class="btn btn-outline-primary" style=" margin-right: 10px; "> Nova Anotação</a>
                                            <a href="#" onClick="chapter_bookmark()" class="btn {{ (!empty($bookmarks) ? 'btn-success' : 'btn-outline-primary') }}" id="bookmark_check" style=" margin-right: 10px; ">
                                                <em class="icon ni ni-bookmark me-1"></em>
                                                <spa class="d-none d-sm-block" id="bookmark_check_text">{{ (!empty($bookmarks) ? 'Aula Salva' : 'Salvar Aula') }}</span>
                                            </a>
                                            @if($pass['continue'] == false)
                                                <div>
                                                    <button class="btn btn-primary {{ (!empty($chapter_status_student) ? 'btn-success' : '') }}" id="check">
                                                        <em class="icon ni ni-chevron-down-round"></em> 
                                                        <span class="d-none d-sm-block" id="check_text">{{ (!empty($chapter_status_student) ? 'Aula concluída' : 'Marcar como concluída') }}</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <img width="100%" heigth="auto" src="{{ asset(Storage::url('uploads/chapter/thumbnail/' . $current_chapter->thumbnail)) }}" alt="">
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="card card-bordered" style="max-height: 580px; overflow: auto; ">
                                <div class="accordion" id="accordion">
                                    @foreach ($headers as $header)
                                        <div class="accordion-item">
                                            <a href="#" class="accordion-head" data-bs-toggle="collapse" data-bs-target="#accordion-{{$header->id}}">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="title">{{ $header->title }}</h6>
                                                        
                                                        <span>{{ $header->chapters_data->count() }} aulas</span>
                                                    </div>
                                                    <span class="{{ ($chapters_activity->where('header_id', $header->id)->count() == $header->chapters_data->count()) ? 'fas' : 'far' }} far fa-check-circle mt-2 fs-16px"></span>
                                                </div>
                                            </a>
                                            @if ($header->chapters_data->count() > 0)
                                            <div class="accordion-body collapse {{ ($header->id == $current_header->id) ? 'show' : '' }}" id="accordion-{{ $header->id }}" data-bs-parent="#accordion">
                                                @foreach ($header->chapters_data()->orderBy('position', 'ASC')->get() as $chapter)
                                                    <div class="accordion-inner">
                                                        <a class="d-flex" href="{{ ($pass['continue'] == false) ? route('store.fullscreen',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($courses->id),\Illuminate\Support\Facades\Crypt::encrypt($header->id),\Illuminate\Support\Facades\Crypt::encrypt($chapter->id)]) : '' }}">
                                                            @if (!empty($chapter->thumbnail))
                                                                <div class="media align-items-center">
                                                                    <div class="chapter-thumb w-30">
                                                                        <img alt="Image placeholder" src="{{ asset(Storage::url('uploads/chapter/thumbnail/' . $chapter->thumbnail)) }}" class="course-thumb-img" style="width: 80px;">
                                                                    </div>
                                                                </div>
                                                                <div class="w-100">
                                                                    <p class="w-100">{{ $chapter->name }}</p>
                                                                    @if($pass['continue'] == 1)
                                                                        <p>A aula será liberada em {{ $pass['date'] }}</p>
                                                                    @else
                                                                        <p class="fs-14px">{{ Utility::excerpt($chapter->chapter_description) }}</p>
                                                                    @endif
                                                                </div>
                                                            @else
                                                                <div class="w-100 d-flex justify-between">
                                                                    <div class="w-100">
                                                                        <p class="mb-0">{{ $chapter->name }}</p>
                                                                        <p class="fs-14px">{{ Utility::excerpt($chapter->chapter_description) }}</p>
                                                                        @if($pass['continue'] == 1)
                                                                            <p>A aula será liberada em {{ $pass['date'] }}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if($pass['continue'] !== 1)
                                                                <span class="{{ ($chapters_activity->contains('chapter_id', $chapter->id)) ? 'fas text-success' : 'far' }} fa-check-circle fs-16px" style="margin-top:4px;"></span>
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-gs">
                        @if ($current_chapter->type !== 'text_content' && $pass['continue'] == false)
                            <div class="col-lg-8">
                                <div class="mt-5">
                                    <div class="card-inner">
                                        <ul class="nav nav-tabs mt-n3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5" aria-selected="true" role="tab">
                                                <em class="icon ni ni-list-round"></em>
                                                <span>Descrição</span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tabItem7" aria-selected="false" role="tab" tabindex="-1">
                                                <em class="icon ni ni-download"></em>
                                                <span>Material Complementar</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tabItem8" aria-selected="false" role="tab" tabindex="-1">
                                                <em class="icon ni ni-file-plus"></em>
                                                <span>Anotações</span>
                                            </a>
                                        </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="tabItem5" role="tabpanel">
                                                @if(!empty($current_chapter->chapter_description))
                                                    <span">{!! html_entity_decode($current_chapter->chapter_description) !!}</span>
                                                @endif
                                            </div>
                                            
                                            <div class="tab-pane" id="tabItem7" role="tabpanel">
                                                @if(!empty($files) && count($files) > 0)
                                                    @foreach ($files as $file)
                                                        <div class="project">
                                                            <div class="project-head">
                                                                <a href="{{ asset(Storage::url('uploads/chapter/files/' . $file->chapter_files)) }}"  target="_blank" class="project-title">
                                                                <div class="user-avatar sq bg-purple">
                                                                    <em class="icon ni ni-download"></em>
                                                                </div>
                                                                <div class="project-info">
                                                                    <h6 class="title">{{ $file->chapter_files }}</h6>
                                                                    <span class="sub-text">Clique aqui para baixar</span>
                                                                </div>
                                                                </a>
                                                                <div class="drodown">
                                                                    <div class="sp-pdl-btn"><a href="{{ asset(Storage::url('uploads/chapter/files/' . $file->chapter_files)) }}" target="_blank" class="btn btn-primary">Download</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                @foreach ($links as $link)
                                                    <div class="project-head">
                                                        <a href="{{ $link->chapter_link }}" class="project-title">
                                                        <div class="user-avatar sq bg-purple">
                                                            <em class="icon ni ni-link-alt"></em>
                                                        </div>
                                                        <div class="project-info">
                                                            <h6 class="title">{{ $link->chapter_label }}</h6>
                                                            <span class="sub-text">Clique aqui para acessar</span>
                                                        </div>
                                                        </a>
                                                        <div class="drodown">
                                                            <div class="sp-pdl-btn"><a href="{{ $link->chapter_link }}" class="btn btn-primary" target="_blank">Acessar</a></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="tab-pane tab-note" id="tabItem8" role="tabpanel">
                                                @if(!empty($notes) && count($notes) > 0)
                                                    @foreach($notes as $note)
                                                        <div class="p-4" id="note">
                                                            <div class="nk-reply-header">
                                                                <div class="date-time" id="note_time">{{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i') }}</div>
                                                            </div>
                                                            <div class="nk-reply-body">
                                                                <div class="nk-reply-entry entry" id="note_description">
                                                                    {{ $note->description }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>Você ainda não tem nenhuma nota criada</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        @endif
                    </div>
                    @component('storefront.components.fullscreen.comments')
                        @slot('enable', $courses->comments)
                        @slot('comments', $comments)
                        @slot('student_id', $student->id)
                    @endcomponent
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tabChapters">
            <div class="container-fluid">
                <div class="chapter-head">
                    <div class="nk-block nk-content-fluid">
                        <div class="chapter-head-content">
                            <div class="chapter-title chapter-head-block">
                                <h3> <b>Aulas</b></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-content">
                    <div class="row g-gs">
                        <div class="col-sm-12">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="row">
                                        @foreach ($headers as $header)
                                            <div class="header__title mb-2">
                                                <p>{{ $header->title }}</p>
                                            </div>

                                            @foreach($header->chapters_data()->orderBy('position', 'ASC')->get() as $chapter_grid)
                                                <div class="card card-bordered mb-3">
                                                    <a href="{{ ($pass['continue'] == false) ? route('store.fullscreen',[$slug,\Illuminate\Support\Facades\Crypt::encrypt($courses->id),\Illuminate\Support\Facades\Crypt::encrypt($header->id),\Illuminate\Support\Facades\Crypt::encrypt($chapter_grid->id)]) : '' }}" class="row align-center">
                                                        <div class="nk-tb-list">
                                                            <div class="nk-tb-col col-sm-10 col-lg-8 p-0">
                                                                <div class="d-flex justify-between align-center">
                                                                    <div class="d-flex align-center">
                                                                        <div class="thumb" style="min-width:64px;">
                                                                            <img class="rounded" src="{{ asset(Storage::url('uploads/chapter/thumbnail/' . $chapter_grid->thumbnail)) }}" width="64px" height="auto">
                                                                        </div>
                                                                        <div class="title ms-2">
                                                                            <p>{{ $loop->iteration }} - {{ $chapter_grid->name }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                @if(Utility::getActivityChapterStatus($student->id, $chapter_grid->course_id))
                                                                    <span class="badge badge-dot badge-dot-xs bg-success">Completo</span>
                                                                @else
                                                                    <span class="badge badge-dot badge-dot-xs bg-primary">Não iniciado</span>
                                                                @endif
                                                            </div>
                                                            <div class="nk-tb-col">
                                                                <div class="d-flex justify-end align-center">
                                                                    <em class="icon ni ni-play-circle fs-20px text-primary"></em>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" id="modalDefault">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="row g-gs card-inner">
                    <div class="col-md-12">
                        <div class="nk-block-head col-lg-6">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Avaliações</h5>
                                <span>Deixe sua avaliação sobre esta aula</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="rating" class="form-label">Nota:</label>
                        <fieldset class="rating__star">
                            <input type="radio" name="ratting" value="9" class="ratting" />
                            <input type="radio" name="ratting" value="8" class="ratting" />
                            <input type="radio" name="ratting" value="7" class="ratting" />
                            <input type="radio" name="ratting" value="6" class="ratting" />
                            <input type="radio" name="ratting" value="5" class="ratting" />
                            <input type="radio" name="ratting" value="4" class="ratting" />
                            <input type="radio" name="ratting" value="3" class="ratting" />
                            <input type="radio" name="ratting" value="2" class="ratting" />
                            <input type="radio" name="ratting" value="1" class="ratting" />
                            <input type="radio" name="ratting" value="0" class="ratting" />
                        </fieldset>
                    </div>
                    {{Form::open(array('method'=>'post','id'=>'formComments','enctype'=>'multipart/form-data'))}}
                        <div class="col-md-12">
                            <textarea class="form-control no-resize" name="comment" placeholder="Comentário" style="padding: 12px;"></textarea>
                        </div>
                        <div class="col-md-12">
                            <input class="btn btn-primary mt-4" data-bs-dismiss="modal" type="button" id="create_comment" value="Enviar" />
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modalNote">
        <div class="modal-dialog" role="document">
            {{ Form::open(array('route' => array('student.createChapterNotes', [$slug, $current_chapter->course_id, $current_chapter->header_id, $current_chapter->id]),'method' =>'post','id'=>'formNotes','enctype'=>'multipart/form-data')) }}
                <div class="modal-content">
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="row g-gs card-inner">
                        <div class="col-md-12">
                            <div class="nk-block-head col-lg-6">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">Anotações</h5>
                                    <span>Faça uma anotação sobre esta aula</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Conteúdo:</label>
                            <textarea class="form-control no-resize" name="description" placeholder="Deixe um comentário" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <input type="buttom" data-bs-dismiss="modal" class="btn btn-sm btn-primary rounded-pill mr-auto" id="create_note" value="Enviar anotação" />
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
