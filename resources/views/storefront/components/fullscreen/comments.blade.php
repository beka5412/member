@if($enable == 'on')
    <div class="row g-gs">
        <div class="nk-content">
            <div class="col-md-8">
                <h4 class="title">{{ __('Comments') }}</h4>
                <div class="mt-2 mb-5">
                    {{Form::open(array('method'=>'post','id'=>'formComments','enctype'=>'multipart/form-data'))}}
                        <div class="col-md-12">
                            <textarea class="form-control no-resize" name="comment" placeholder="Comentário" style="padding: 12px;"></textarea>
                        </div>
                        <div class="col-md-12">
                            <input class="btn btn-primary mt-4" data-bs-dismiss="modal" type="button" id="create_comment" value="Enviar" />
                        </div>
                    {{Form::close()}}
                </div>
                <div id="nk-comments">
                    @if (!empty($comments) && count($comments) > 0)
                        @foreach ($comments as $comment)
                            <div class="rm__comments border-bottom py-4" data-id="{{ $comment->id }}" data-student="{{ $student_id }}">
                                <div class="p-0" style="{{ ($comment->store !== null && $comment->store->approval_comments_required && $comment->store->approval_comments_required == 1 && $comment->user_id == $student_id && $comment->approved !== 1) ? 'opacity: 0.56' : '' }}">
                                    <div class="nk-reply-header">
                                        <div class="user-card">
                                            <div class="user-avatar sm">
                                                <img src="{{ asset(Storage::url('uploads/profile/' . (!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'avatar.png'))) }}">
                                            </div>
                                            <div class="user-name">
                                                <span>{{ $comment->student->name }}</span>
                                                @if($comment->store !== null && $comment->store->approval_comments_required && $comment->store->approval_comments_required == 1 && $comment->user_id == $student_id && $comment->approved !== 1)
                                                    <span style="margin-left: 6px;" class="bg-danger-dim fs-10px p-1 text-danger">Aprovação necessária</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="date-time">
                                            <span class="d-block">
                                                {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="nk-reply-body">
                                        <div class="nk-reply-entry entry comment_entry">
                                            <div class="comment__container">
                                                {{ $comment->comment }}
                                            </div>
                                            <span class="d-flex gap-3 py-3 comment__buttons">
                                                @if($comment->user_id == $student_id && $comment->approved !== 1)
                                                    <a class="fs-14px" style="cursor:pointer;" id="rm__del">
                                                        <em class="icon ni ni-trash"></em>
                                                        <span>Excluir</span>
                                                    </a>
                                                    <a class="fs-14px" style="cursor:pointer;" id="rm__edit">
                                                        <em class="icon ni ni-edit"></em>
                                                        <span>Editar</span>
                                                    </a>
                                                @endif
                                                <a class="fs-14px" style="cursor:pointer;" id="rm__reply">
                                                    <em class="icon ni ni-reply-fill"></em>
                                                    <span>Responder</span>
                                                </a>
                                                <a class="fs-14px" style="cursor:pointer;" id="rm__like" data-type="comment">
                                                    <em class="icon ni ni-thumbs-up"></em>
                                                    <span>Curtir</span>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($comment->replies) && count($comment->replies) > 0)
                                    @foreach($comment->replies as $reply)
                                        <div class="py-1 mb-4 mt-2" style="padding-left: 2.5rem;">
                                            <div class="nk-reply-header">
                                                <div class="user-card">
                                                    <div class="user-avatar sm">
                                                        <img src="{{ asset(Storage::url('uploads/profile/' . (!empty(Auth::user()->avatar) ? Auth::user()->avatar : 'avatar.png'))) }}">
                                                    </div>
                                                    <div class="user-name">
                                                        <span>{{ $reply->owner->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="date-time">{{ \Carbon\Carbon::parse($reply->created_at)->diffForHumans() }}</div>
                                            </div>
                                            <div class="nk-reply-body comment_entry">
                                                <div class="nk-reply-entry entry">
                                                    {{ $reply->comment }}
                                                </div>
                                                <span class="d-flex gap-3 py-3">
                                                    @if($comment->user_id == $student_id && $comment->approved !== 1)
                                                        <a class="fs-14px" style="cursor:pointer;" id="rm__del">
                                                            <em class="icon ni ni-trash"></em>
                                                            <span>Remover</span>
                                                        </a>
                                                        <a class="fs-14px" style="cursor:pointer;" id="rm__edit">
                                                            <em class="icon ni ni-edit"></em>
                                                            <span>Editar</span>
                                                        </a>
                                                    @endif
                                                    <a class="fs-14px" style="cursor:pointer;" id="rm__reply">
                                                        <em class="icon ni ni-reply-fill"></em>
                                                        <span>Responder</span>
                                                    </a>
                                                    <a class="fs-14px" style="cursor:pointer;" id="rm__like" data-type="reply">
                                                        <em class="icon ni ni-thumbs-up"></em>
                                                        <span>Curtir</span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif