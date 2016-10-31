<?php $menu = $site_menus->find($menu_id) ?>
<ul>
	@foreach($menu->links->where('parent_id', 0) as $link)
	<li><a href="{{ $link->link }}">{{ $link->name }}</a>
		@if ($link->children->count() > 0)
			<ul>
			@foreach ($link->children as $linkl2)
				<li><a href="{{ $linkl2->link }}">{{ $linkl2->name }}</a></li>
			@endforeach
			</ul>
		@endif
	</li>
	@endforeach
</ul>