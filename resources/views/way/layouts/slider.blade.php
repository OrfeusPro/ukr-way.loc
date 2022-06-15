@if(isset($slider) && $slider)
	<!-- Inspiro Slider -->
	<div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="560">

		@foreach ($slider as $slide)
			<div class="slide kenburns" style="background-image:url('{{ Voyager::image($slide['img']) }}');">
				<div class="bg-overlay"></div>
				<div class="container-wide">
					<div class="slide-captions text-center">
						<!-- Captions -->
						@if ($slide['title'])
							<h2 data-caption-animation="zoom-out">{{ $slide['title'] }}</h2>
						@endif
						@if ($slide['description'])
							<p class="lead">{!! $slide['description'] !!}</p>
						@endif
						{{-- <div data-caption-animation="zoom-out">
							<a href="https://www.youtube.com/watch?v=nrJtHemSPW4" data-lightbox="iframe" class="btn btn-rounded">
								{!! $slide['btn'] !!}</a>
						</div> --}}
						<!-- end: Captions -->
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<!--end: Inspiro Slider -->
@endif