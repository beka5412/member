@extends('layouts.admin')
@section('page-title')
    {{__('Subcategory')}}
@endsection
@section('title')
   {{__('Subcategory')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Subcategory') }}</li>
@endsection
@section('action-btn')
    <div class="nk-block-tools-opt">
        <button class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-placement="top" data-ajax-popup="true" title="{{__('Add Subcategory')}}" data-url="{{route('subcategory.create')}}">
            <em class="icon ni ni-plus"></em>
        </button>
    </div>
@endsection
@section('filter')
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{asset('libs/summernote/summernote-bs4.css')}}">
@endpush
@push('script-page')
    <script src="{{asset('libs/summernote/summernote-bs4.js')}}"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-sm-12">        
            <!-- Listing -->
            <div class="card card-bordered">
                <!-- Card header -->
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">{{__('All Subcategories')}}</h6>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="card-inner p-0 border-top">
                    <table class="table table-tranx">
                        <thead class="tb-tnx-head">
                            <tr>
                                <th scope="col">{{ __('Name')}}</th>
                                <th scope="col">{{ __('Category')}}</th>
                                <th scope="col">{{ __('Created at')}}</th>
                                <th scope="col" class="text-right">{{ __('Action')}}</th>
                            </tr>
                        </thead>
                        @if(count($subcategorise) > 0 &&  !empty($subcategorise))
                            <tbody>
                                @foreach ($subcategorise as $subcategory)
                                    <tr class="tb-tnx-item">
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{!empty($subcategory->category_id->name)?$subcategory->category_id->name:''}}</td>
                                        <td> {{ Utility::dateFormat($subcategory->created_at)}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li>
                                                            <a href="{{ route('subcategory.edit', $subcategory->id) }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['subcategory.destroy', $subcategory->id] ]) !!}
                                                                <a href="#!" class="show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}">Remove</a>
                                                            {!! Form::close() !!}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
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

