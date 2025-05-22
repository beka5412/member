{!! Form::open(['route' => 'community.category.store','method' => 'post']) !!}
    <div class="row">
        <div class="form-group col-lg-12 col-md-12">
            {!! Form::label('name', __('Name'),['class'=>'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
        </div>
        <div class="modal-footer">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
            <input type="submit" value="{{ __('Save') }}" class="btn btn-primary" id="submit-all">
        </div>
    </div>
{!! Form::close() !!}

