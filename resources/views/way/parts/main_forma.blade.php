<section class="py-0">
	<div class="xs-py" data-bg-image="way/images/ua.jpg">
		


	<div class="container">
		<form action="./complete.php" method="post" id="mainform_action">
			<div class="row">
				<div class="col-12 col-md-10">
					<div class="row">
						<div class="col-12 col-md-3 xxs-mt-mobile">
							<input type="text" class="form-control" id="otkuda" name="otkuda" placeholder="ЗВІДКИ" list="routes"
								required>
							<datalist id="routes">
								@foreach ($dist_r_from as $from)
									<option value="{{ $from->r_from }}">
								@endforeach
								@foreach ($dist_r_to as $to)
									<option value="{{ $to->r_to }}">
								@endforeach
							</datalist>
						</div>
						<div class="col-12 col-md-3 xxs-mt-mobile">
							<input type="text" class="form-control" id="kuda" name="kuda" placeholder="КУДИ" list="routes2"
								required>
							<datalist id="routes2">
								@foreach ($dist_r_to as $to)
									<option value="{{ $to->r_to }}">
								@endforeach
								@foreach ($dist_r_from as $from)
									<option value="{{ $from->r_from }}">
								@endforeach
							</datalist>
						</div>
						<div class="col-12 col-md-3 xxs-mt-mobile">
							<input class="form-control" type="date" value="{{ date('Y-m-d') }}">
						</div>
						<div class="col-12 col-md-3 xxs-mt-mobile">
							<input type="tel" class="form-control" id="phone" name="phone" placeholder="38 (096) 123-45-67"
								required>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-2 xxs-mt-mobile">
					<button type="submit" class="btn w-100 mb-0">ЗАБРОНЮВАТИ</button>
				</div>
			</div>
		</form>
	</div>

</div>
</section>
