{!! Form::open(['route' => 'community.space.store','method' => 'post']) !!}
    <div class="row">
        <div class="form-group col-lg-12 col-md-12">
            {!! Form::label('title', __('Nome'),['class'=>'form-label']) !!}
            {!! Form::text('title', null, ['class' => 'form-control','required' => 'required']) !!}
        </div>
        <div class="form-group col-lg-12 col-md-12">
            {!! Form::label('title', __('Ícone'),['class'=>'form-label']) !!}
            
        </div>
        <div class="form-group col-lg-12 col-md-12">
            {!! Form::label('category', __('Categoria'),['class'=>'form-label']) !!}
            <div class="form-control-wrap ">
                <div class="form-control-select">
                    <select class="form-control" id="default-06" name="category_id">
                        <option value="days">{{ __('Select an option') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
            <input type="submit" value="{{ __('Save') }}" class="btn btn-primary" id="submit-all">
        </div>
    </div>
{!! Form::close() !!}