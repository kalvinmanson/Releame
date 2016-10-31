<?php $menu = $site_menus->find($menu_id) ?>
<ul>
	@foreach($menu->links->where('parent_id', 0) as $link)
	<li>{{ $link->name }}
		@if ($link->children->count() > 0)
			<ul>
			@foreach ($link->children as $linkl2)
				<li>{{ $linkl2->name }}</li>
			@endforeach
			</ul>
		@endif
	</li>
	@endforeach
</ul>