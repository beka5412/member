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
    <div class="btn btn-sm btn-primary btn-icon m-1">
        <a href="#" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Create User')}}" data-ajax-popup="true" data-size="lg" data-title="{{__('Create User')}}" data-url="{{route('subscriptions.create')}}"><i class="ti ti-plus text-white"></i></a>
    </div>
@endsection
@section('filter')
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12">   
        <div class="card">
            <!-- Table -->
            <div class="card-header">
                <h5>{{__('Users')}}</h5>
            </div>
            <!-- Table -->
            <div class="card-body table-border-style">
                <div class="table-responsive overflow_hidden">
                    <table id="pc-dt-simple" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">{{__('User')}}</th>
                                <th class="text-right">{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-page')
    <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('js/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.html5.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'subscriber'
                    }, {
                        extend: 'csvHtml5',
                        title: 'subscriber'
                    }, {
                        extend: 'pdfHtml5',
                        title: 'subscriber'
                    },
                ],
            });
        });

        $(document).ready(function () {
            $(document).on('keyup', '.search-user', function () {
                var value = $(this).val();
                $('.employee_tableese tbody>tr').each(function (index) {
                    var name = $(this).attr('data-name');
                    if (name.includes(value)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
@endpush

