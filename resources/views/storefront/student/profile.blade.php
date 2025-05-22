@extends('storefront.user.user')
@section('page-title')
    {{__('Saved Chapters')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@section('head-title')
@endsection
@section('content')
@php
    $profile=asset(Storage::url('uploads/profile/'));
    //$default_avatar = asset(Storage::url('uploads/default_avatar/avatar.png'));
@endphp
<section class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div id="app" class="app">
                <div>
                    <content>
                        <div class="nk-content-body">
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-aside-wrap">
                                        <div class="tab-content card-inner card-inner-lg">
                                            <div class="tab-pane active" id="tabGeral">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="nk-block-title">Informações Pessoais</h4>
                                                        </div>
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside">
                                                            <em class="icon ni ni-menu-alt-r"></em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="nk-data data-list">
                                                        <div class="data-head">
                                                            <h6 class="overline-title">Básicas</h6>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                            <div class="data-col">
                                                                <span class="data-label">Nome</span>
                                                                <span class="data-value">{{ $student->name }}</span>
                                                            </div>
                                                            <div class="data-col data-col-end">
                                                                <span class="data-more">
                                                                    <em class="icon ni ni-forward-ios"></em>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">Email</span>
                                                            <span class="data-value">{{ $student->email }}</span>
                                                        </div>
                                                        <div class="data-col data-col-end">
                                                            <span class="data-more disable">
                                                                <em class="icon ni ni-lock-alt"></em>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">Telefone</span>
                                                            <span class="data-value text-soft">{{ $student->telephone }}</span>
                                                        </div>
                                                        <div class="data-col data-col-end">
                                                            <span class="data-more">
                                                                <em class="icon ni ni-forward-ios"></em>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">Aniversário</span>
                                                            <span class="data-value"></span>
                                                        </div>
                                                        <div class="data-col data-col-end">
                                                            <span class="data-more">
                                                                <em class="icon ni ni-forward-ios"></em>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit" data-tab-target="#address">
                                                        <div class="data-col">
                                                            <span class="data-label">Endereço</span>
                                                            <span class="data-value"> - <br> - </span>
                                                        </div>
                                                        <div class="data-col data-col-end">
                                                            <span class="data-more">
                                                                <em class="icon ni ni-forward-ios"></em>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-data data-list">
                                                    <div class="data-head">
                                                        <h6 class="overline-title">Preferencias</h6>
                                                    </div>
                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">Idioma</span>
                                                            <span class="data-value">Português (BR)</span>
                                                        </div>
                                                        <div class="data-col data-col-end">
                                                            <a href="#" class="link link-primary">Alterar Idioma</a>
                                                        </div>
                                                    </div>                            
                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">Fuso horário</span>
                                                            <span class="data-value">São Paulo (GMT -3)</span>
                                                        </div>
                                                        <div class="data-col data-col-end">
                                                            <a href="#" class="link link-primary">Alterar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tabSeguranca">
                                            {{Form::model($userDetail,array('route' => array('student.profile.update',$slug,$userDetail), 'method' => 'put', 'enctype' => "multipart/form-data"))}}
                                                <div class="moda-form-container">
                                                    <div class="form-container-title mb-4">
                                                        <h5> {{__('Main Information')}}</h5>
                                                    </div>
                                                    <div class="row g-gs">
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="name">{{__('Name')}}</label>
                                                                {{Form::text('name',null,array('class'=>'form-control font-style'))}}
                                                                @error('name')
                                                                    <span class="invalid-name" role="alert">
                                                                        <strong class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4  col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">{{__('Email')}}</label>
                                                                {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter User Email')))}}
                                                                @error('email')
                                                                    <span class="invalid-email" role="alert">
                                                                        <strong class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label">Imagem de Fundo</label>
                                                                <div class="form-file">
                                                                    <input type="file" class="form-file-input" name="profile">
                                                                    <label class="form-file-label" for="cust_background">Choose files</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="moda-form-container mt-4">
                                                    <div class="form-container-title mb-4">
                                                        <h5> {{__('Password Informations')}}</h5>
                                                    </div>
                                                    <div class="row g-gs">
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="current_password">{{__('Current Password')}}</label>
                                                                {{Form::password('current_password',array('class'=>'form-control','placeholder'=>__('Enter Current Password')))}}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="new_password">{{__('New Password')}}</label>
                                                                {{Form::password('new_password',array('class'=>'form-control','placeholder'=>__('Enter New Password')))}}
                                                                @error('new_password')
                                                                    <span class="invalid-new_password" role="alert">
                                                                        <strong class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="confirm_password">{{__('Re-type New Password')}}</label>
                                                                {{Form::password('confirm_password',array('class'=>'form-control','placeholder'=>__('Enter Re-type New Password')))}}
                                                                @error('confirm_password')
                                                                    <span class="invalid-confirm_password" role="alert">
                                                                        <strong class="text-danger">{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-footer mt-4">
                                                    <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                                                </div>
                                            {{Form::close()}}
                                        </div>
                                        <div class="tab-pane" id="tabNotificacoes">
                                            <p>Em Breve!</p>
                                        </div>
                                        <div class="tab-pane" id="tabConquistas">
                                            <p>Em Breve!</p>
                                        </div>
                                        <div class="tab-pane" id="tabCertificados">
                                            <p>Em Breve!</p>
                                        </div>
                                    </div>
                                    <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                        <div class="card-inner-group" data-simplebar="init">
                                            <div class="simplebar-wrapper" style="margin: 0px;">
                                                <div class="simplebar-height-auto-observer-wrapper">
                                                <div class="simplebar-height-auto-observer"></div>
                                                </div>
                                                <div class="simplebar-mask">
                                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <div class="card-inner">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary">
                                                            <span>AB</span>
                                                            </div>
                                                            <div class="user-info">
                                                            <span class="lead-text">{{ $student->name }}</span>
                                                            <span class="sub-text">{{ $student->email }}</span>
                                                            </div>
                                                            <div class="user-action">
                                                            <div class="dropdown">
                                                                <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#">
                                                                <em class="icon ni ni-more-v"></em>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                    <a href="#">
                                                                        <em class="icon ni ni-camera-fill"></em>
                                                                        <span>Change Photo</span>
                                                                    </a>
                                                                    </li>
                                                                    <li>
                                                                    <a href="#">
                                                                        <em class="icon ni ni-edit-fill"></em>
                                                                        <span>Update Profile</span>
                                                                    </a>
                                                                    </li>
                                                                </ul>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="card-inner p-0">
                                                        <ul class="nav link-list-menu border border-light round m-0">
                                                            <li class="nav-item">
                                                            <a data-bs-toggle="tab" href="#tabGeral" class="active">
                                                                <em class="icon ni ni-user-fill-c"></em>
                                                                <span>Perfil</span>
                                                            </a>
                                                            </li>
                                                            <li class="nav-item">
                                                            <a data-bs-toggle="tab" href="#tabSeguranca">
                                                                <em class="icon ni ni-lock-alt"></em>
                                                                <span>Senha</span>
                                                            </a>
                                                            </li>
                                                            <li class="nav-item">
                                                            <a data-bs-toggle="tab" href="#tabNotificacoes" class="">
                                                                <em class="icon ni ni-bell-fill"></em>
                                                                <span>Notificações</span>
                                                            </a>
                                                            </li>
                                                            <li class="nav-item">
                                                            <a data-bs-toggle="tab" href="#tabConquistas">
                                                            <em class="icon ni ni-coffee"></em>
                                                                <span>Conquistas</span>
                                                            </a>
                                                            </li>
                                                            <li class="nav-item">
                                                            <a data-bs-toggle="tab" href="#tabCertificados">
                                                            <em class="icon ni ni-view-panel"></em>
                                                                <span>Certificados</span>
                                                            </a>
                                                            </li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: auto; height: 550px;"></div>
                                            </div>
                                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                                <div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div>
                                            </div>
                                            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                                <div class="simplebar-scrollbar simplebar-visible" style="height: 0px; display: none;"></div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade frm_add_domain modal_add_domain" tabindex="-1" id="modalDefault">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                                </a>
                                <div class="modal-header">
                                <h5 class="modal-title">Adicionar domÃ­nio</h5>
                                </div>
                                <div class="modal-body">
                                <div class="example-alert mt-2">
                                    <div class="alert alert-light">1. Informe o domÃ­nio que vocÃª utiliza no Gerenciador de NegÃ³cios do Facebook.</div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-group d-flex">
                                    <input class="form-control me-1 inp_domain" keyup="domainKeyUp" placeholder="meudominio.com" value="">
                                    </div>
                                </div>
                                <small class="mt-1">O domÃ­nio precisa estar validado no gerenciador de negÃ³cios. Em caso de dÃºvidas verifique a nossa Central de Ajuda.</small>
                                <div class="example-alert mt-2">
                                    <div class="alert alert-light">2. Visite o painel de configuraÃ§Ãµes de DNS do seu domÃ­nio </div>
                                </div>
                                <div class="example-alert mt-2">
                                    <div class="alert alert-light">3. Crie um registro CNAME com o nome <span class="span_domain_output">checkout.seudominio.com</span> apontando o valor para rocketpays.app </div>
                                </div>
                                <div class="example-alert mt-2">
                                    <div class="alert alert-light">4. Salve o DNS</div>
                                </div>
                                <div class="example-alert mt-2">
                                    <div class="alert alert-light">5. Em caso de dÃºvida veja nosso tutorial <a href="#" class="alert-link">click aqui</a>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer bg-light">
                                <button type="button" click="cancel" class="btn btn-primary"> Cancelar </button>
                                <button type="button" click="addDomain" class="btn btn-primary"> Adicionar </button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </content>
                </div>
            </div>
        </div>
    </div>

</section>

           
<!-- User Proile Popup End -->

@endsection