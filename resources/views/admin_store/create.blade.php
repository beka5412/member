{{Form::open(array('url'=>'store-resource','method'=>'post'))}}
    <div class="row g-gs">
        <div class="col-12">
            <div class="form-group">
                {{Form::label('store_name',__('Store Name'), ['class'=>'form-label']) }}
                {{Form::text('store_name',null,array('class'=>'form-control mb-3','placeholder'=>__('Enter Store Name'),'required'=>'required'))}}
            </div>
        </div>
        @if(\Auth::user()->type == 'super admin')
        <div class="col-12">
            <div class="form-group">
                {{Form::label('name',__('Name'), ['class'=>'form-label']) }}
                {{Form::text('name',null,array('class'=>'form-control mb-3','placeholder'=>__('Enter Name'),'required'=>'required'))}}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                {{Form::label('email',__('Email'), ['class'=>'form-label']) }}
                {{Form::email('email',null,array('class'=>'form-control mb-3','placeholder'=>__('Enter Email'),'required'=>'required'))}}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                {{Form::label('password',__('Password'), ['class'=>'form-label']) }}
                {{Form::password('password',array('class'=>'form-control mb-3','placeholder'=>__('Enter Password'),'required'=>'required'))}}
            </div>
        </div>
        @endif
    </div>
    <div class="modal-footer">
        <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        {{Form::submit(__('Save'),array('class'=>'btn btn-primary'))}}
    </div>


{{Form::close()}}
