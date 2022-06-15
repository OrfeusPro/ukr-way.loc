
	<section id="page-title" class="text-light" data-style="3" data-bg-parallax="{{ Voyager::image($route['img']) }}">
		<div class="bg-overlay"></div>
		<div class="container">
			<div class="page-title">
				<h1 class="text-uppercase">{{ $route->title }}</h1>
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
