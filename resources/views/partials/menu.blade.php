@if (isset($global_links))
<ul class="menuid_{{ $menu_id }}">
	@foreach($global_links as $link)
		@if ($link->menu_id == $menu_id)
		<li><a href="{{ $link->link }}">{{ $link->name }}</a>
			@if ($link->children->count() > 0)
				<ul>
				@foreach ($link->children as $linkl2)
					<li><a href="{{ $linkl2->link }}">{{ $linkl2->name }}</a></li>
				@endforeach
				</ul>
			@endif
		</li>
		@endif
	@endforeach
</ul>
@endif