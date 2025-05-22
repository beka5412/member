@extends('layouts.admin')
@section('page-title')
    {{ $integrationPlatforms->name }}
@endsection
@section('title')
    {{ $integrationPlatforms->name }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ $integrationPlatforms->slug }}</li>
@endsection
@section('action-btn')
    <div class="nk-block-tools g-3">
        <li>
            <a href="{{route('integrations.create', $integrationPlatforms->id)}}" class="btn btn-icon btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Create Integration')}}"><em class="icon ni ni-plus"></em></a>
        </li>
    </div>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">   
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="row">
                    <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                        <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </th>
                                <th class="nk-tb-col">
                                    <span class="sub-text">{{ __('Integration Name') }}</span>
                                </th>
                                <th class="nk-tb-col">
                                    <span class="sub-text"></span>
                                </th>
                            </tr>
                        </thead>
                        @if(!empty($integrations) && count($integrations) > 0)
                            <tbody>
                                @foreach($integrations as $integration)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid1">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </td>
                                        <td class="nk-tb-col">
                                            <a href="/integrations/{{ $integrationPlatforms->slug }}/{{ $integration->id }}/edit">
                                                {{ $integration->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li><a href="/integrations/{{ $integrationPlatforms->slug }}/{{ $integration->id }}/edit">Edit</a></li>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['integrations.destroy', $integration->id]]) !!}
                                                            <a href="#!" class="show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}">Remove</a>
                                                        {!! Form::close() !!}
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr><!-- .nk-tb-item  -->
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr class="tb-tnx-item">
                                    <td colspan="7">
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
        </div>
    </div>
</div>
@endsection