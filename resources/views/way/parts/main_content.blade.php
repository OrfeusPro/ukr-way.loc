<section class="background-grey">
	<div class="container">
		<div class="heading-text heading-section text-center">
			<h2>ПРО НАС</h2>
		</div>

		@if (isset($GlobalSetting->main_text) && $GlobalSetting->main_text)
			<div class="single-post">
				<div class="post-item">
					<div class="post-item-description">
						{!! str_replace('<ul>', '<ul class="list-icon list-icon-arrow list-icon-colored">', $GlobalSetting->main_text) !!}
					</div>
				</div>
			</div>
		@endif
	</div>
</section>
