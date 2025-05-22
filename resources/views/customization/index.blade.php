@extends('layouts.admin')
@section('page-title')
    {{__('Customization')}}
@endsection
@section('title')
    {{__('Customization')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{__('Customization')}}</li>
@endsection
@section('content')
@push('script-page')
<script src="{{ asset('js/iconpicker.js?ver=1.0.6') }}"></script>
<script>
    var input = document.querySelector('input')
    var footer = document.querySelector('footer')
    var confirm = false

    $(document).ready(function () {
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
    });

    let linkHidden = []

    input.addEventListener('change', function(){
        footer.style.setProperty('--footer-color', input.value)
    })

    function createLinkRow(val){
        let html = `
        <tr class="tb-tnx-item" id="link-item-${val.id}">
            <td><em class="icon ni ${val.type}"></em></td>
            <td>${val.label}</td>
            <td>${val.link}</td>
            <td>
                <a href="#!" onclick="deleteLink(${val.id})" class="show_confirm_link" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}"><em class="icon ni ni-trash"></em><span>Remover</span></a>
            </td>
        </tr>`

        $('#tb-links').append(html)

        $('#modal_label_link').val('')
        $('#modal_link').val('')
    }

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
        $('#frmBanner')[0].reset()
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
                url: "{{route('customization.createbanners')}}",
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
                        $('[data-toggle="banner"]').get(0).dropzone.removeAllFiles(true)
                        $('[data-toggle="mobile_banner"]').get(0).dropzone.removeAllFiles(true)
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
                    url: '{{ route('customization.destroybanners', ['_type', '_id']) }}'.replace('_id', id).replace('_type', type),
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

    function deleteLink(id) {
        console.log(id);
        var token = $("meta[name='csrf-token']").attr("content");

        setTimeout(() => {
            let btn = $('.btn-success')
            btn.on('click', function(){
                $.ajax({
                    url: '{{ route('customization.destroylinks', '_id') }}'.replace('_id', id),
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    contentType: false,
                    processData: false,
                    type: 'DELETE',
                    success: function (data) {
                        if (data.flag == "success") {
                            $("#link-item-"+id).remove()
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

    $(document).on('click', '#create_link_submit', function () {
        var fd = new FormData();

        var other_data = $('#formLink').serializeArray();
        var valid = this.form.checkValidity();
        $.each(other_data, function (key, input) {
            fd.append(input.name, input.value);
        });

        if (valid) {
            $.ajax({
                url: "{{route('customization.createlinks')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fd,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    if (data.flag == "success") {
                        createLinkRow(data.row)
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
<div class="row">
    <div class="col-sm-12">   
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">{{__('Customization')}}</h6>
                    </div>
                </div>
            </div>
            <div class="card-inner">
                {{ Form::model($settings, ['route' => 'customization.setting','method' => 'POST','enctype' => 'multipart/form-data', 'id' => 'frmTarget']) }}
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tabLogin">
                        <em class="icon ni ni-monitor"></em>
                        <span>Pagina de login</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tabArea">
                        <em class="icon ni ni-user-check"></em>
                        <span>Area de Membro</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tabBanner">
                        <em class="icon ni ni-text-rich"></em>
                        <span>Banner Topo</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tabMenu">
                        <em class="icon ni ni-panel"></em>
                        <span>Menu</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tabLayouts">
                        <em class="icon ni ni-layout"></em>
                        <span>Layouts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tabCertificado">
                        <em class="icon ni ni-text-rich"></em>
                        <span>Certificado</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tabMail">
                        <em class="icon ni ni-mail"></em>
                        <span>Email</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabLogin">
                        <div class="preview-block">
                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <label class="form-label">Logo Página de Login</label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input" name="cust_logo" id="cust_logo" onchange="document.getElementById('preview_logo').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="form-file-label" for="cust_logo">Choose files</label>
                                            <div class="preview mt-3">
                                                <img id="preview_logo" src="{{ asset(Storage::url('uploads/logo/'.$getStoreThemeSetting['cust_logo'])) }}" alt="logo" width="120" height="auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Imagem de Fundo</label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input" name="cust_background" id="cust_background" onchange="document.getElementById('preview_background').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="form-file-label" for="cust_background">Choose files</label>
                                            <div class="preview mt-3">
                                                <img id="preview_background" src="{{ asset(Storage::url('uploads/background/'.$getStoreThemeSetting['cust_background'])) }}" alt="logo" width="120" height="auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Cor do Botão</label>
                                    <div class="form-control-wrap" style=" width:60px;">
                                        <input class="form-control" type="color" name="cust_btn_color" value="{{ $getStoreThemeSetting['cust_btn_color'] }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Cor do texto</label>
                                    <div class="form-control-wrap" style=" width:60px;">
                                        <input class="form-control" type="color" name="cust_btn_text_color" value="{{ $getStoreThemeSetting['cust_btn_text_color'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabArea">
                        <div class="preview-block">
                            <span class="preview-title overline-title">Dark Mode</span>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="cust_darklayout" id="cust-darklayout" {{ $getStoreThemeSetting['cust_darklayout'] == 'on' ? 'checked="checked"' : '' }}>
                                <label class="custom-control-label" for="cust-darklayout">Sim</label>
                            </div>
                        </div>
                        <hr class="preview-hr">
                        <div class="preview-block mt-4">
                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <label class="form-label">Logo área de Membro</label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input" name="cust_logo_member_area" id="cust_logo_member_area" onchange="document.getElementById('preview_member_area').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="form-file-label" for="cust_logo_member_area">Choose files</label>
                                            <div class="preview mt-3">
                                                <img id="preview_member_area" src="{{ asset(Storage::url('uploads/member_area/'.$getStoreThemeSetting['cust_logo_member_area'])) }}" alt="Logo member area" width="120" height="auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Favicon área de Membro</label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input" name="cust_favicon" id="cust_favicon" onchange="document.getElementById('preview_favicon').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="form-file-label" for="cust_favicon">Choose files</label>
                                            <div class="preview mt-3">
                                                <img id="preview_favicon" src="{{ asset(Storage::url('uploads/favicon/'.$getStoreThemeSetting['cust_favicon'])) }}" alt="Favicon" width="120" height="auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="preview-hr">
                        <div class="row mt-4">
                            <div class="form-group col-md-6">
                                <label for="cust_title_text">Texto do Título</label>
                                {!! Form::text('cust_title_text',null,array('class'=>'form-control', 'placeholder' => 'Texto do Título'))!!}
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cust_footer_text">Texto do Rodapé</label>
                                {!! Form::text('cust_footer_text',null,array('class'=>'form-control', 'placeholder' => 'Texto do Rodapé'))!!}
                            </div>
                            <div class="form-group col-md-6">
                            <label for="site_date_format" class="form-control-label">Formato de Data</label>
                                <select type="text" name="cust_site_date_format" class="form-control selectric" id="site_date_format">
                                    <option value="M j, Y" @if($getStoreThemeSetting['cust_site_date_format'] == 'M j, Y') selected @endif>Jan 1,2015</option>
                                    <option value="d-m-Y" @if($getStoreThemeSetting['cust_site_date_format'] == 'd-m-Y') selected @endif>d-m-y</option>
                                    <option value="m-d-Y" @if($getStoreThemeSetting['cust_site_date_format'] == 'm-d-Y') selected @endif>m-d-y</option>
                                    <option value="Y-m-d" @if($getStoreThemeSetting['cust_site_date_format'] == 'Y-m-d') selected @endif>y-m-d</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="site_time_format" class="form-control-label">Formato do Tempo</label>
                                <select type="text" name="cust_site_time_format" class="form-control selectric" id="site_time_format">
                                    <option value="g:i A" @if($getStoreThemeSetting['cust_site_time_format'] == 'g:i A') selected @endif>10:30 PM</option>
                                    <option value="g:i a" @if($getStoreThemeSetting['cust_site_time_format'] == 'g:i a') selected @endif>10:30 pm</option>
                                    <option value="H:i" @if($getStoreThemeSetting['cust_site_time_format'] == 'H:i') selected @endif>22:30</option>
                                </select>
                            </div>
                        </div>
                        <hr class="preview-hr">
                        <div class="row g-gs">
                            <span>Rede Social</span>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <label for="cust_email" class="form-label">E-mail</label>
                                    {!! Form::text('cust_email',null,array('class'=>'form-control', 'placeholder' => 'owner@example.com'))!!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                    <label for="whatsapp" class="form-label">Whatsapp</label>
                                    {!! Form::text('cust_whatsapp',null,array('class'=>'form-control', 'placeholder' => 'https://wa.me/1XXXXXXXXXX'))!!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="fab fa-facebook-square" aria-hidden="true"></i>
                                    <label for="cust_facebook" class="form-label">Facebook</label>
                                    {!! Form::text('cust_facebook',null,array('class'=>'form-control', 'placeholder' => 'https://www.facebook.com/'))!!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="fab fa-instagram" aria-hidden="true"></i>
                                    <label for="instagram" class="form-label">Instagram</label>
                                    {!! Form::text('cust_instagram',null,array('class'=>'form-control', 'placeholder' => 'https://www.instagram.com/'))!!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                    <label for="twitter" class="form-label">Twitter</label>
                                    {!! Form::text('cust_twitter',null,array('class'=>'form-control', 'placeholder' => 'https://twitter.com/'))!!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="fab fa-youtube" aria-hidden="true"></i>
                                    <label for="youtube" class="form-label">Youtube</label>
                                    {!! Form::text('cust_youtube',null,array('class'=>'form-control', 'placeholder' => 'https://www.youtube.com/'))!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabBanner">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-bordered">
                                    <div class="card-inner nk-block-between">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                            <h6 class="title">Menus</h6>
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
                    <div class="tab-pane" id="tabMenu">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Listing -->
                                <div class="card card-bordered">
                                    <!-- Card header -->
                                    <div class="card-inner nk-block-between">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                            <h6 class="title">Menus</h6>
                                            </div>
                                        </div>
                                        <div class="nk-block-tools-opt">
                                            <a class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-target="#modalLink">
                                                <em class="icon ni ni-plus"></em><span class="pe-3">Add Menu</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Table -->
                                    <div class="card-inner p-0 border-top">
                                        <table class="table table-tranx">
                                            <thead class="tb-tnx-head">
                                                <tr>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Label</th>
                                                    <th scope="col">Link</th>
                                                    <th scope="col" class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb-links">
                                                @if (!empty($links) && count($links) > 0)
                                                    @foreach ($links as $link)
                                                        <tr class="tb-tnx-item" id="link-item-{{ $link->id }}">
                                                            <td><em class="icon ni {{ $link->type }}"></em></td>
                                                            <td>{{ $link->label }}</td>
                                                            <td>{{ $link->link }}</td>
                                                            <td>
                                                                <a href="#!" onclick="deleteLink({{ $link->id }})" class="show_confirm_link" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}"><em class="icon ni ni-trash"></em><span>Remover</span></a>
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
                    <div class="tab-pane" id="tabLayouts">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="preview-block mb-4">
                                    <span class="preview-title">Exibir cursos não comprados?</span>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="cust_hidden_not_purchased" id="cust_hidden_not_purchased" {{ $getStoreThemeSetting['cust_hidden_not_purchased'] != '' ? 'checked="checked"' : '' }}>
                                        <label class="custom-control-label" for="cust_hidden_not_purchased">Sim</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="preview-block">
                                    <span class="preview-title">Exibir nome do curso?</span>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="cust_hidden_course_name" id="cust_hidden_course_name" {{ $getStoreThemeSetting['cust_hidden_course_name'] != '' ? 'checked="checked"' : '' }}>
                                        <label class="custom-control-label" for="cust_hidden_course_name">Sim</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="course-content-2">
                                {{Form::label('cust_per_row',__('Quantidade de cursos por linha'),['class'=>'form-label'])}}
                                <div class="form-control-wrap ">
                                    <div class="form-control-select">
                                        <select class="form-control" name="cust_per_row" placeholder="{{__('Select Category')}}">
                                            <option value="5" {{ ($getStoreThemeSetting['cust_per_row'] === '5' ? 'selected' : '') }}>5</option>
                                            <option value="6" {{ ($getStoreThemeSetting['cust_per_row'] === '6' ? 'selected' : '') }}>6</option>
                                            <option value="7" {{ ($getStoreThemeSetting['cust_per_row'] === '7' ? 'selected' : '') }}>7</option>
                                            <option value="8" {{ ($getStoreThemeSetting['cust_per_row'] === '8' ? 'selected' : '') }}>8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nk-block-head mt-4">
                            <div class="nk-block-head-content">
                            <h4 class="title nk-block-title">Escolha um modelo</h4>
                            <p>Escolha como será separado os cursos</p>
                            </div>
                        </div>
                        <div class="row g-gs">
                            <div class="col-lg-4 col-xxl-3 col-sm-6">
                                <div class="card shadow-none">
                                    <img src="https://rocketmember.app//storage/uploads/thumbnail/modelo1.png" class="border border-light rounded" alt="">
                                    <div class="card-inner pt-3 p-0">
                                        <p class="card-text">Separado por categoria dos cursos</p>
                                        <div class="custom-control custom-checkbox custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input type" value="cust_theme1" name="cust_theme" {{ $getStoreThemeSetting['cust_theme'] == 'cust_theme1' ? 'checked="checked"' : '' }} id="type1">
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
                                        <p class="card-text">Sem Categorias</p>
                                        <div class="custom-control custom-checkbox custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input type" value="cust_theme2" name="cust_theme" @if ($getStoreThemeSetting['cust_theme'] == 'cust_theme2') checked @endif id="type2">
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
                                        <p class="card-text">Separar cursos comprados dos não comprados</p>
                                        <div class="custom-control custom-checkbox custom-control-pro no-control">
                                            <input type="radio" class="custom-control-input type" value="cust_theme3" name="cust_theme" @if ($getStoreThemeSetting['cust_theme'] == 'cust_theme3') checked @endif  id="type3">
                                            <label class="custom-control-label" for="type3">
                                                <span>{{ __('Active Theme') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabCertificado">
                        <p>contnet</p>
                    </div>
                    <div class="tab-pane" id="tabMail">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="col-sm-6">
                                    <label class="form-label">Logo do email</label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input" name="cust_logo_mail" id="cust_logo_mail" onchange="document.getElementById('preview_mail_area').src = window.URL.createObjectURL(this.files[0])">
                                            <label class="form-file-label" for="cust_logo_mail">Choose files</label>
                                            <div class="preview mt-3">
                                                <img id="preview_mail_area" src="{{ asset(Storage::url('uploads/mail_member_area/'.$store->mail_logo)) }}" alt="Logo mail area" width="120" height="auto" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-gs mt-3">
                    <div class="col-sm-12 d-flex justify-end">
                        {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
                {{ Form::close() }}
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
                                <h5 class="nk-block-title">{{ __('Links') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" data-id="container_link">
                        <div class="row row-g-gs">
                            <div class="form-group col-md-6">
                                <label class="form-label">Esclha um ícone</label>
                                <div class="icon-picker">
                                    <div class="icon-picker-input">
                                        <input type="text" name="modal_type_link" class="form-control" id="icon-picker">
                                        <div class="icon-picker-selected"></div>
                                    </div>
                                    <div id="icon-picker-modal">
                                        <div>
                                            <em class="icon ni ni-facebook-f" data-id="ni-facebook-f"></em>
                                            <em class="icon ni ni-instagram" data-id="ni-instagram"></em>
                                            <em class="icon ni ni-clip" data-id="ni-clip"></em>
                                            <em class="icon ni ni-mail" data-id="ni-mail"></em>
                                            <em class="icon ni ni-whatsapp" data-id="ni-whatsapp"></em>
                                            <em class="icon ni ni-telegram" data-id="ni-telegram"></em>
                                            <em class="icon ni ni-twitter" data-id="ni-twitter"></em>
                                            <em class="icon ni ni-pinterest" data-id="ni-pinterest"></em>
                                            <em class="icon ni ni-linkedin" data-id="ni-linkedin"></em>
                                            <em class="icon ni ni-snapchat" data-id="ni-snapchat"></em>
                                            <em class="icon ni ni-spotify" data-id="ni-spotify"></em>
                                            <em class="icon ni ni-youtube" data-id="ni-youtube"></em>
                                            <em class="icon ni ni-video" data-id="ni-video"></em>
                                            <em class="icon ni ni-vimeo" data-id="ni-vimeo"></em>
                                            <em class="icon ni ni-live" data-id="ni-live"></em>
                                            <em class="icon ni ni-android" data-id="ni-android"></em>
                                            <em class="icon ni ni-apple" data-id="ni-apple"></em>
                                            <em class="icon ni ni-globe" data-id="ni-globe"></em>
                                            <em class="icon ni ni-ticket" data-id="ni-ticket"></em>
                                            <em class="icon ni ni-policy" data-id="ni-policy"></em>
                                            <em class="icon ni ni-comments" data-id="ni-comments"></em>
                                            <em class="icon ni ni-b-edge" data-id="ni-b-edge"></em>
                                            <em class="icon ni ni-b-chrome" data-id="ni-b-chrome"></em>
                                            <em class="icon ni ni-b-firefox" data-id="ni-b-firefox"></em>
                                            <em class="icon ni ni-b-safari" data-id="ni-b-safari"></em>
                                            <em class="icon ni ni-hot" data-id="ni-hot"></em>
                                            <em class="icon ni ni-puzzle" data-id="ni-puzzle"></em>
                                            <em class="icon ni ni-sign-cc-alt2" data-id="ni-sign-cc-alt2"></em>
                                            <em class="icon ni ni-sign-btc-alt" data-id="ni-sign-btc-alt"></em>
                                            <em class="icon ni ni-sign-eth-alt" data-id="ni-sign-eth-alt"></em>
                                            <em class="icon ni ni-send-alt" data-id="ni-send-alt"></em>
                                            <em class="icon ni ni-download" data-id="ni-download"></em>
                                            <em class="icon ni ni-alert-c" data-id="ni-alert-c"></em>
                                            <em class="icon ni ni-alert" data-id="ni-alert"></em>
                                            <em class="icon ni ni-alert-circle" data-id="ni-alert-circle"></em>
                                            <em class="icon ni ni-report" data-id="ni-report"></em>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{Form::label('modal_label_link',__('Label'),['class'=>'form-label'])}}
                                {{Form::text('modal_label_link',null,array('class'=>'form-control', 'id' => 'modal_label_link'))}}
                            </div>
                            <div class="col-md-12">
                                {{Form::label('modal_link',__('URL'),['class'=>'form-label'])}}
                                {{Form::text('modal_link',null,array('class'=>'form-control', 'id' => 'modal_link'))}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="button" data-bs-dismiss="modal" class="btn btn-sm btn-primary rounded-pill mr-auto" id="create_link_submit" value="{{ __('Add Link') }}" />
                    </div>
                </div>
            </form>
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
                                            <input class="form-control font-style"  name="modal_banner_title" type="text" value="" id="modal_title_banner">
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
                                                    <label for="thumbnail" class="form-label">Imagem do banner</label>
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