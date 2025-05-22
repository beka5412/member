<div class="col-lg-12 mt-4 mb-4">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="project-head mb-4">
                <a class="project-title">
                    <div class="user-avatar sm sq">
                        <img src="{{ asset(Storage::url('uploads/profile/' . (!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'avatar.png'))) }}" alt="">
                    </div>
                    <div class="project-info">
                        <h6 class="title">gabriel Ribeiro <small>33 min ago</small></h6>
                        <span class="sub-text">Posted in Dúvidas</span>
                    </div>
                </a>
            </div>
            <div class="mt-2 mb-4">
                <h5 class="card-title">Call com membros estilo Discord</h5>
            </div>
            <p class="card-text">
                <div>
                    <div class="text-light mb-5">
                        <p>Olá! Gostária de saber se é possível crir uma chamada de voz semelhante ao Discord nesta comunidade. Acredito que eria uma adição incrível para networking, já poderia facilitar a troca de ideias que podem ser transformadores para nossos negócios.</p>
                    </div>
                </div>
            </p>
            <div class="post-like">
                <div class="post-users d-flex mb-5">
                    @for($i = 0; $i < 3; $i++)
                        <div class="user-avatar xs sq" style="margin-right: 4px;">
                            <img src="https://community.wpultimo.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBeGg3UVE9PSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--9fecfe625fcfbcae69496644b32dc5bb0ca363c3/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDRG9MWm05eWJXRjBTU0lKYW5CbFp3WTZCa1ZVT2hSeVpYTnBlbVZmZEc5ZmJHbHRhWFJiQjJrQ0xBRnBBaXdCT2dwellYWmxjbnNHT2dwemRISnBjRlE9IiwiZXhwIjpudWxsLCJwdXIiOiJ2YXJpYXRpb24ifX0=--ef295ed08e817a599d692fd6d8761673d3ed547f/3x4.jpeg" alt="">
                        </div>
                    @endfor
                    <div style="margin-left: 6px;">
                        <span class="text-light">Comentado por Pedro e outras 13 pessoas</span>
                    </div>
                </div>
            </div>
            <div class="row mt-2 border-top">
                <div class="col-lg-12 mt-4 d-flex justify-content-between">
                    <div class="d-flex">
                        <a class="me-4" onclick="activity_like('like')" class="">
                            <p class="text-light">
                                <em class="icon ni ni-thumbs-up text-light"></em>
                                <span id="like_number">Curtir</span>
                            </p>
                        </a>
                        <a onclick="activity_like('like')" class="">
                            <p class="text-light">
                                <em class="icon ni ni-comments text-light"></em>
                                <span id="like_number">Comentários</span>
                            </p>
                        </a>
                    </div>
                    <div>
                        <span class="text-light">6 comentários</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div id="posts-container">
    @if(!empty($posts) && $posts->count() > 0)
        @foreach($posts as $post)
            <div class="col-lg-12 mt-4 mb-4">
                <div class="card card-bordered">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-inner">
                        <div class="mt-2 mb-4">
                            <h5 class="card-title">{{ $post->title }}</h5>
                        </div>
                        <div class="project-head">
                            <a class="project-title">
                                <div class="user-avatar md sq">
                                    <img src="{{ asset(Storage::url('uploads/profile/' . (!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'avatar.png'))) }}" alt="">
                                </div>
                                <div class="project-info">
                                    <h6 class="title">{{ $post->student->name }}</h6><small>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</small>
                                    <span class="sub-text">Posted in Dúvidas</span>
                                </div>
                            </a>
                        </div>
                        <div class="community__media" id="media">
                            @if(!empty($post->media[0]) && $post->media[0]->type == 'image')
                                <img width="100%" heigth="auto" src="{{ asset(Storage::url('uploads/community/media/image/' . $post->media[0]->media)) }}" class="card-img-top" alt="{{ $post->title }}">
                            @endif

                            @if(!empty($post->media[0]) && $post->media[0]->type == 'video')
                                <video width="100%" heigth="auto" controls>
                                    <source src="{{ asset(Storage::url('uploads/community/media/video/' . $post->media[0]->media)) }}" type="video/mp4">
                                </video>
                            @endif
                        </div>
                        <p class="card-text">
                            <div>
                                <div class="trix-content">
                                    {{ $post->description }}
                                </div>
                            </div>
                        </p>
                        <div class="project-meta">
                            <ul class="project-users g-1">
                                <li>
                                <div class="user-avatar sm bg-primary">
                                    <span>A</span>
                                </div>
                                </li>
                                <li>
                                <div class="user-avatar sm bg-blue">
                                    <img src="https://community.wpultimo.com/rails/active_storage/representations/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBeGg3UVE9PSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--9fecfe625fcfbcae69496644b32dc5bb0ca363c3/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdDRG9MWm05eWJXRjBTU0lKYW5CbFp3WTZCa1ZVT2hSeVpYTnBlbVZmZEc5ZmJHbHRhWFJiQjJrQ0xBRnBBaXdCT2dwellYWmxjbnNHT2dwemRISnBjRlE9IiwiZXhwIjpudWxsLCJwdXIiOiJ2YXJpYXRpb24ifX0=--ef295ed08e817a599d692fd6d8761673d3ed547f/3x4.jpeg" alt="">
                                </div>
                                </li>
                                <li>
                                <div class="user-avatar bg-light sm">
                                    <span>+12</span>
                                </div>
                                </li>
                                <li>Comentado por Pedro e outras 13 pessoas</li>
                            </ul>
                        </div>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-lg-12 d-flex mt-4">
                                <a style="cursor:pointer;" onclick="activity_like('like')" class="">
                                    <h6>
                                        <em class="icon ni ni-thumbs-up"></em>
                                        <span id="like_number">Curtir</span>
                                    </h6>
                                </a>
                                <a style="cursor:pointer; margin-left: 27px;" onclick="activity_like('like')" class="">
                                    <h6>
                                        <em class="icon ni ni-comments"></em>
                                        <span id="like_number">Comentários</span>
                                    </h6>
                                </a>
                            </div>
                            <p><small class="mt-2 d-block">0 pessoa(s) curtiram essa postagem</small></p>
                        </div>
                        <hr>
                        <div class="nk-reply-form">
                            <div class="nk-reply-form-editor">
                                <div class="nk-reply-form-field">
                                <textarea class="form-control form-control-simple no-resize" placeholder="Hello"></textarea>
                                </div>
                            </div>
                            <div class="nk-reply-form-tools">
                                <ul class="nk-reply-form-actions g-1">
                                    <li class="me-2">
                                        <button class="btn btn-primary" type="submit">Send</button>
                                    </li>
                                    <li>
                                        <a class="btn btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Upload Attachment" data-bs-original-title="Upload Attachment">
                                        <em class="icon ni ni-clip-v"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-icon btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" href="#" aria-label="Upload Images" data-bs-original-title="Upload Images">
                                        <em class="icon ni ni-img"></em>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nk-reply-form-actions g-1">
                                <li>
                                    <a href="#" class="btn-trigger btn btn-icon me-n2">
                                    <em class="icon ni ni-trash"></em>
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div> -->