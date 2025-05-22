<div class="tab-content">
    @foreach($tabs as $tab)
        @php
            $view = 'comments.components.panels.' . $tab['id'];
        @endphp
        <div class="tab-pane @if($loop->first) active @endif" id="{{ $tab['id'] }}">
            @php
                $view = 'comments.components.panels.' . $tab['id'];
            @endphp
            @component($view)
                @slot('id', $tab['id'])
                @slot('comments', $data[$tab['id']])
                @slot('store', $store)
            @endcomponent
        </div>
    @endforeach
</div>