<!DOCTYPE html>
<html>
<head>
	<title>Drodmin</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery.fancybox.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('editor/css/froala_editor.min.css') !!}
    {!! Html::style('editor/css/froala_style.min.css') !!}
    {!! Html::style('editor/css/plugins/char_counter.css') !!}
    {!! Html::style('editor/css/plugins/code_view.css') !!}
    {!! Html::style('editor/css/plugins/colors.css') !!}
    {!! Html::style('editor/css/plugins/fullscreen.css') !!}
    {!! Html::style('editor/css/plugins/image.css') !!}
    {!! Html::style('editor/css/plugins/image_manager.css') !!}
    {!! Html::style('editor/css/plugins/line_breaker.css') !!}
    {!! Html::style('editor/css/plugins/table.css') !!}
    {!! Html::style('editor/css/plugins/video.css') !!}

    {!! Html::style('css/admin.css') !!}
    
</head>
<body>
	<div class="ttable">
		<div class="ttd sidebar">
			<h3>Drodmin v3</h3>
			<ul>
				<li><a href="{{ url('admin/pages') }}">Pages</a></li>
				<li><a href="{{ url('admin/categories') }}">Cetegories</a></li>
				<li><a href="{{ url('admin/pictures') }}">Pictures</a></li>
				<li><a href="{{ url('admin/menus') }}">Menús</a></li>
				<li><a href="{{ url('admin/links') }}">Links</a></li>
				<li><a href="{{ url('admin/users') }}">Users</a></li>
				<li><a href="{{ url('auth/logout') }}">Logout</a></li>
			</ul>
		</div>
		<div class="ttd content">
			<div class="paddcontent">
				@yield('content')
			</div>
		</div>
	</div>

	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/jquery.fancybox.pack.js') !!}
	{!! Html::script('editor/js/froala_editor.min.js') !!}
	<!-- /froala plugins -->
	{!! Html::script('editor/js/plugins/align.min.js') !!}
	{!! Html::script('editor/js/plugins/char_counter.min.js') !!}
	{!! Html::script('editor/js/plugins/code_beautifier.min.js') !!}
	{!! Html::script('editor/js/plugins/code_view.min.js') !!}
	{!! Html::script('editor/js/plugins/colors.min.js') !!}
	{!! Html::script('editor/js/plugins/entities.min.js') !!}
	{!! Html::script('editor/js/plugins/font_family.min.js') !!}
	{!! Html::script('editor/js/plugins/font_size.min.js') !!}
	{!! Html::script('editor/js/plugins/fullscreen.min.js') !!}
	{!! Html::script('editor/js/plugins/image.min.js') !!}
	{!! Html::script('editor/js/plugins/image_manager.min.js') !!}
	{!! Html::script('editor/js/plugins/inline_style.min.js') !!}
	{!! Html::script('editor/js/plugins/line_breaker.min.js') !!}
	{!! Html::script('editor/js/plugins/link.min.js') !!}
	{!! Html::script('editor/js/plugins/lists.min.js') !!}
	{!! Html::script('editor/js/plugins/paragraph_format.min.js') !!}
	{!! Html::script('editor/js/plugins/paragraph_style.min.js') !!}
	{!! Html::script('editor/js/plugins/quote.min.js') !!}
	{!! Html::script('editor/js/plugins/table.min.js') !!}
	{!! Html::script('editor/js/plugins/url.min.js') !!}
	{!! Html::script('editor/js/plugins/video.min.js') !!}

	{!! Html::script('editor/js/languages/es.js') !!}
	<!-- /end froala plugins -->
	{!! Html::script('js/main.js') !!}
</body>
</html>