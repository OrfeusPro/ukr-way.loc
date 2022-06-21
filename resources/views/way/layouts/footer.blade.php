<!-- Footer -->
<footer id="footer">
	<div class="footer-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="widget">
						<img class="w-100" style="max-width:200px;" src="{{ Voyager::image(setting('site.logo')) }}">
						<p>{!! setting('site.short_company_desc') !!}</p>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-3">
							<div class="widget">
								<div class="widget-title">МАРШРУТИ</div>
								<ul class="list">
									<li><a href="{{ route('country_all') }}">Всі маршрути</a></li>
									@foreach ($main_countries as $country)
										@php
											$routes = $country
											->marshrut()
											->where('is_show', 1)
											->orderBy('sort', 'asc')
											->get();
										@endphp
										@if (!$routes->isEmpty())
											<li><a href="{{ route('country', $country->alias) }}">{{ $country->title }}</a></li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="widget">
								<div class="widget-title">КОНТАКТИ</div>
								@if (!$tels->isEmpty())
									<div class="row">
										@foreach ($tels as $tel)
											@if ($tel->in_footer)
												<div class="col-12">
													<a href="tel:{{ $tel->phone_full }}" style="float:left">{{ $tel->phone }}</a>
													@if ($tel->icon_viber || $tel->icon_whatsapp || $tel->icon_telegram)
														<div class="pl-2 social-icons social-icons-colored-hover" style="float:left">
															<ul>
																@if ($tel->icon_viber)
																	<li class="social-viber"><a href="viber://chat?number={{ $tel->phone_full }}"
																			class="mt-1 mr-0 mb-0"><i class="fab fa-viber"></i></a></li>
																@endif
																@if ($tel->icon_telegram)
																	<li class="social-telegram"><a href="tg://resolve?phone={{ $tel->phone_full }}" class="mt-1 mr-0 mb-0"><i
																			class="fab fa-telegram-plane"></i></a></li>
																@endif
																@if ($tel->icon_whatsapp)
																	<li class="social-whatsapp"><a href="whatsapp://send?phone={{ $tel->phone_full }}"
																			class="mt-1 mr-0 mb-0"><i class="fab fa-whatsapp"></i></a></li>
																@endif
															</ul>
														</div>
													@endif
												</div>
											@endif
										@endforeach

										@if(setting('site.facebook') || setting('site.instagram'))
										<div class="col-12">
											<div class="widget-title pt-3 mb-3">СОЦ. МЕРЕЖІ</div>
											<div class="left social-icons social-icons-colored-hover pb-3">
												<ul>
													@if(setting('site.facebook'))<li class="social-facebook"><a href="{{ setting('site.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>@endif
													@if(setting('site.instagram'))<li class="social-instagram"><a href="{{ setting('site.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>@endif
												</ul>
											</div>
										</div>
										@endif
									</div>
								@endif
							</div>
						</div>

						<div class="col-lg-5">
							<div class="widget widget-gallery p-cb mt-0">
								<h4 class="widget-title">Наші маршрутки</h4>
								<div data-lightbox="gallery">

									@php $images = json_decode($GlobalSetting->imgs); @endphp

									@foreach ($images as $image)
										<a href="{{ Voyager::image($image) }}" data-lightbox="gallery-image">
											<img alt="image" src="{{ Voyager::image($GlobalSetting->getThumbnail($image, 'cropped')) }}">
										</a>
									@endforeach

								</div>
							</div>

						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
	<div class="copyright-content">
		<div class="container">
			<div class="copyright-text text-center">{{ setting('site.copyright') }}</div>
		</div>
	</div>
</footer>
<!-- end: Footer -->
