<div class="team-member">
	<a href="{{ route('mroute', $route['alias']) }}">
		<div class="team-image">
			<img src="{{ Voyager::image($route['img']) }}">
		</div>
	</a>
	<div class="team-desc">
		<h3><a href="{{ route('mroute', $route['alias']) }}" style="color:rgb(37, 37, 37);">{{ $route->title }}</a>
		</h3>
		<span><a href="{{ route('country', $route->to_countries->first()->alias) }}"
				style="color:#bbbbbb;">{{ $route->to_countries->first()->title }}</a></span>
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
			<a href="{{ route('mroute', $route['alias']) }}" type="button" class="btn btn-light">Детальніше</a>
		</div>
	</div>
</div>