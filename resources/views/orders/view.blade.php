@extends('layouts.admin')
@section('page-title')
    {{__('Order')}}
@endsection
@section('title')
    {{__('Orders')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __('Order') }}</a></li>
    <li class="breadcrumb-item">{{ __('show') }}</li>
@endsection
@section('filter')
@endsection
@section('content')

    <div class="mt-4">
        <div id="printableArea">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-title">
                                <h6 class="title">{{__('Order')}} {{$order->order_id}}</h6>
                                <p class="mb-4">{{__('Shipping Information')}}</p>
                            </div>
                            <div>
                                <ul>
                                    <li class="fw-medium">
                                        <em class="icon ni ni-user"></em>
                                        <small>{{ !empty($student_data->name) ? $student_data->name : ''}}</small>
                                    </li>
                                    <li class="fw-medium">
                                        <em class="icon ni ni-mail"></em>
                                        <small>{{ !empty($student_data->email) ? $student_data->email : ''}}</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer border-top text-muted">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="px-0">{{__('Item')}}</th>
                                        <th class="px-0">{{__('Price')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sub_tax = 0;
                                        $total = 0;
                                    @endphp     
                                    {{-- @if (!empty($order_products)) --}}
                                        @foreach($order_products as $key=>$product)
                                            <tr>
                                                <td class="px-0">
                                                    <span>
                                                        @if(isset($product->product_name))
                                                            {{$product->product_name}}
                                                        @else
                                                            {{$product->name}}
                                                        @endif
                                                    </span>
                                                    @php
                                                        $total_tax = 0
                                                    @endphp
                                                </td>
                                                <td class="px-0">
                                                    {{ Utility::priceFormat($product->price)}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    {{-- @endif --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-group-title">
                                <div class="card-title">
                                    <h6 class="title">{{__('Items from Order '). $order->order_id}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-inner p-0">
                            <div class="nk-tb-list">
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">
                                        <span class="tb-lead">{{__('Description')}}</span>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="tb-lead">{{__('Price')}}</span>
                                    </div>
                                </div>
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">{{__('Grand Total')}} :</div>
                                    <div class="nk-tb-col">{{ Utility::priceFormat($sub_total)}}</div>
                                </div>
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">{{__('Applied Coupon')}} :</div>
                                    <div class="nk-tb-col">{{(!empty($order->discount_price))?$order->discount_price: Utility::priceFormat(0)}}</div>
                                </div>
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">{{__('Total')}} :</div>
                                    <div class="nk-tb-col">{{ Utility::priceFormat($grand_total) }}</div>
                                </div>
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">{{__('Payment Type')}} :</div>
                                    <div class="nk-tb-col">{{ $order['payment_type'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
