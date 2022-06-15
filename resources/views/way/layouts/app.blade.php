<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>{{ isset($title) ? $title : '' }}</title>
	<meta name="description" content="{{ isset($meta_desc) ? $meta_desc : '' }}">
	<link rel="icon" type="image/png" href="{{ asset('/storage') }}/{{ setting('site.favicon') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Document title -->
	<!-- Stylesheets & Fonts -->
	<link href="{{ ver_asset(env('THEME').'css/plugins.css') }}" rel="stylesheet">
	<link href="{{ ver_asset(env('THEME').'css/style.css') }}" rel="stylesheet">
	<link href="{{ ver_asset(env('THEME').'css/custom.css') }}" rel="stylesheet">
	<link href="{{ ver_asset(env('THEME').'css/xxx.css') }}" rel="stylesheet">
</head>

<body>
	<!-- Body Inner -->
	<div class="body-inner">
		@include(env('THEME_RESOURCES') . '.layouts.navigation')
		@include(env('THEME_RESOURCES') . '.layouts.slider')
		@yield('content')


		<!--Modal -->
		<div class="modal fade" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true"
			style="display: none;">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modal-label">Замовити зворотній дзвінок</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 text-center">
								<form>
									<div class="form-group row">
										<div class="col-12">
											<input class="form-control" placeholder="Им`я" type="text" value="" id="example-text-input">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12">
											<input class="form-control" placeholder="Телефон" type="tel" value="" id="example-tel-input">
										</div>
									</div>
									<button type="button" class="btn btn-sm btn-b">Відправити</button>
								</form>
							</div>
						</div>
					</div>
					{{-- <div class="modal-footer">
					<button type="button" class="btn btn-b" data-dismiss="modal">Close</button>
				</div> --}}
				</div>
			</div>
		</div>
		<!-- end: Modal -->

		@include(env('THEME_RESOURCES') . '.layouts.footer')
	</div>
	<!-- end: Body Inner -->

	<!-- Scroll top -->
	<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

	@yield('footer_scripts')


	<!--Plugins-->
	<script src="{{ ver_asset(env('THEME').'js/jquery.js') }}"></script>
	<script src="{{ ver_asset(env('THEME').'js/plugins.js') }}"></script>

	<!--Template functions-->
	<script src="{{ ver_asset(env('THEME').'js/functions.js') }}"></script>

	<script>
	 $.ajaxSetup({
	  headers: {
	   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	 });
	</script>
	<script src="{{ ver_asset(env('THEME').'js/custom.js') }}"></script>



</body>

</html>
