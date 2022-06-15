<section class="background-grey">
	<div class="container">
		<div class="heading-text heading-section text-center">
			<h2>ПОПУЛЯРНІ МАРШРУТИ</h2>
		</div>
		<div class="row team-members">

			@foreach ($routes as $route)

			<div class="col-lg-4">
				<div class="team-member">
					<a href="#">
						<div class="team-image">
							<img src="{{ Voyager::image($route['img']) }}">
						</div>
					</a>
					<div class="team-desc">
						<h3><a href="#">{{ $route->title }}</a></h3>
						<span>{{ $route->to_countries->first()->title }}</span>
						<div class="row pb-3 pt-3">
							<div class="col-6">
								<div>ТУДИ</div>
								<span class="price text-left">
									@if ($route->r_from_price)
										{{ $route->r_from_price }} грн.
									@else
										Ціну уточнюйте
									@endif 
								</span>
							</div>
							<div class="col-6">
								<div>НАЗАД</div>
								<span class="price text-right">
									@if ($route->r_from_price)
										{{ $route->r_from_price }} грн.
									@else
										Ціну уточнюйте
									@endif 
								</span>
							</div>
						</div>

						<div class="align-center">
							<a href="#" type="button" class="btn btn-light">Детальніше</a>
						</div>
					</div>
				</div>
			</div>

			@endforeach

		</div>
	</div>
</section>

{{-- 

<section>
	<div class="container">
		<div class="heading-text text-center m-b-20 animated fadeInUp visible" data-animate="fadeInUp">
			<h4>ПОПУЛЯРНІ МАРШРУТИ</h4>
		</div>
		<div class="shop">
			<div class="grid-layout grid-4-columns" data-item="grid-item">
				@foreach ($routes as $route)
					<div class="grid-item">
						<div class="product">
							<div class="product-image">
								<a href="#"><img alt="Shop product image!" src="{{ Voyager::image($route['img']) }}"></a>
								<span class="product-new">NEW</span>
								<span class="product-wishlist">
									<a href="#"><i class="fa fa-heart"></i></a>
								</span>
								<div class="product-overlay">
									<a href="shop-product-ajax-page.html" data-lightbox="ajax">Перейти</a>
								</div>
							</div>
							<div class="product-description">
								<div class="product-category">{{ $route->to_countries->first()->title }}</div>
								<div class="product-title" style="max-width: 100%;">
									<h3><a href="#">{{ $route->title }}</a></h3>
								</div>

							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section> --}}
