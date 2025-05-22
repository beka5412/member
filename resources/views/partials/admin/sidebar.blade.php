@php
    $logo = asset(Storage::url('uploads/logo/'));
    $company_logo = \App\Models\Utility::GetLogo();
    $user = \Auth::user();
    $plan = \App\Models\Plan::where('id', $user->plan)->first();
@endphp
@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <nav class="nk-sidebar nk-sidebar-fixed is-dark  is-compact" data-content="sidebarMenu">
@else
    <nav class="nk-sidebar nk-sidebar-fixed is-dark  is-compact" data-content="sidebarMenu">
@endif
    <div class="navbar-wrapper">
        <div class="nk-sidebar-element nk-sidebar-head">
            <div class="nk-menu-trigger">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-sidebar-brand">
                <a href="{{ route('dashboard') }}" class="logo-link nk-sidebar-logo">
                    <img class="logo-light logo-img-lg" src="{{asset('images/login-logo.png')}}" alt="logo">
                </a>
            </div>
        </div>
        <div class="nk-sidebar-element nk-sidebar-body">
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu" data-simplebar>
                    <ul class="nk-menu">
                        @if(Auth::user()->type == 'Owner')
                            <li class="nk-menu-item {{ (\Request::route()->getName()=='orders.index' || \Request::route()->getName()=='orders.show') ? ' active dash-trigger' : '' }}">
                                <a href="{{route('dashboard')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-activity-round"></em></span>
                                    <span class="nk-menu-text">{{__('Dashboard')}}</span>
                                </a>
                            </li>

                            <li class="nk-menu-heading  mt-2"><h6 class="overline-title text-primary-alt">{{__('Conteúdo')}}</h6></li>
                            <li class="nk-menu-item {{ (\Request::route()->getName()=='course.index' || \Request::route()->getName()=='course.create' || \Request::route()->getName()=='course.edit' || \Request::route()->getName()=='chapters.create' || \Request::route()->getName()=='chapters.edit') ? ' active' : '' }}">
                                <a class="nk-menu-link" href="{{route('course.index')}}">
                                <span class="nk-menu-icon"><em class="icon ni ni-play-circle"></em></span>
                                    <span class="nk-menu-text">{{__('Cursos')}}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item has-sub {{ (\Request::route()->getName()=='community.spaces') ? ' active' : '' }}">
                                <a class="nk-menu-link nk-menu-toggle" href="#">
                                    <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                    <span class="nk-menu-text">{{__('Comunidade')}}</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a class="nk-menu-link" href="{{route('community.spaces')}}">
                                            <span class="nk-menu-text">{{__('Salas')}}</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a class="nk-menu-link" href="{{route('community.categories')}}">
                                            <span class="nk-menu-text">{{__('Categorias')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nk-menu-item has-sub {{ (\Request::route()->getName()=='course.index' || \Request::route()->getName()=='course.create' || \Request::route()->getName()=='course.edit' || \Request::route()->getName()=='chapters.create' || \Request::route()->getName()=='chapters.edit' || \Request::route()->getName()=='category.index' || \Request::route()->getName()=='subcategory.index' || \Request::route()->getName()=='custom-page.index' || \Request::route()->getName()=='blog.index' || \Request::route()->getName()=='subscriptions.index' || \Request::route()->getName()=='product-coupon.index' || \Request::route()->getName()=='product-coupon.show') ? 'active dash-trigger' : '' }}">
                                <a href="#!" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-folder"></em></span>
                                    <span class="nk-menu-text">{{__('Organize')}}</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a class="nk-menu-link" href="{{route('category.index')}}">
                                            <span class="nk-menu-text">{{__('Categorias')}}</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a class="nk-menu-link" href="{{route('domain.index')}}">
                                            <span class="nk-menu-text">{{__('Domains')}}</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a class="nk-menu-link" href="{{route('comment.index')}}">
                                            <span class="nk-menu-text">{{__('Comments')}}</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a class="nk-menu-link" href="{{route('custom-page.index')}}">
                                            <span class="nk-menu-text">{{__('Páginas')}}</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a class="nk-menu-link" href="{{route('custom-page.index')}}">
                                            <span class="nk-menu-text">{{__('Badges')}}</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a class="nk-menu-link" href="{{route('custom-page.index')}}">
                                            <span class="nk-menu-text">{{__('Turmas')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            <li class="nk-menu-item {{ (\Request::route()->getName()=='users.index') ? ' active' : '' }}">
                                <a href="{{route('users.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                    <span class="nk-menu-text">{{__('Alunos')}}</span>
                                </a>
                            </li>

                            <li class="nk-menu-item">
                                <a class="nk-menu-link" href="{{route('storeanalytic')}}">
                                    <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                    <span class="nk-menu-text">{{ __('Relatórios') }}</span>
                                </a>
                            </li>

                            <li class="nk-menu-heading mt-2"><h6 class="overline-title text-primary-alt">Configurações</h6></li>


                            <li class="nk-menu-item {{ (\Request::route()->getName()=='integrations.index') ? ' active' : '' }}">
                                <a href="{{route('integrations.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
                                    <span class="nk-menu-text">{{__('Integrações')}}</span>
                                </a>
                            </li>

                            <li class="nk-menu-item {{ (\Request::route()->getName()=='customization.index') ? ' active' : '' }}">
                                <a href="{{route('customization.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-color-palette"></em></span>
                                    <span class="nk-menu-text">{{__('Personalizar')}}</span>
                                </a>
                            </li>

                        @endif

                        @if(Auth::user()->type == 'super admin')
                            <li class="nk-menu-item {{ (\Request::route()->getName()=='dashboard') ? ' active' : '' }}">
                                <a href="{{route('dashboard')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                    <span class="nk-menu-text">{{__('Dashboard')}}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item {{ (\Request::route()->getName()=='store-resource.index' || \Request::route()->getName()=='store.grid' || \Request::route()->getName()=='store.subDomain' || \Request::route()->getName()=='store.customDomain') ? ' active' : '' }}">
                                <a href="{{route('store-resource.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                    <span class="nk-menu-text">{{__('Stores')}}</span>
                                </a>
                            </li>



                        @endif

                        <!--<li class="dash-item {{ (\Request::route()->getName()=='plans.index' || \Request::route()->getName()=='stripe') ? ' active' : '' }}">
                            <a href="{{ route('plans.index') }}" class="dash-link"><span class="dash-micon"><i class="ti ti-award"></i></span><span class="dash-mtext">{{ __('Plans') }}</span></a>
                        </li>-->

                        @if(\Auth::user()->type=='super admin')
                            <li class="nk-menu-item {{ (\Request::route()->getName()=='plan_request.index') ? ' active' : '' }}">
                                <a href="{{ route('plan_request.index') }}" class="nk-menu-link {{ request()->is('plan_request*') ? 'active' : '' }}">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                    </span><span class="nk-menu-text">{{__('Plan Request')}}</span>
                                </a>
                            </li>
                        @endif

                        {{-- @if(Auth::user()->type == 'super admin')
                            <li class="nk-menu-item {{ (\Request::route()->getName()=='manage.language') ? ' active' : '' }}">
                                <a href="{{route('manage.language',[$currantLang])}}" class="nk-menu-link {{ (Request::segment(1) == 'manage-language')?'active':''}}">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                    <span class="nk-menu-text">{{__('Language')}}</span>
                                </a>
                            </li>
                        @endif   --}}

                        {{-- @if(Auth::user()->type == 'super admin')
                            <li class="nk-menu-item">
                                <a href="{{route('custom_landing_page.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                    <span class="nk-menu-text">{{__('Landing page')}}</span>
                                </a>
                            </li>
                        @endif --}}


                        @if(Auth::user()->type == 'super admin')
                            <li class="nk-menu-item {{ (\Request::route()->getName()=='orders.index' || \Request::route()->getName()=='orders.show') ? ' active' : '' }}">
                                <a href="{{route('orders.index')}}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                                    <span class="nk-menu-text">{{__('Assinaturas')}}</span>
                                </a>
                            </li>
                        @endif
                        <!-- <li class="nk-menu-item">
                                <a href="{{ route('settings') }}" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                    <span class="nk-menu-text">
                                        @if(Auth::user()->type == 'super admin')
                                            {{__('Configurações')}}
                                        @else
                                            {{__('Configurações')}}
                                        @endif
                                    </span>
                                </a>
                            </li> -->


                            <li class="nk-menu-heading mt-2"><h6 class="overline-title text-primary-alt">Informações</h6></li>

                            <li class="nk-menu-item">
                                <a href="{{ route('profile') }}"  class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                                    <span class="nk-menu-text">{{ __('Meu Perfil') }}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('logout') }}" class="nk-menu-link" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                                    <span class="nk-menu-text">{{ __('Sair') }}</span>
                                </a>
                            </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>





