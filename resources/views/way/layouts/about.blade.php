<section class="background-grey">
	<div class="container">
		@if($page->title)
		<div class="heading-text heading-section text-center">
			<h2>{{ $page->title }}</h2>
		</div>
		@endif

		@if (isset($page->text) && $page->text)
			<div class="single-post">
				<div class="post-item about">
					<div class="post-item-description left">
						<img class="right photo xxs-pb-mobile" src="{{ Voyager::image($page->image) }}">
						{!! str_replace('<ul>', '<ul class="list-icon list-icon-arrow list-icon-colored">', $page->text) !!}
					</div>
				</div>
			</div>
		@endif
	</div>
</section>