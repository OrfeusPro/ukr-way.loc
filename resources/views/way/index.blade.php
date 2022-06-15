@extends(env('THEME_RESOURCES').'.layouts.app')

@section('slider')
	@if (isset($slider))
		{!! $slider !!}
	@endif
@endsection

@section('content')
	@if (isset($content))
		{!! $content !!}
	@endif
@endsection

@section('footer')
	@if (isset($footer))
		{!! $footer !!}
	@endif
@endsection

@section('footer_scripts')
	@if (isset($footer_scripts))
		{!! $footer_scripts !!}
	@endif
@endsection