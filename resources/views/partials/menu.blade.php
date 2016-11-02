<?php 
	$menul0 = $site_menus->where('menu_id', $menu_id)->where('parent_id', 0);
 ?>
<ul>
	@foreach($menul0 as $link)
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