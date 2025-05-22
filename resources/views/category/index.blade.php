@extends('layouts.admin')
@section('page-title')
    {{__('Category')}}
@endsection
@section('title')
    {{__('Categories')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Category') }}</li>
@endsection
@section('action-btn')
    
    <div class="nk-block-tools-opt">
        <button class="btn btn-icon btn-primary" data-bs-toggle="modal" data-bs-placement="top" data-ajax-popup="true" title="{{__('Add Category')}}" data-url="{{route('category.create')}}">
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
    <script src="{{ asset('assets/newjs/libs/dragula.js?ver=3.0.3') }}"></script>
    <script>
        function updateOrder(){
            var categories = document.querySelectorAll('.category_item');
            var categoryOrder = [];
            
            for (var i = 0; i < categories.length; i++) {
                var categoryId = categories[i].dataset.categoryId;
                var newPosition = i;
                categoryOrder.push({ id: categoryId, order: newPosition });
            }

            $.ajax({
                url: "{{ route('categories.order') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: {categoryOrder},
                success: function(response) {
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var container = [document.getElementById('dragContainer')];
            var drake = dragula(container);
            drake.on('drop', function(el, target, source, sibling) {
                setTimeout(() => {
                    updateOrder()
                }, 300);
            });
        });
    </script>
@endpush
@section('content')

    <!-- Listing -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-bordered">
                <!-- Card header -->
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">{{__('All Categories')}}</h6>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="card-inner p-0 border-top">
                    <table class="table table-tranx">
                        <thead class="tb-tnx-head">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">{{ __('Image')}}</th>
                                <th scope="col">{{ __('Name')}}</th>
                                <th scope="col">{{ __('Created at')}}</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        @if(count($categorise) > 0 && !empty($categorise))
                            <tbody id="dragContainer" class="dragula-container">
                                @foreach ($categorise as $category)
                                    <tr class="tb-tnx-item category_item" data-category-id="{{$category->id}}" style="cursor:move;">
                                        <td>
                                            <em class="icon ni ni-move"></em>
                                        </td>
                                        <td scope="row">
                                            <div class="media align-items-center">
                                                <div>
                                                    @if(!empty($category->category_image))
                                                        <a href="{{asset(Storage::url('uploads/category_image/'.$category->category_image))}}" target="_blank">
                                                            <img alt="Image placeholder" src="{{asset(Storage::url('uploads/category_image/'.$category->category_image))}}" class="" style="width: 80px;">
                                                        </a>
                                                    @else
                                                        <a href="{{asset(Storage::url('uploads/category_image/default.png'))}}" target="_blank">
                                                            <img alt="Image placeholder" src="{{asset(Storage::url('uploads/category_image/default.png'))}}" class="" style="width: 80px;">
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ Utility::dateFormat($category->created_at)}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li>
                                                            <a data-bs-toggle="modal" data-bs-placement="top" data-ajax-popup="true" data-url="{{ route('category.edit', $category->id) }}">Edit</a>
                                                        </li>
                                                        <li>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id] ]) !!}
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
