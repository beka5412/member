<div class="card card-bordered">
    <div class="row px-4 py-2">
        <div class="pt-2 mb-2">
            <h6 class="title">Trending posts</h6>
        </div>
        @for($i = 0; $i < 5; $i++)
            <div class="mt-3 d-block">
                <div class="mb-2">
                    <div class="row justify-between">
                        <div class="col">
                            <div class="d-flex">
                                <div class="me-2">
                                    <div class="d-flex">
                                        <div class="user-avatar sm sq">
                                            <img src="{{ asset(Storage::url('uploads/profile/' . (!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'avatar.png'))) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p style="line-height: 1;">Fechamento Agosto! <br><span class="fs-12px mt-2 d-block">Sidia Almeida</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>