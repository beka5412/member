<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">@yield('title')</h3>
                                    <nav>
                                        <ul class="breadcrumb">
                                            @yield('breadcrumb')
                                        </ul>
                                    </nav>
                                </div>
                                <div class="nk-bloxk-head-content">
                                    @yield('action-btn')
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-12">
                                @yield('filter')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            @yield('content')
        </div>
    </div>
</div>
