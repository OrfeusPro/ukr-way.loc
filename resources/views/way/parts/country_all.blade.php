
	<section id="page-title" class="text-light" data-style="3" data-bg-parallax="">
		<div class="bg-overlay"></div>
		<div class="container">
			<div class="page-title">
				<h1 class="text-uppercase">Маршрути</h1>
			</div>
			<div class="breadcrumb">
				<ul>
					<li><a href="{{ route('home') }}">Головна</a>
					</li>
					<li class="active"><a href="{{ route('country_all') }}">Маршрути</a>
					</li>
				</ul>
			</div>
		</div>
	</section>

@foreach ($countries as $country)
	@php
		$routes = $country
		->marshrut()
		->where('is_show', 1)
		->orderBy('sort', 'asc')
		->get();
	@endphp
	@if (!$routes->isEmpty())
		<section class="background-grey pb-3 pt-3">
			<div class="container">
				@if (isset($country->title) && $country->title)
					<div class="heading-text heading-section text-center">
						<h2>{{ $country->title }}</h2>
					</div>
				@endif
				<div class="row team-members">

					@foreach ($routes as $route)
						<div class="col-lg-3">
							@include(env('THEME_RESOURCES') . '.parts.route_item')
						</div>
					@endforeach

				</div>
			</div>
		</section>
	@endif
@endforeach
