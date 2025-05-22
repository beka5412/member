<header class="nk-header-over {{ (\Request::route()->getName()=='store.community') ? 'rm__cm__header is-dark border-bottom' : 'rm__header' }}" data-id="nk-header">
  <div class="container-fluid">
    <div class="nk-header-wrap">
        <div class="rm__hamburger nk-menu-trigger me-sm-2 ui-s2 store__nav">
            <p class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
                <em class="icon ni ni-menu"></em>
            </p>
        </div>
        @if(\Request::route()->getName()=='store.viewcourse')
        <div class="px-4">
            <a href="{{route('student.home',[$slug])}}" class="btn btn-outline-light">
                <div class="d-flex align-center">
                    <em class="icon ni ni-arrow-left"></em>
                    <span>Voltar</span>
                </div>
            </a>
        </div>
        @endif
        <div class="nk-header-menu" data-content="headerNav">
            <div class="nk-header-mobile">
                <div class="nk-header-brand">
                    <a href="{{ route('dashboard') }}" class="logo-link nk-sidebar-logo">
                        <img width="72px" height="auto" src="{{ asset($store_settings['cust_logo_member_area'] !== '' ? Storage::url('uploads/member_area/'.$store_settings['cust_logo_member_area']) : 'assets/images/store/logo.png') }}" alt="Brand logo" />
                    </a>
                </div>
                <div class="nk-menu-trigger me-n2">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav">
                        <em class="icon ni ni-arrow-left"></em>
                    </a>
                </div>
            </div>
        </div>
        <div class="nk-header-tools">
            <ul class="nk-quick-nav">
                <li class="dropdown notification-dropdown me-n1">
                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown" aria-expanded="true">
                        <div class="icon-status icon-status-info">
                        <em class="icon ni ni-bell"></em>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-10px, 38px, 0px);" data-popper-placement="bottom-end">
                        <div class="dropdown-head">
                        <span class="sub-title nk-dropdown-title">Notificações</span>
                            <a href="#">Marcar como lidas</a>
                        </div>
                        <div class="dropdown-body">
                            <div class="nk-notification">
                                <div class="nk-notification-item dropdown-inner">
                                <div class="nk-notification-icon">
                                    <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                </div>
                                <div class="nk-notification-content">
                                    <div class="nk-notification-text">
                                    <span>Seja bem-vindo</span>
                                    </div>
                                    <div class="nk-notification-time">-</div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-foot center">
                            <a href="#">VER TODAS</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        <div class="user-toggle">
                            <div class="sm">
                                <img width="32px" src="{{ asset('storage/uploads/profile/avatar.png') }}" alt="user-image" class="me-1 img-thumbnail rounded-circle">
                            </div>
                            <div class="user-info d-none d-md-block">
                                <div class="user-name">{{__('Hi')}}</div>
                                <div class="user-name dropdown-indicator">{{ $student->name }}</div>
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
                                    <span class="lead-text">{{ $student->name }}</span>
                                    <span class="sub-text">{{ $student->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="{{route('student.profile', $slug)}}"><em class="icon ni ni-user-alt"></em><span>{{ __('My profile') }}</span></a></li>
                            </ul>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="{{ route('student.logout', $slug) }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><em class="icon ni ni-signout"></em><span>{{ __('Logout') }}</span></a></li>
                            </ul>

                            <form id="frm-logout" action="{{ route('student.logout', $slug) }}" method="POST" class="d-none">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </li>            
            </ul>
        </div>
    </div>
  </div>
</header>


