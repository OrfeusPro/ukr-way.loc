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
