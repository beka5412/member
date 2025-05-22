@extends('layouts.admin')
@section('page-title')
    {{ __('Dashboard') }}
@endsection

@section('title')
    {{ __('Dashboard') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Home') }}</li>
@endsection

@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = Utility::getValByName('company_logo');
@endphp

@section('content')
<div class="nk-block">
  <div class="row g-gs">
    <div class="col-xl-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="card-title">
              <h4 id="greetings"></h4>
                                            <h6 class="title">
                                                <img style=" height: 60px; width: 60px; " src="{{ asset(Storage::url('uploads/profile/' . (!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'avatar.png'))) }}" alt="user-image" class="wid-35 me-2 img-thumbnail rounded-circle">
                                                {{ __(Auth::user()->name) }}
                                            </h6>
                <p class="small">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Você está na área de membros - {{ $store_id->name ?? '' }}</font>
                  </font>
                </p>
              </div>
             
            </div>
            <div class="">
              <img src="https://rocketpays.app/images/recompensa.png" style="max-height: 50px;" alt="">
            </div>
          
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="card-title">
                <h4 class="title mb-1">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Total de Cursos</font>
                  </font>
                </h4>
                <p class="small">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Número total de cursos na área de membros</font>
                  </font>
                </p>
              </div>
              <div class="my-3">
                <div class="amount h3 fw-bold text-primary">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">{{ isset($newproduct) ? $newproduct : '' }}</font>
                  </font>
                </div>
              </div>
            </div>
            <div class="">
              <img src="https://rocketpays.app/images/taxa-de-conversao.png" style="max-height: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="card-title">
                <h4 class="title mb-1">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Alunos</font>
                  </font>
                </h4>
                <p class="small">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Total de alunos</font>
                  </font>
                </p>
              </div>
              <div class="my-3">
                <div class="amount h3 fw-bold text-primary">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">{{ isset($totle_order) ? $totle_order : '' }}</font>
                  </font>
                </div>
              </div>
            </div>
            <div class="">
              <img src="https://rocketpays.app/images/order_pay.png" style="max-height: 50px;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
    <div class="col-sm-12">
        <!-- Listing -->
        <div class="card card-bordered">
            <!-- Card header -->
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">                
                        <h6 class="title">{{__('All Courses')}}</h6>
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="col-lg-12 col-md-12">
                <table class="table table-tranx">
                    <thead>
                        <tr class="tb-tnx-head">
                            <th scope="col" style=" width: 123px; ">{{ __('Thumbnail')}}</th>
                            <th scope="col">{{ __('Title')}}</th>
                            <th scope="col">{{ __('Aulas')}}</th>
                            <th scope="col">{{ __('Category')}}</th>
                            <th scope="col">{{ __('Status')}}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @if(!empty($courses) && count($courses) > 0)
                        <tbody>
                            @foreach($courses as $course)
                                <tr class="tb-tnx-item">
                                    <td scope="row">
                                        <div class="media align-items-center">
                                            <div>
                                                @if(!empty($course->thumbnail))
                                                <a class="course-thumb" href="{{route('course.edit',\Illuminate\Support\Facades\Crypt::encrypt($course->id))}}">
                                                        <img alt="Image placeholder" src="{{asset(Storage::url('uploads/thumbnail/'.$course->thumbnail))}}" class="course-thumb-img" style="width: 80px;">
                                                    </a>
                                                @else
                                                <a href="{{route('course.edit',\Illuminate\Support\Facades\Crypt::encrypt($course->id))}}">
                                                        <img alt="Image placeholder" src="{{asset(Storage::url('uploads/is_cover_image/default.jpg'))}}" class="" style="width: 80px;">
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{route('course.edit',\Illuminate\Support\Facades\Crypt::encrypt($course->id))}}"><h5 class="title">{{$course->title}}</h5></a></td>
                                    <td>53 Aulas</td>
                                    <td>{{!empty($course->category_id)?$course->category_id->name:'-'}}</td>
                                    <td><span class="badge bg-success">{{$course->status}}</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                <ul class="link-list-plain">
                                                    <li>
                                                        <a href="{{route('course.edit',\Illuminate\Support\Facades\Crypt::encrypt($course->id))}}">{{ __('Edit') }}</a>
                                                    </li>
                                                    <li>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['course.destroy', $course->id]]) !!}
                                                            <a href="#!" class="show_confirm" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('Delete')}}">{{ __('Remove') }}</a>
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
                                <td colspan="10">
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
    <!-- <div class="nk-block">
        @if (\Auth::user()->type == 'Owner')
            <div class="row">
                <div class="col-sm-12">
                    <div class="row g-gs">
                        <div class="col-xxl-5">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-2">
                                        <div class="card-title">
                                            <h3 id="greetings"></h3>
                                            <h6 class="title">
                                                <img width="60px" src="{{ asset(Storage::url('uploads/profile/' . (!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'avatar.png'))) }}" alt="user-image" class="wid-35 me-2 img-thumbnail rounded-circle">
                                                {{ __(Auth::user()->name) }}
                                            </h6>
                                        </div>
                                    </div>
                                    <p>{{ __('Have a nice day! Did you know that you can quickly add your favorite course or category to the store?') }}</p>
                                    <div class="dropdown quick-add-btn">
                                        <a class="btn btn-primary" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                            <em class="icon ni ni-plus"></em>
                                            <span>{{ __('Quick add') }}</span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('course.create') }}" class="dropdown-item"><span>{{ __('Add new Course') }}</span></a>
                                            <a href="#" data-size="md" data-url="{{ route('category.create') }}" data-ajax-popup="true" data-title="{{ __('Create New Category') }}" class="dropdown-item" data-bs-placement="top"><span>{{ __('Add new Category') }}</span></a>
                                            <a href="#" data-size="md" data-url="{{ route('subcategory.create') }}" data-ajax-popup="true" data-title="{{ __('Create New Subcategory') }}" class="dropdown-item" data-bs-placement="top"><span>{{ __('Add new Subcategory') }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title align-start">
                                            <h6 class="title">{{ __('Top Course') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner p-0 border-top">
                                    <div class="nk-tb-list nk-tb-orders">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col">
                                                <span>{{ __('ID') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Thumb') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Course') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Price') }}</span>
                                            </div>
                                        </div>
                                        @if (count($products) > 0 && !empty($item_id) && !empty($products))
                                            @foreach ($products as $product)
                                                @foreach ($item_id as $k => $item)
                                                    @if ($product->id == $item)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span>{{ $product->id }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <div>
                                                                    @if (!empty($product->thumbnail))
                                                                        <img alt="Image placeholder"
                                                                            src="{{ asset(Storage::url('uploads/thumbnail/' . $product->thumbnail)) }}"
                                                                            width="80px">
                                                                    @else
                                                                        <img alt="Image placeholder"
                                                                            src="{{ asset(Storage::url('uploads/thumbnail/default.jpg')) }}"
                                                                            class="" style="width: 80px;">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span>{{ $product->title }}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-sm">
                                                                <span>{{ Utility::priceFormat($product->price) }}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @else
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col tb-col-sm">
                                                    <i class="fas fa-folder-open text-primary" style="font-size: 40px;"></i>
                                                    <h2>{{ __('Opps') }}...</h2>
                                                    <h6>{{ __('No data Found') }}. </h6>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-7">
                            <div class="row g-gs">
                                <div class="col-lg-4 col-6">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="qrcode">
                                                {!! empty($s_u = ($store_id['store_url'] ?? '')) || QrCode::generate($s_u) !!}
                                            </div>
                                            <h6 class="mb-3 mt-4 ">{{ $store_id->name ?? '' }}</h6>
                                            <a id="clip" class="btn btn-primary btn-sm text-sm"
                                                data-link="{{ $store_id['store_url'] ?? '' }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="{{ __('Click to copy link') }}">{{ __('Store Link') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <h6 class="">{{ __('Total Course') }}</h6>
                                            <h4 class="mb-0">{{ $newproduct }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <h6 class="">{{ __('Total Orders') }}</h6>
                                            <h4 class="mb-0">{{ $totle_order }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="card-title-group align-start mb-2">
                                                <h6 class="title">{{ __('Orders') }}</h6>
                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <div class="nk-ck">
                                                <canvas class="bar-chart" id="barChartData"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-title-group align-start">
                                        <div class="card-title">
                                            <h6 class="title">{{ __('Recent Orders') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner p-0 border-top">
                                    <div class="nk-tb-list nk-tb-orders">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col">
                                                <span>{{ __('Orders') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Date') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Name') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Value') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Payment Type') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Status') }}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{ __('Action') }}</span>
                                            </div>
                                        </div>
                                        @if (!empty($new_orders) && count($new_orders) > 0)
                                            @foreach ($new_orders as $order)
                                                @if ($order->status != 'Cancel Order')
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <a href="{{ route('orders.show', $order->id) }}">
                                                                <span class="btn-inner--text">{{ $order->order_id }}</span>
                                                            </a>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span>{{ Utility::dateFormat($order->created_at) }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span>{{ $order->name }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span>{{ Utility::priceFormat($order->price) }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <span>{{ $order->payment_type }}</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <button type="btn btn-primary" class="btn btn-sm {{ $order->payment_status == 'success' || $order->payment_status == 'succeeded' || $order->payment_status == 'approved' ? 'btn-soft-success' : 'btn-soft-info' }} btn-icon rounded-pill">
                                                                <span class="btn-inner--icon">
                                                                    @if ($order->payment_status == 'pendding')
                                                                        <i class="fas fa-check"></i>
                                                                    @else
                                                                        <i class="fa fa-check-double"></i>
                                                                    @endif
                                                                </span>
                                                                @if ($order->payment_status == 'pendding')
                                                                    <span class="btn-inner--text">
                                                                        {{ __('Pending') }}:
                                                                        {{ \App\Models\Utility::dateFormat($order->created_at) }}
                                                                    </span>
                                                                @else
                                                                    <span class="btn-inner--text">
                                                                        {{ __('Delivered') }}:
                                                                        {{ \App\Models\Utility::dateFormat($order->updated_at) }}
                                                                    </span>
                                                                @endif
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row g-gs">
                <div class="col-sm-12">
                    <div class="row g-gs">
                        <div class="col-xxl-6">
                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="theme-avtar bg-primary">
                                                <i class="fas fa-cube"></i>
                                            </div>
                                            <h6 class="mb-3 mt-3">{{ __('Total Store') }}</h6>
                                            <h4 class="mb-0">{{ $user->total_user }}</h4>
                                            <div class="col-auto">
                                                <h6 class="text-muted mb-1 mt-2">{{ __('Paid Store') }}</h6>
                                                <span
                                                    class="h6 font-weight-bold mb-0 ">{{ $user['total_paid_user'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="theme-avtar bg-warning">
                                                <i class="fas fa-cart-plus"></i>
                                            </div>
                                            <h6 class="mb-3 mt-3">{{ __('Total Orders') }}</h6>
                                            <h4 class="mb-0">{{ $user->total_orders }}</h4>
                                            <div class="col-auto">
                                                <h6 class="text-muted mb-1 mt-2">{{ __('Total Order Amount') }}</h6>
                                                <span
                                                    class="h6 font-weight-bold mb-0 ">{{ env('CURRENCY_SYMBOL') . $user['total_orders_price'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="theme-avtar bg-danger">
                                                <i class="fas fa-shopping-bag"></i>
                                            </div>
                                            <h6 class="mb-3 mt-3">{{ __('Total Plans') }}</h6>
                                            <h4 class="mb-0">{{ $user['total_plan'] }}</h4>
                                            <div class="col-auto">
                                                <h6 class="text-muted mb-1 mt-2">{{ __('Most Purchase Plan') }}</h6>
                                                <span
                                                    class="h6 font-weight-bold mb-0 ">{{ !empty($user['most_purchese_plan']) ? $user['most_purchese_plan'] : '-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>{{ __('Recent Orders') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div id="plan_order" data-color="primary" data-height="230"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div> -->
@endsection

@push('script-page')
    <script>
        var today = new Date()
        var curHr = today.getHours()

        if (curHr < 12) {
            document.getElementById("greetings").innerHTML = "{{ __('Good Morning,') }}";
        } else if (curHr < 18) {
            document.getElementById("greetings").innerHTML = "{{ __('Good Afternoon,') }}";
        } else {
            document.getElementById("greetings").innerHTML = "{{ __('Good Evening,') }}";
        }
    </script>

    @if (\Auth::user()->type == 'Owner')
        <script>
            const data = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                dataUnit: 'USD',
                stacked: true,
                datasets: [{
                    background: NioApp.hexRGB('#798bff', .3),
                    data: [1000, 8000, 12500, 5500, 9500, 14299, 11000, 8000, 12500, 5500, 9500, 14299]
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                    y: {
                        beginAtZero: true
                    }
                    }
                },
            };

            const myChart = new Chart(
                document.getElementById('barChartData'),
                config
            );
        </script>
        <script>
            $(document).ready(function () {
                $('#clip').on('click', async function (event) {
                    event.stopPropagation()
                    let content = $(this).attr("data-link")
                    try {
                        await navigator.clipboard.writeText(content);
                        console.log('Content copied to clipboard');
                    } catch (err) {
                        console.error('Failed to copy: ', err);
                    }
                });
            });
        </script>
    @endif
@endpush
