@if(!empty($comments))
    @foreach($comments as $comment)
    <div class="nk-msg-item current bg-lighter card-bordered rm__list__item" data-msg-id="1">
        <div class="user-avatar">
            <img src="{{ asset(Storage::url('uploads/profile/avatar.png')) }}">
        </div>
        <div class="nk-msg-info">
            <div class="nk-msg-from">
                <div class="nk-msg-sender">
                    <div>
                        <div class="name">
                            @isset($comment->student->name)
                                {{ $comment->student->name }}
                            @endisset
                        </div>
                        <div class="course">Criado na aula <strong>{{ $comment->chapter->name }} </strong>do curso: <strong>{{ Utility::courseByComment($comment->chapter_id) }}</strong></div>
                    </div>
                </div>
                <div class="nk-msg-meta">
                    <div class="date">{{ \Carbon\Carbon::parse($comment->created_at) }}</div>
                </div>
            </div>
            <div class="nk-msg-context">
                <div class="nk-msg-text">
                    <p>{{ $comment->comment }}</p>
                    <div class="rm__actions">
                        <a class="btn btn-sm btn-icon px-2 rm__action__link" data-id="el-dispatch"><em class="icon ni ni-reply-fill"></em> Responder</a>
                        @if($store->approval_comments_required == 1)
                            <a class="btn btn-sm btn-icon px-2 rm__action__link" id="comment_action" data-id="{{ $comment->id }}" data-action="approved" data-tab="{{ $id }}"><em class="icon ni ni-check-thick"></em> Aprovar</a>
                            <a class="btn btn-sm btn-icon px-2 rm__action__link" id="comment_action" data-id="{{ $comment->id }}" data-action="repproved" data-tab="{{ $id }}"><em class="icon ni ni-cross"></em> Reprovar</a>
                            <a class="btn btn-sm btn-icon px-2 rm__action__link" id="comment_action" data-id="{{ $comment->id }}" data-action="span">Spam</a>
                        @endif
                    </div>

                    <div class="rm__reply d-none" id="rm__reply">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-control-wrap" id="comment_reply" data-id="{{ $comment->id }}">
                                    <textarea class="form-control no-resize input_reply" placeholder="Digite seu comentário aqui"></textarea>
                                    <div class="col-lg-12 text-right text-end float-end mt-2">
                                        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary btn-submit" id="btn_reply" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
