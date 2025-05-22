<div class="nk-sidebar nk-sidebar-fixed is-dark border-right" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-header-brand">
            <img src="http://rocketmember.test/assets/images/store/logo.png" alt="">
        </div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu nk-sidebar-menu-middle" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -16px 0px -40px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 16px 0px 40px;">
                                    <ul class="nk-menu">
                                        <li class="nk-menu-item fw-normal">
                                            <a href="#" class="nk-menu-link">
                                                <div class="rm__cm__sidebar__link__accent active">
                                                    <span class="fs-16px me-2">&#127968;</span>
                                                    <span class="nk-menu-text fw-normal">Home</span>
                                                </div>
                                            </a>
                                        </li>
                                        @if(!empty($categories) && $categories->count() > 0)
                                            @foreach($categories as $category)
                                                <li class="nk-menu-heading mt-2">
                                                    <h6 class="overline-title text-primary-alt fw-normal">{{ $category->name }}</h6>
                                                </li>
                                                @if(!empty($categories) && $categories)
                                                    @foreach($category->spaces as $space)
                                                        <li class="nk-menu-item fw-normal">
                                                            <a href="{{route('store.community', [$slug, $space->slug])}}" class="nk-menu-link">
                                                                <span class="fs-16px me-2">&#128308;</span>
                                                                <span class="nk-menu-text fw-normal">{{ $space->title }}</span>
                                                                <span class="rm__cm__sidebar__link__total fs-11px fw-normal">82</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>