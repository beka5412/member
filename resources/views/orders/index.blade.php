@extends('layouts.admin')
@section('page-title')
    {{__('Order')}}
@endsection
@section('title')
    {{__('Orders ')}}
@endsection
@section('action-btn')
    <a href="{{route('order.export')}}" class="btn btn-icon btn-lg btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Export')}}">
        <i class="icon ni ni-printer-fill"></i>
    </a>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Orders') }}</li>
@endsection

@section('filter')
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">     
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">{{ __('All Orders') }}</h6>
                    </div>
                </div> 
            </div>
            <div class="card-inner p-0 border-top">
                <table class="table table-tranx">
                    <thead class="tb-tnx-head">
                        <tr>
                            <th scope="col">
                                <span>{{__('Orders')}}</span>
                            </th>
                            <th scope="col">
                                <span>{{__('Date')}}</span>
                            </th>
                            <th scope="col">
                                <span>{{__('Name')}}</span>
                            </th>
                            <th scope="col">
                                <span>{{__('Value')}}</span>
                            </th>
                            <th scope="col">
                                <span>{{__('Payment Type')}}</span>
                            </th>
                            <th scope="col">
                                <span>{{__('Receipt')}}</span>
                            </th>
                            <th scope="col">
                                <span>{{__('Action')}}</span>
                            </th>
                        </tr>
                    </thead>
                    @if(!empty($orders) && count($orders) > 0)
                        <div>
                            @foreach($orders as $order)
                                <tr class="tb-tnx-item">
                                    <td scope="row">
                                        <a href="{{route('orders.show',$order->id)}}" class="badge bg-primary">
                                            <span>{{$order->order_id}}</span>
                                        </a>
                                    </td>
                                    <td class="order">
                                        <span class="h6 text-sm font-weight-bold mb-0">{{ Utility::dateFormat($order->created_at)}}</span>
                                    </td>
                                    <td>
                                        <span class="client">{{$order->name}}</span>
                                    </td>
                                    <td>
                                        <span class="value text-sm mb-0">{{ Utility::priceFormat($order->price)}}</span>
                                    </td>
                                    <td>
                                        <span class="taxes text-sm mb-0">{{$order->payment_type}}</span>
                                    </td>
                                    <td>
                                        @if ($order->payment_type == 'Bank Transfer')
                                            <a href="{{ asset(Storage::url($order->receipt)) }}" title="Invoice"
                                                download>
                                                <i class="fas fa-file-invoice"></i>
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                <ul class="link-list-plain">
                                                    <li>
                                                        <a href="{{route('orders.show',$order->id)}}">Visualizar</a>
                                                    </li>
                                                    <li>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['orders.destroy', $order->id]]) !!}
                                                            <a href="#">Remove</a>
                                                        {!! Form::close() !!}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </div>
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
