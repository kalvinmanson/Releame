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
    {!! Html::style('css/admin.css') !!}
    {!! Html::script('editor/ckeditor.js') !!}
    
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
	{!! Html::script('js/bootstrap3-typeahead.min.js') !!}
	{!! Html::script('js/jquery.fancybox.pack.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>