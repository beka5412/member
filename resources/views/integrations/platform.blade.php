<div class="col-md-6">
    <div class="card card-bordered {{ $name->name }}-platform">
        <div class="card-inner border-bottom">
            <div class="row g-gs">
                <div class="col-sm-3 ml-2 px-0">
                    <img src="{{ asset($name->logo_url) }}" id="blah4" width="140px" class="img_integration"> 
                </div>
                <div class="col-sm-9 d-flex align-items-center justify-content-end">
                    <div class="custom-control custom-switch checked">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2" {{ ($name->enabled == 'on') ? 'checked' : '' }} >
                        <!--<label class="custom-control-label" for="customSwitch2">{{ __('Activate') }}</label>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner card-text">
            <p>{{ $name->description }}</p>
            <div class="mt-2">
                <a href="/integrations/{{ $name->slug }}" class="btn btn-primary"><em class="icon ni ni-setting"></em><span>{{ __('Configure') }}</span></a>
            </div>
        </div>
    </div>
</div>