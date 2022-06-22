		<!-- Topbar -->
		{{-- <div id="topbar" class="topbar-transparent topbar-fullwidth dark d-none d-xl-block d-lg-block"> --}}
		<div id="topbar" class="topbar-fullwidth white d-none d-xl-block d-lg-block">
			<div class="container-sm">
				<div class="row">
					<div class="col-md-12">
						@if (!$tels->isEmpty())
							<ul class="top-menu left" style="line-height: 10px;">
								@foreach ($tels as $tel)
									@if ($tel->in_menu)
										<li><a href="tel:{{ $tel->phone_full }}" class="mr-0" style="float:left;">{{ $tel->phone }}</a>
											@if ($tel->icon_viber || $tel->icon_whatsapp || $tel->icon_telegram)
												<div class="pl-1 social-icons social-icons-colored-hover" style="float:left;">
													<ul>
														@if ($tel->icon_viber)
															<li class="social-viber"><a href="viber://chat?number={{ $tel->phone_full }}"><i
																		class="fab fa-viber"></i></a></li>
														@endif
														@if ($tel->icon_telegram)
															<li class="social-telegram"><a href="tg://resolve?phone={{ $tel->phone_full }}"><i
																		class="fab fa-telegram-plane"></i></a></li>
														@endif
														@if ($tel->icon_whatsapp)
															<li class="social-whatsapp"><a href="whatsapp://send?phone={{ $tel->phone_full }}"><i
																		class="fab fa-whatsapp"></i></a></li>
														@endif
													</ul>
												</div>
											@endif
											@if ($loop->iteration != count($tels))
												<span class="pl-1 pr-1" style="float:left; color: rgb(46, 46, 46); line-height: 40px;">|</span>
											@endif
										</li>
									@endif
								@endforeach
							</ul>
						@endif
						{{-- <div class="col-md-1 d-none d-sm-block text-right align-self-center">
							<a href="#"  data-target="#modal" data-toggle="modal" class="btn btn-light btn-sm mb-0">Замовити дзвінок</a>
						</div> --}}

						@if(setting('site.facebook') || setting('site.instagram'))
                        <div id="soc_top" class="d-none d-sm-block right social-icons social-icons-colored-hover">
                            <ul>
                                @if(setting('site.facebook'))<li class="social-facebook"><a href="{{ setting('site.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>@endif
                                @if(setting('site.instagram'))<li class="social-instagram"><a href="{{ setting('site.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>@endif
                            </ul>
                        </div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!-- end: Topbar -->
@php
	if(Route::currentRouteName() == 'mroute' || Route::currentRouteName() == 'contacts' || Route::currentRouteName() == 'comments' || Route::currentRouteName() == 'about-us' || Route::currentRouteName() == 'thanks')
	{
		$base_menu = 1;
	}
	else {
		$base_menu = 0;
	}
@endphp

		<!-- Header -->
		@if($base_menu)
			<header id="header" data-transparent="false" data-fullwidth="false" class="dark submenu-dark header-disable-fixed">
		@else
			<header id="header" data-transparent="true" data-fullwidth="false" class="dark submenu-dark header-disable-fixed">
		@endif

			<div class="header-inner">
				<div class="container">
					<!--Logo-->
					<div id="logo" class="@if($base_menu) hb_logo @endif">
						<a href="{{ route('home') }}">
							<img class="logo-default"  src="{{ Voyager::image(setting('site.logo')) }}">
							<img class="logo-dark" src="{{ Voyager::image(setting('site.logo')) }}">
						</a>
					</div>
					<!--End: Logo-->

					<!--Navigation Resposnive Trigger-->
					<div id="mainMenu-trigger">
						<button class="lines-button x"> <span class="lines"></span> </button>
					</div>
					<!--end: Navigation Resposnive Trigger-->

					<!--Navigation-->
					<div id="mainMenu">
						<div class="container">
							<nav>
								{{ menu('Головне меню', 'way.layouts.menu') }}
							</nav>
						</div>

						<div class="container">
							<nav class="d-lg-none">

								<div class="contacts-list">

									<div class="contact-item">
										<div class="contact-title white">ТЕЛЕФОНИ:</div>
										<div class="phones">
											@if (!$tels->isEmpty())
												<ul class="top-menu">
													@foreach ($tels as $tel)
														<li class="align-self-center">
															<a href="tel:{{ $tel->phone_full }}" style="float:left;">{{ $tel->phone }}</a>
															@if ($tel->icon_viber || $tel->icon_whatsapp || $tel->icon_telegram)
																<div class="pl-2 social-icons social-icons-colored-hover" style="float:left;">
																	<ul>
																		@if ($tel->icon_viber)
																			<li class="social-viber"><a href="viber://chat?number={{ $tel->phone_full }}"
																					class="mt-1 mr-0 mb-0"><i class="fab fa-viber"></i></a></li>
																		@endif
																		@if ($tel->icon_telegram)
																			<li class="social-telegram"><a href="tg://resolve?phone={{ $tel->phone_full }}"
																					class="mt-1 mr-0 mb-0"><i class="fab fa-telegram-plane"></i></a></li>
																		@endif
																		@if ($tel->icon_whatsapp)
																			<li class="social-whatsapp"><a href="whatsapp://send?phone={{ $tel->phone_full }}"
																					class="mt-1 mr-0 mb-0"><i class="fab fa-whatsapp"></i></a></li>
																		@endif
																	</ul>
																</div>
															@endif
														</li>
													@endforeach
												</ul>
											@endif
										</div>

										@if(setting('site.facebook') || setting('site.instagram'))
											<div class="contact-title white">СОЦ. МЕРЕЖІ:</div>
											<div class="left social-icons social-icons-colored-hover pb-3">
												<ul>
													@if(setting('site.facebook'))<li class="social-facebook"><a href="{{ setting('site.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>@endif
													@if(setting('site.instagram'))<li class="social-instagram"><a href="{{ setting('site.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>@endif
												</ul>
											</div>
										@endif
									</div>
								</div>

							</nav>
						</div>
					</div>
					<!--end: Navigation-->


					<!--Dots Menu -->
					<nav id="dotsMenu">
						{{ menu('main_menu') }}
					</nav>
					<!--End: Dots Menu -->
				</div>

			</div>
		</header>
		<!-- end: Header -->