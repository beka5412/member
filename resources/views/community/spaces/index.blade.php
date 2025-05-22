@extends('layouts.admin')
@section('page-title')
    {{__('Community Spaces')}}
@endsection
@section('title')
    {{__('Community Spaces')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{__('Community')}}</li>
    <li class="breadcrumb-item">{{__('Spaces')}}</li>
@endsection
@section('action-btn')
    <div class="nk-block-tools-opt">
        <a href="#" data-url="{{route('community.space.create')}}" class="btn btn-icon btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Create Spaces')}}" data-ajax-popup="true" data-size="lg" data-title="{{__('Create Spaces')}}">
            <em class="icon ni ni-plus"></em>
        </a>
    </div>
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12">   
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">{{__('Spaces')}}</h6>
                    </div>
                </div>
            </div>
            <div class="card-inner p-0 border-top">
                <table class="table table-tranx">
                    <thead class="tb-tnx-head">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">{{ __('Name')}}</th>
                            <th scope="col">{{ __('Created at')}}</th>
                            <th scope="col" class="text-center"></th>
                        </tr>
                    </thead>
                    @if(count($spaces) > 0 && !empty($spaces))
                        <tbody id="dragContainer" class="dragula-container">
                            @foreach ($spaces as $space)
                                <tr class="tb-tnx-item category_item" style="cursor:move;">
                                    <td>
                                        <em class="icon ni ni-move"></em>
                                    </td>
                                    <td>{{ $space->title }}</td>
                                    <td>{{ Utility::dateFormat($space->created_at)}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
@endsection