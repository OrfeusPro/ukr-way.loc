{{-- <section id="page-title" class="text-light" data-style="3" data-bg-parallax="{{ Voyager::image($route['img']) }}">
	<div class="bg-overlay"></div>
	<div class="container">
		<div class="page-title">
			<h1 class="text-uppercase">{{ $route->title }}</h1>
		</div>
		<div class="breadcrumb">
			<ul>
				<li><a href="{{ route('home') }}">Головна</a>
				</li>
				<li><a href="{{ route('country_all') }}">Маршрути</a>
				</li>
				<li class="active"><a
						href="{{ route('country', $route->to_countries->first()->alias) }}">{{ $route->to_countries->first()->title }}</a>
				</li>
			</ul>
		</div>
	</div>
</section> --}}

{{-- {{ $route->title }}
{{ $route->descr }}
{{ $route->img }}
{{ $route->from_countries->first()->title }}
{{ $route->to_countries->first()->title }}
{{ $route->r_from }}
{{ $route->r_from_price }}
{{ $route->r_from_time }}
{{ $route->r_from_place }}
{{ $route->r_to }}
{{ $route->r_to_price }}
{{ $route->r_to_time }}
{{ $route->r_to_place }}
{{ $route->towns }}
{{ $route->map }}
{{ $route->time_from_back }}
{{ $route->time_to_back }}
{{ $route->title_content }}
{{ $route->content }} --}}

<!-- SHOP PRODUCT PAGE -->
<section id="product-page" class="product-page pt-3 p-b-0">
	<div class="container">
		<div class="breadcrumb">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}"><i class="fa fa-home"></i></a> </li>
					<li class="breadcrumb-item"><a href="{{ route('country_all') }}">Маршрути</a></li>
					<li class="breadcrumb-item"><a
							href="{{ route('country', $route->to_countries->first()->alias) }}">{{ $route->to_countries->first()->title }}</a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">{{ $route->title }}</li>
				</ol>
			</nav>
		</div>

		<div class="product">
			<div class="row m-b-40">
				<div class="col-lg-5">
					<div class="product-image">
						<!-- Carousel slider -->
						<div class="carousel dots-inside dots-dark"
							data-flickity='{ "freeScroll": true, "contain": true, "prevNextButtons": false, "pageDots": false }'
							data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut"
							data-autoplay="2500" data-lightbox="gallery">
							<a href="{{ Voyager::image($route['img']) }}" data-lightbox="image" title="{{ $route->title }}"><img
									alt="{{ $route->title }}" src="{{ Voyager::image($route['img']) }}">
							</a>
						</div>
						<!-- Carousel slider -->
					</div>
					{{-- <div class="pt-3 carousel" data-items="4" data-xs-items="4" data-loop="false" data-autoplay="true"
						data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2500" data-pageDots="false"
						data-lightbox="gallery"> --}}


					@php $images = json_decode($GlobalSetting->imgs); @endphp

					<div class="row pt-3 pr-3 pl-3" data-lightbox="gallery">
						@foreach ($images as $image)
							<div class="col-2 pt-1 pb-1 pr-1 pl-1">
								<a href="{{ Voyager::image($image) }}" data-lightbox="gallery-image">
									<img class="w-100" src="{{ Voyager::image($GlobalSetting->getThumbnail($image, 'cropped')) }}">
								</a>
							</div>
						@endforeach
					</div>
					{{-- </div> --}}

				</div>
				<div class="col-lg-7">
					<div class="product-description">
						<div class="product-category">{{ $route->to_countries->first()->title }}</div>
						<div class="product-title left">
							<h3>{{ $route->r_from }} - {{ $route->r_to }}</h3>
						</div>
						<div class="right text-right">
							ТУДИ:
							<ins>
								<b>
									@if ($route->r_from_price)
										{{ $route->r_from_price }} грн.
									@else
										Ціну уточнюйте
									@endif
								</b>
							</ins>
							<br>
							НАЗАД:
							<ins>
								<b>
									@if ($route->r_from_price)
										{{ $route->r_from_price }} грн.
									@else
										Ціну уточнюйте
									@endif
								</b>
							</ins>
						</div>

						{{-- <div class="product-reviews"><a href="#">3 customer reviews</a>
						</div> --}}
						<div class="seperator m-b-10"></div>
						<div class="widget">
							<h4 class="widget-title">Міста через які проходить маршрут</h4>
							<p>{!! str_replace("\r\n", ' > ', $route->towns) !!}</p>
						</div>
						<div class="seperator m-t-20 m-b-10"></div>
					</div>

				</div>
			</div>

		</div>
	</div>
</section>
<!-- end: SHOP PRODUCT PAGE -->


<!-- Page Content -->
<section id="page-content" class="background-light">
	<div class="container">
		<div class="grid-layout grid-3-columns" data-item="grid-item" data-margin="10">

			<div class="grid-item">
				<!--Services-->
				<div class="widget clearfix widget-categories p-cb">
					<h4 class="widget-title">Міста через які проходить маршрут</h4>
					<ul class="list list-arrow-icons">
						{!! str_replace("\r\n", ' > ', $route->towns) !!}
					</ul>
				</div>
				<!--End: Services-->
			</div>

		</div>
	</div>
</section>
