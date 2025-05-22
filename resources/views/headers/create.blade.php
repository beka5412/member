{!! Form::open(array('route' => array('headers.store', $id), 'method' => 'POST', 'enctype'=>'multipart/form-data')) !!}
<div class="row">
    <div class="form-group col-lg-12 col-md-12">
        {!! Form::label('title', __('Module Title'),['class'=>'form-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control','required' => 'required']) !!}
    </div>
    <div class="form-group col-lg-6">                                
        <div class="form-file mb-2">
            <label for="preview_image" class="form-label">{{ __('Upload preview image') }}</label>
            <input type="file" class="form-control mb-2" name="preview_image" id="preview_image" aria-label="file example" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <img src="" id="blah" width="25%"/>
            <div class="invalid-feedback">{{ __('invalid form file') }}</div>
        </div>
    </div>
    <div class="form-group col-md-12 col-lg-12">
        {{Form::label('description',__('Short description'),['class'=>'form-label'])}}
        <textarea class="form-control tinymce-toolbar" name="description"></textarea>
    </div>
    <div class="form-group col-md-12">
        <div class="custom-control custom-switch">
            <input type="checkbox" name="hide_module" class="custom-control-input" id="hide_module">
            <label class="custom-control-label" for="hide_module">{{ __('Hide Module') }}</label>
        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary" id="submit-all">
    </div>
</div>
{!! Form::close() !!}
