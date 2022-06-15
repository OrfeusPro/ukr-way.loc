<ul>
	@foreach ($items as $menu_item)
		@if (!$menu_item->children()->get()->isEmpty())
			<li class="dropdown">
				<a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>

				<ul class="dropdown-menu">
					@foreach ($menu_item->children()->orderBy('order', 'asc')->get() as $sub_menu_item)
						@if (!$sub_menu_item->children()->get()->isEmpty())
							<li class="dropdown-submenu">
								<a href="{{ $sub_menu_item->link() }}">{{ $sub_menu_item->title }}</a>
								<ul class="dropdown-menu">
									@foreach ($sub_menu_item->children()->orderBy('order', 'asc')->get() as $sub_sub_menu_item)
										<li><a href="{{ $sub_sub_menu_item->link() }}">{{ $sub_sub_menu_item->title }}</a></li>
									@endforeach
								</ul>
							</li>
						@else
							<li><a href="{{ $sub_menu_item->link() }}">{{ $sub_menu_item->title }}</a></li>
						@endif
					@endforeach
				</ul>
			</li>
		@else
			<li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
		@endif
	@endforeach
</ul>
