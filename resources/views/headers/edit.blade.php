{{Form::model($header,array('route' => array('headers.update',[$header->id,$course_id]), 'method' => 'PUT', 'enctype'=>'multipart/form-data')) }}
<div class="row">
    <div class="form-group col-lg-12 col-md-12">
        {!! Form::label('title', __('Header'),['class'=>'form-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control','required' => 'required']) !!}
    </div>
    <div class="form-group col-lg-6">                                
        <div class="mb-2">
            <label for="thumbnail" class="form-label">{{ __('Upload thumbnail') }}</label>
            <input type="file" class="form-control mb-2" name="thumbnail" id="thumbnail" aria-label="file thumbnail" data-id="_upload">
            <div id="preview">
                <img src="{{ (!empty($header->thumbnail)) ? asset(Storage::url('uploads/modules/preview_image/'.$header->thumbnail)) : '' }}" id="blah" width="25%"/>
            </div>
            <div id="new_preview">
                <img id="new_preview_img" width="25%"/>
            </div>
            <div class="invalid-feedback">{{ __('invalid form file') }}</div>
        </div>
    </div>
    <div class="form-group col-md-12 col-lg-12">
        {{Form::label('description',__('Short description'),['class'=>'form-label'])}}
        <textarea class="form-control tinymce-toolbar" name="description">{{ $header->description }}</textarea>
    </div>
    <div class="form-group col-md-12">
        <div class="custom-control custom-switch">
            <input type="checkbox" name="hide_module" class="custom-control-input" id="hide_module" {{ ($header->hide == 'on') ? 'checked' : '' }}>
            <label class="custom-control-label" for="hide_module">{{ __('Hide Module') }}</label>
        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary" id="submit-all">
    </div>

</div>
{!! Form::close() !!}

