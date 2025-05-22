@extends('storefront.user.community')
@section('page-title')
    {{__('Community')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@section('head-title')
@endsection
@push('script-page')
	<script src="{{ asset('js/community/app.js'.'?ver'.time()) }}"></script>
@endpush
@section('sidebar')
	@component('storefront.components.community.sidebar')
		@slot('categories', $categories)
		@slot('slug', $slug)
	@endcomponent
@endsection
@section('content')
<div style="margin-top: 52px;">
	@component('storefront.components.community.blocks.topbar')
	@endcomponent
	<section class="container-fluid">
		<div class="nk-block nk-content">
			<div class="row g-gs">
				<div class="col-md-8">
					@component('storefront.components.community.banner')
					@endcomponent
					@component('storefront.components.community.cards')
						@slot('posts', $posts)
					@endcomponent
				</div>
				<div class="col-md-4">
					@component('storefront.components.community.trending')
					@endcomponent
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
