@php
$logo = asset(Storage::url('uploads/logo/'));
$company_logo = Utility::getValByName('company_logo');
$user = \Auth::user();
$store_id = \App\Models\Store::where('id', $user->current_store)->first();
if($store_id)
{
    $app_url = trim(env('APP_URL'), '/');
    $store_id['store_url'] = $app_url . '/' . $store_id['slug'] . '/home';
}
$plan = \App\Models\Plan::where('id', $user->plan)->first();
@endphp

<header class="nk-header nk-header-fixed is-light" style="z-index:9;">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}" alt="{{ config('app.name', 'LMSGo SaaS') }}" class="logo-img" />
                </a>
            </div>
            <li>
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown" aria-expanded="false">
                    <em class="icon ni ni-swap"></em>
                    <span>Trocar Área de Membros</span>
                    <em class="dd-indc icon ni ni-chevron-right"></em>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" style="">
                    <ul class="link-list-opt no-bdr">
                        <li>
                            @foreach(Auth::user()->stores as $store)
                            @if($store->is_active)
                                    <a href="@if(Auth::user()->current_store == $store->id)#@else {{ route('change_store',$store->id) }} @endif" title="{{ $store->name }}" class="dropdown-item notify-item">
                                        @if(Auth::user()->current_store == $store->id)
                                        <em class="icon ni ni-check"></em>
                                        @endif
                                        <span>{{ $store->name }}</span>
                                    </a>
                                @else
                                    <a href="#" class="dropdown-item notify-item" title="{{__('Locked')}}">
                                        <i class="fas fa-lock"></i>
                                        <span>{{ $store->name }}</span>
                                        @if(isset($store->pivot->permission))
                                            @if($store->pivot->permission =='Owner')
                                                <span class="badge badge-primary">{{__($store->pivot->permission)}}</span>
                                            @else
                                                <span class="badge badge-secondary">{{__('Shared')}}</span>
                                            @endif
                                        @endif
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                            @endforeach
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-placement="top" data-ajax-popup="true" title="{{__('Create Store')}}" data-url="{{ route('store-resource.create') }}">
                                    <em class="icon ni ni-plus-circle"></em>
                                    <span>Criar Nova área de membros</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                </li>
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <a class="nk-news-item" href="#">
                        <a target="_blank" class="btn btn-primary btn-sm text-sm" href="{{ $store_id['store_url'] ?? '' }}"
                           title="{{ __('Click to copy link') }}">{{ __('Store Link') }}
                        </a>
                    </a>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="me-n1">
                        <a href="https://api.whatsapp.com/send?phone=5547992258075&text=Ol%C3%A1,%20preciso%20de%20ajuda%20com%20os%20servi%C3%A7os%20da%20Rocketleads" target="_blank" class="dropdown-toggle nk-quick-nav-icon">
                            <em class="icon ni ni-whatsapp"></em>
                        </a>
                    </li>
                    <li class="me-n1">
                        <a href="https://ajuda.rocketleads.com.br" target="_blank" class="dropdown-toggle nk-quick-nav-icon">
                            <em class="icon ni ni-help"></em>
                        </a>
                    </li>
                    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                            <div class="quick-icon border border-light">
                                <img class="icon" src="{{ asset('images/flags/'.$currantLang.'.png') }}" alt="">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                            <ul class="language-list">
                                @foreach (Utility::languages() as $language)
                                    <li>
                                        <a href="{{route('change.language',$language)}}" class="language-item">
                                            <img src="{{ asset('images/flags/'.$language.'.png') }}" alt="" class="language-flag">
                                            <span class="language-name">{{ Str::upper($language) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="sm">
                                    <img width="32px" src="{{ asset(Storage::url('uploads/profile/' . (!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'avatar.png'))) }}" alt="user-image" class="me-1 img-thumbnail rounded-circle">
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">{{__('Hi')}}</div>
                                    <div class="user-name dropdown-indicator">{{\Auth::user()->name}}</div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{\Auth::user()->name}}</span>
                                        <span class="sub-text">{{\Auth::user()->email}}m</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('profile') }}"><em class="icon ni ni-user-alt"></em><span>{{ __('My profile') }}</span></a></li>
                                    @auth('web')
                                        @if(Auth::user()->type == 'Owner')
                                            <li><a href="{{ route('store-resource.create') }}"><em class="icon ni ni-activity-alt"></em><span>{{ __('Create New Store')}}</span></a></li>
                                        @endif

                                    @endauth
                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><em class="icon ni ni-signout"></em><span>{{ __('Logout') }}</span></a></li>
                                </ul>

                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown notification-dropdown me-n1">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                            <div class="{{ (!empty($store_notifications->notifications) && count($store_notifications->notifications) > 0) ? 'icon-status icon-status-info' : '' }}"><em class="icon ni ni-bell"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                <a href="#">Mark All as Read</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    @if(!empty($store_notifications))
                                        @foreach($store_notifications->notifications as $store_notification)
                                            <div class="nk-notification-item dropdown-inner">
                                                <!-- <div class="nk-notification-icon">
                                                    <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                </div> -->
                                                <a href="{{ route('comment.index') }}" class="nk-notification-content">
                                                    <div class="nk-notification-text"><strong>{{ $store_notification->data['message'] }}</strong></div>
                                                    <div class="nk-notification-time">{{ \Carbon\Carbon::parse($store_notification->created_at)->diffForHumans() }}</div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div><!-- .nk-notification -->
                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="#">View All</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>


