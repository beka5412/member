<div>
    {{ Form::open(['route' => 'comment.settings','method' => 'post', 'enctype'=>'multipart/form-data']) }}
    <div class="row g-gs">
        <div class="col-12">
            <div class="col-sm-6 mt-5">
                <span class="preview-title overline-title">{{ __('Approval comments') }}</span>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" value='1' name="approval_comments" id="approval_comments" {{ ($store->approval_comments_required == 1) ? 'checked' : '' }} />
                    <label class="custom-control-label" for="approval_comments">Sim</label>
                </div>
            </div>
        </div>
        <div class="col-sm-12 d-flex justify-end">
            {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
        </div>
    </div>
    {{ Form::close() }}
</div>