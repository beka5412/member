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
</div>
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
                        <span class="tb-lead"><a href="{{route('users.edit',\Illuminate\Support\Facades\Crypt::encrypt($student->id))}}">{{$student->name}}</a><span class="dot dot-success d-md-none ms-1"></span></span>
                        <span>{{$student->email}}</span>
                    </div>
                </div>
            </div>
            <div class="nk-tb-col tb-col-md">
                <span>{{$student->phone_number}}</span>
            </div>
            <div class="nk-tb-col tb-col-lg">
                <span>{{$student->created_at}}</span>
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
                <span class="tb-status {{$student->status == 'on' ? 'text-success ' : 'text-danger '}}">{{$student->status == 'on' ? 'ATIVO' : 'INATIVO'}}</span>
            </div>
            <div class="nk-tb-col tb-col-md">
                <span class="tb-status {{ Utility::payment_status($student->id) == 'Aprovado' ? 'text-success ' : 'text-danger '}}">{{ Utility::payment_status($student->id) }}</span>
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