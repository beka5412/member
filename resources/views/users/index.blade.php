@extends('layouts.admin')
@section('page-title')
    {{__('Users')}}
@endsection
@section('title')
    {{__('Users')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{__('Users')}}</li>
@endsection
@section('action-btn')
    <div class="nk-block-tools g-3">
        <li>
            <a href="#" class="btn btn-white btn-outline-light" data-bs-toggle="modal" data-bs-target="#modalFile">
                <em class="icon ni ni-download-cloud"></em><span>{{ __('Import') }}</span>
            </a>
        </li>
        <li>
            <a href="{{route('users.export')}}" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>{{ __('Export') }}</span></a>
        </li>
        <li>
            <a href="{{route('users.create')}}" class="btn btn-icon btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Create User')}}"><em class="icon ni ni-plus"></em></a>
        </li>
    </div>
@endsection
@section('filter')
@endsection
@push('script-page')
    <script>
        $(document).ready(function(){
            $(document).on('keyup', function(e){
                let search_string = $('#search').val();
                console.log(search_string);
                $.ajax({
                    url: "{{route('users.search')}}",
                    type: 'GET',
                    data: {
                        search_query: search_string
                    },
                    success: function(res){
                        $('.table-data').html(res);
                    }
                })
            })
        });
    </script>
@endpush
@section('content')
<div class="row">
    <div class="col-sm-12">   
        <div class="card card-bordered">
            <!-- Table -->
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">{{__('Users')}}</h6>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                                <div class="card-tools">
                                    <div class="form-inline flex-nowrap gx-3">
                                        <div class="form-control-wrap ">
                                            <div class="form-control-select">
                                                <select class="form-control" name="bulk-action" data-id="bulk-action">
                                                    <option value="">Bulk Action</option>
                                                    <option value="suspend">Suspend User</option>
                                                    <option value="delete">Delete User</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="btn-wrap">
                                            <span class="d-none d-md-block">
                                                <button disabled class="btn btn-dim btn-outline-light" data-id="bulk-action-btn">Apply</button>
                                            </span>
                                        </div>
                                    </div><!-- .form-inline -->
                                </div><!-- .card-tools -->
                                <div class="card-tools me-n1">
                                    <ul class="btn-toolbar gx-1">
                                        <li>
                                            <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                        </li><!-- li -->
                                        
                                    </ul><!-- .btn-toolbar -->
                                </div><!-- .card-tools -->
                            </div><!-- .card-title-group -->
                            <div class="card-search search-wrap" data-search="search">
                                <div class="card-body">
                                    <div class="search-content">
                                        <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                        <input type="text" id="search" class="form-control border-transparent form-focus-none" placeholder="Buscar por name">
                                        <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                    </div>
                                </div>
                            </div><!-- .card-search -->
                        </div><!-- .card-inner -->
                        <div class="card-inner p-0">
                            <div class="nk-tb-list nk-tb-ulist table-data">
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" data-id="checkbox" id="uid">
                                            <label class="custom-control-label" for="uid"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        <span class="sub-text">Usuário</span>
                                    </div>
                                    <div class="nk-tb-col"><span class="sub-text">Telefone</span></div>
                                    <div class="nk-tb-col tb-col-lg"><span class="sub-text">Criado em</span></div>
                                    <div class="nk-tb-col tb-col-lg"><span class="sub-text">Último Login</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text">Status de pagamento</span></div>
                                    <div class="nk-tb-col tb-col-md"><span class="sub-text"></span></div>
                                </div><!-- .nk-tb-item -->
                                @if(!empty($students) && count($students) > 0)
                                    @foreach($students as $student)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input checkbox" value="{{ $student->id }}" id="user_id_{{ $student->id }}">
                                                    <label class="custom-control-label" for="user_id_{{ $student->id }}"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead"><a href="{{route('users.edit',\Illuminate\Support\Facades\Crypt::encrypt($student->id))}}">{{ $student->name }}</a><span class="dot dot-success d-md-none ms-1"></span></span>
                                                        <span>{{ $student->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{{ $student->phone_number }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{{ $student->created_at }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg">
                                                <span>
                                                    @php
                                                        $data = Utility::last_student_login($student->id) ? true : false
                                                    @endphp
                                                    @if($data)
                                                        {{ Utility::last_student_login($student->id)->created_at }}
                                                    @else
                                                        <span>N/D</span>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-status {{$student->status == 'on' ? 'text-success ' : 'text-danger '}}">{{ $student->status == 'on' ? 'ATIVO' : 'INATIVO' }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-status">{{ Utility::payment_status($student->id) }}</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{route('users.edit',\Illuminate\Support\Facades\Crypt::encrypt($student->id))}}"><em class="icon ni ni-edit"></em><span>Editar</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Atividades</span></a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Resetar senha</span></a></li>
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $student->id]]) !!}
                                                                        <a href="#!" class="show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}"><em class="icon ni ni-na"></em><span>Remover</span></a></a>
                                                                    {!! Form::close() !!}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <tbody>
                                        <tr class="tb-tnx-item">
                                            <td colspan="7">
                                                <div class="text-center">
                                                    <i class="fas fa-folder-open text-primary" style="font-size: 48px;"></i>
                                                    <h2>{{__('Opps')}}...</h2>
                                                    <h6>{{__('No data Found')}}. </h6>
                                                    <h6>{{__('Please Upload Practices Files')}}. </h6>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif
                            </div>
                        </div>
                        {{ $students->links('partials.admin.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalFile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                {{ Form::open(array('route' => 'users.storeImport','method' =>'post','enctype'=>'multipart/form-data')) }}
                    <div class="row g-gs card-inner">
                        <div class="col-md-12" data-id="container_link">
                            <div class="mt-2">
                                <label for="thumbnail" class="form-label">{{ __('Upload file') }}</label>
                                <p>Envie seu arquivo no forma .CSV</p>
                                <p>
                                    <a href="{{ asset('/images/import/import_users.csv') }}">Baixar modelo</a>
                                </p>
                                <input type="file" class="form-control mb-2" name="file" id="file" required>
                            </div>
                        </div>
                        <div class="form-group col-dm-12">
                            {{Form::label('access__duration',__('Selecione o período'),['class'=>'form-label'])}}
                            <div class="form-control-wrap">
                                <div class="form-control-select">
                                    <select class="form-control" name="access__duration" placeholder="{{__('Select Category')}}">
                                        <option value="15">15 dias</option>
                                        <option value="30">1 mês</option>
                                        <option value="60">2 meses</option>
                                        <option value="90">3 meses</option>
                                        <option value="180">6 meses</option>
                                        <option value="365">1 ano</option>
                                        <option value="lifetime">Vitalício</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="custom-switch">
                                    <input type="checkbox" name="enable_all_courses" class="custom-control-input" id="active">
                                    <label class="custom-control-label" for="active">{{ __('Liberar curso') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" data-bs-dismiss="modal" class="btn btn-sm btn-primary rounded-pill mr-auto" data-id="input__submit" id="create_file_submit">{{ __('Send') }}</button>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection