@extends('layouts.admin')
@section('page-title')
    {{__('Domain')}}
@endsection
@section('title')
    {{__('Domain')}}
@endsection
 @section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{__('Domain')}}</li>
@endsection 
@section('content')
      <div class="nk-content-body">
        <div class="nk-block-head">
          <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">Dominio</h3>
              <div class="nk-block-des text-soft">
                <p>Adicione o dominio para usar na sua área de membros</p>
              </div>
            </div>
            <div class="nk-block-head-content">
              <ul class="nk-block-tools g-3">
                <li>
                      <button type="button" id="btn__add__domain" class="btn btn-primary {{ (!empty($domains) && count($domains) > 0) ? 'disabled' : '' }}" data-bs-toggle="modal" data-bs-target="#modalDefault"><em class="icon ni ni-plus"></em><span> Add Dominio</span></button>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="nk-block">
          <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
              <div class="card-inner">
                <div class="card-title-group">
                  <div class="card-title">
                    <h5 class="title">Meus Dominios</h5>
                  </div>
                </div>
              </div>
              <div class="card-inner p-0">
                <table class="table table-orders">
                  <thead class="tb-odr-head">
                    <tr class="tb-odr-item">
                      <th class="tb-odr-amount w-70">
                        <span class="tb-odr-total">Dominio</span>
                        <span class="tb-odr-status d-none d-md-inline-block">Status</span>
                      </th>
                      <th class="tb-odr-action">
                        <span>Action</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="tb-odr-body" data-id="tb__domain">
                    @if(!empty($store->domains))
                      <tr class="tb-odr-item">
                          <td class="tb-odr-amount">
                            <span class="tb-odr-total">
                              <span class="amount">{{ $store->domains }}</span>
                            </span>
                            <span class="tb-odr-status">
                              <span class="badge badge-dot bg-success">Verificado</span>
                            </span>
                          </td>
                          <td class="tb-odr-action">
                          {!! Form::open(['method' => 'GET', 'route' => ['domain.destroy', $store->id]]) !!}
                                <a href="#!" class="show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}">
                                    <em class="icon ni ni-trash"></em>
                                </a>
                            {!! Form::close() !!}
                          </td>
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <div class="card-inner">
                
              </div>
            </div>
          </div>
        </div>
      </div>
  

<div class="modal fade frm_add_domain" tabindex="-1" id="modalDefault">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form data-id="form__domain">
        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
          <em class="icon ni ni-cross"></em>
        </a>
        <div class="modal-header">
          <h5 class="modal-title">Adicionar domínio</h5>
        </div>
        <div class="modal-body">
              <div class="example-alert mt-2">
                  <div class="alert alert-light">1. Informe o domínio ou sub-dominio que você quer utilizar na sua Área de membros</div>
              </div>
              <div class="col-12 mt-2">
                  <div class="form-group d-flex">
                      <input class="form-control me-1 inp_domain" id="domain" placeholder="meudominio.com" required /> 
                  </div>
              </div>
              <div class="example-alert mt-2">
                  <div class="alert alert-light">2. Visite o painel de configurações de DNS do seu domínio </div>
              </div>
              <div class="example-alert mt-2">
                  <div class="alert alert-light">3. Crie um registro CNAME com o nome do domonio informado no campo acima, apontando para o valor rocketmember.app</div>
              </div>
              <div class="example-alert mt-2">
                  <div class="alert alert-light">4. Salve o DNS</div>
              </div>
              <div class="example-alert mt-2">
                  <div class="alert alert-light">5. Em caso de dúvida veja nosso tutorial <a href="#" class="alert-link">click aqui</a></div>
              </div>
        </div>
        <div class="modal-footer bg-light">
          <button type="button" click="cancel" data-bs-dismiss="modal" class="btn btn-primary"> Cancelar </button>
          <button type="submit" data-id="btn__add__domain" data-bs-dismiss="modal" class="btn btn-primary"> Adicionar </button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection