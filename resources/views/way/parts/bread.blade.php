@if (isset($country) && $country)
	<section id="page-title" class="text-light" data-style="3" data-bg-parallax="{{ Voyager::image($country['img']) }}">
		<div class="bg-overlay"></div>
		<div class="container">
			<div class="page-title">
				<h1 class="text-uppercase">{{ $country->title }}</h1>
			</div>
			<div class="breadcrumb">
				<ul>
					<li><a href="{{ route('home') }}">Головна</a>
					</li>
					<li><a href="{{ route('country_all') }}">Маршрути</a>
					</li>
					<li class="active"><a href="{{ route('country', $country->alias) }}">{{ $country->title }}</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
@endif