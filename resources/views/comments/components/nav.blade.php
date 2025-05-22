<ul class="nav nav-tabs">
    @foreach($tabs as $tab)
        <li class="nav-item">
            <a class="nav-link @if($loop->first) active @endif" data-bs-toggle="tab" href="#{{ $tab['id'] }}">
                <span>{{ $tab['name'] }}</span>
            </a>
        </li>
    @endforeach
</ul>