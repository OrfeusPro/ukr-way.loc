@include(env('THEME_RESOURCES').'.parts.bread')

<section class="background-grey">
	<div class="container">
		@if (isset($title) && $title)
			<div class="heading-text heading-section text-center">
				<h2>{{ $title }}</h2>
			</div>
		@endif
		<div class="row team-members">

			@foreach ($routes as $route)
				<div class="col-lg-4">
					@include(env('THEME_RESOURCES').'.parts.route_item')
				</div>
			@endforeach

		</div>
	</div>
</section>