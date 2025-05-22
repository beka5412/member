@if ($paginator->hasPages())
<div class="card-inner">
    <div class="nk-block-between-md g-3">
        <div class="g">
            <ul class="pagination justify-content-center justify-content-md-start">
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
            </ul><!-- .pagination -->
        </div>
        <div class="g">
            <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                <div>{{ $paginator->count() }} de {{ $paginator->total() }} items</div>
            </div>
        </div>
    </div>
</div>
@endif