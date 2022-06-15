		<!-- Topbar -->
		{{-- <div id="topbar" class="topbar-transparent topbar-fullwidth dark d-none d-xl-block d-lg-block"> --}}
		<div id="topbar" class="topbar-fullwidth white d-none d-xl-block d-lg-block">
			<div class="container-sm">
				<div class="row">
					<div class="col-md-12">
						@if (!$tels->isEmpty())
							<ul class="top-menu center text-center" style="line-height: 10px;">
								@foreach ($tels as $tel)
									@if ($tel->in_menu)
										<li><a href="tel:{{ $tel->phone_full }}" class="mr-0" style="float:left;">{{ $tel->phone }}</a>
											@if ($tel->icon_viber || $tel->icon_whatsapp)
												<div class="social-icons social-icons-colored-hover" style="float:left;">
													<ul>
														@if ($tel->icon_viber)
															<li class="social-viber"><a href="viber://chat?number={{ $tel->phone_full }}"><i
																		class="fab fa-viber"></i></a></li>
														@endif
														@if ($tel->icon_whatsapp)
															<li class="social-whatsapp"><a href="whatsapp://send?phone={{ $tel->phone_full }}"><i
																		class="fab fa-whatsapp"></i></a></li>
														@endif
													</ul>
												</div>
											@endif
											@if ($loop->iteration != count($tels))
												<span class="pl-1 pr-3" style="float:left; color: rgb(46, 46, 46); line-height: 40px;">|</span>
											@endif
										</li>
									@endif
								@endforeach
							</ul>
						@endif
					</div>
					{{-- <div class="col-md-2 d-none d-sm-block text-right align-self-center">
						<a href="#"  data-target="#modal" data-toggle="modal" class="btn btn-light btn-sm mb-0">Замовити дзвінок</a>
					</div> --}}
				</div>
			</div>
		</div>
		<!-- end: Topbar -->

		<!-- Header -->
		<header id="header" data-transparent="true" data-fullwidth="false" class="dark submenu-dark header-disable-fixed">
			<div class="header-inner">
				<div class="container">
					<!--Logo-->
					<div id="logo">
						<a href="./">
							<img class="logo-default" src="{{ Voyager::image(setting('site.logo')) }}">
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
															@if ($tel->icon_viber || $tel->icon_whatsapp)
																<div class="pl-2 social-icons social-icons-colored-hover" style="float:left;">
																	<ul>
																		@if ($tel->icon_viber)
																			<li class="social-viber"><a href="viber://chat?number={{ $tel->phone_full }}"
																					class="mt-1 mr-0 mb-0"><i class="fab fa-viber"></i></a></li>
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