<section class="background-grey">
	<div class="container">
		<div class="heading-text heading-section text-center">
			<h2>ПОПУЛЯРНІ МАРШРУТИ</h2>
			{{-- <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.
			</p> --}}
		</div>
		<div class="row team-members">

			@foreach ($routes as $route)

			<div class="col-lg-4">
				<div class="team-member">
					<div class="team-image">
						<img src="{{ Voyager::image($route['img']) }}">
					</div>
					<div class="team-desc">
						<h3>{{ $route->title }}</h3>
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
						{{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p> --}}
						
						<div class="align-center">
							<a href="#" type="button" class="btn btn-light btn-sm">Детальніше</a>
						</div>
					</div>
				</div>
			</div>

			@endforeach

		</div>
	</div>
</section>



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

								{{-- <div class="product-rate">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</div>
							<div class="product-reviews"><a href="#">6 customer reviews</a>
							</div> --}}
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
{{-- 
<section id="page-content">
	<div class="container">
		<!-- Blog -->
		<div id="blog" class="grid-layout post-4-columns m-b-0" data-item="post-item">

			@foreach ($routes as $route)
				<div class="post-item border">
					<div class="post-item-wrap">
						<div class="post-image">
							<a href="#">
								<img alt="" src="{{ Voyager::image($route['img']) }}">
							</a>
							<span class="post-meta-category"><a href="">{{ $route->to_countries->first()->title }}</a></span>
						</div>
						<div class="post-item-description">
							<h2><a href="#">{{ $route->title }}</a></h2>
						</div>
					</div>
				</div>
			@endforeach

		</div>
	</div>
</section> --}}
