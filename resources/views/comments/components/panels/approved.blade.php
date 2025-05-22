@component('comments.components.filter')
@endcomponent
<div class="row g-gs">
    <div class="col-md-12">
        <div class="card" id="cards__{{ $id }}">
            @if(!empty($comments) && count($comments) > 0)
                @component('comments.components.cards')
                    @slot('id', 'aaproved')
                    @slot('comments', $comments)
                    @slot('store', $store)
                @endcomponent
            @else
                <div class="text-center">
                    <p>Você ainda não tem comentários pra responder</p>
                </div>
            @endif
        </div>
    </div>
</div>