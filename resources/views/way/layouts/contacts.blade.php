<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h3 class="text-uppercase">КОНТАКТИ</h3>
				<p>{!! setting('site.contacts_short_company_desc') !!}</p>
				@if (setting('site.email'))
					<p>Email: <a href="to:{!! setting('site.email') !!}">{!! setting('site.email') !!}</a></p>
				@endif
				@if (setting('site.adress'))
					<p>Адреса: {!! setting('site.adress') !!}</p>
				@endif
				<div class="row widget-myaccount">
					@foreach ($tels as $tel)
						@if ($tel->in_menu)
							<div class="col-12">
								<a href="tel:{{ $tel->phone_full }}" class="pt-2" style="float:left; color:#484848;">{{ $tel->phone }}</a>
								@if ($tel->icon_viber || $tel->icon_whatsapp)
									<div class="pl-2 social-icons social-icons-colored-hover" style="float:left">
										<ul>
											@if ($tel->icon_viber)
												<li class="social-viber"><a href="viber://chat?number={{ $tel->phone_full }}" class="mt-1 mr-0 mb-0"><i
															class="fab fa-viber"></i></a></li>
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
				</div>


			</div>
			<div class="col-lg-6">
				<h3 class="text-uppercase">НАПИСАТИ НАМ</h3>
				<div class="m-t-30">
					<form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Им'я*</label>
								<input type="text" aria-required="true" name="widget-contact-form-name" required
									class="form-control required name" placeholder="Введіть Им'я">
							</div>
							<div class="form-group col-md-6">
								<label for="name">Телефон*</label>
								<input type="text" aria-required="true" name="widget-contact-form-name" required
									class="form-control required name" placeholder="38 (096) 123-45-67">
							</div>
						</div>
						<div class="form-group">
							<label for="message">Повідомлення*</label>
							<textarea type="text" name="widget-contact-form-message" required rows="5" class="form-control required"
							 placeholder="Введіть своє повідомлення"></textarea>
						</div>

						<button class="btn" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Надіслати повідомлення</button>
					</form>
				</div>

			</div>
		</div>
	</div>
</section>
