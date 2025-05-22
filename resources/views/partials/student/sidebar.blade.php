<div class="rm__sidebar" data-content="sidebarMenu">
    <div class="rm__sidebar__body">
        <div class="rm__sidebar__content">
            <div class="rm__header__brand">
                <a href="{{route('student.home', $store->slug)}}" class="logo-link nk-sidebar-logo">
                    <img width="56%" src="{{ asset($store_settings['cust_favicon'] !== '' ? Storage::url('uploads/favicon/'.$store_settings['cust_favicon']) : 'assets/images/store/logo.png') }}" alt="Brand logo" />
                </a>
            </div>
            <div class="rm__sidebar__menu">
                <ul class="rm__menu">
                    <li class="rm__menu__item {{ (\Request::route()->getName()=='student.home') ? ' active' : '' }}">
                        <a href="{{route('student.home', $store->slug)}}" class="rm__menu__link">
                            <span class="rm__menu__icon"><em class="icon ni ni-play-circle"></em></span>
                            <span class="rm__menu__text">{{__('My Courses')}}</span>
                        </a>
                    </li>
                    <li class="rm__menu__item {{ (\Request::route()->getName()=='student.saved') ? ' active' : '' }}">
                        <a href="{{route('student.saved', $slug)}}" class="rm__menu__link">
                            <span class="rm__menu__icon"><em class="icon ni ni-bookmark"></em></span>
                            <span class="rm__menu__text">{{__('Salvos')}}</span>
                        </a>
                    </li>
                    <li class="rm__menu__item {{ (\Request::route()->getName()=='student.notes') ? ' active' : '' }}">
                        <a href="{{route('student.notes', $slug)}}" class="rm__menu__link">
                            <span class="rm__menu__icon"><em class="icon ni ni-file-plus"></em></span>
                            <span class="rm__menu__text">{{__('Minhas Anotações')}}</span>
                        </a>
                    </li>
                    <!-- <li class="rm__menu__item {{ (\Request::route()->getName()=='student.live') ? ' active' : '' }}">
                        <a href="{{route('student.live', $slug)}}" class="rm__menu__link">
                            <span class="rm__menu__icon"><em class="icon ni ni-live"></em></span>
                            <span class="rm__menu__text">{{__('Live')}}</span>
                        </a>
                    </li> -->
                    
                    @if (!empty($store_links) && count($store_links) > 0)
                        <li class="nk-menu-heading"><h6 class="overline-title text-primary-alt">Links</h6></li>
                    @endif
                    @if (!empty($store_links) && count($store_links) > 0)
                        @foreach ($store_links as $store_link)
                            <li class="rm__menu__item">
                                <a href="{{ $store_link->link }}" target="_blank" class="rm__menu__link">
                                    <span class="rm__menu__icon"><em class="icon ni {{ $store_link->type }}"></em></span>
                                    <span class="rm__menu__text">{{ $store_link->label }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                    <li class="rm__menu__item {{ (\Request::route()->getName()=='student.profile') ? ' active' : '' }}">
                        <a href="{{route('student.profile', $slug)}}" class="rm__menu__link">
                            <span class="rm__menu__icon"><em class="icon ni ni-account-setting-alt"></em></span>
                            <span class="rm__menu__text">{{__('My Account')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

