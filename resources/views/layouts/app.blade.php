<!DOCTYPE html>
<html>
<head>
	<title>Drodmin - @yield('title')</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery.fancybox.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/admin.css') !!}
    
</head>
<body>
	<header>
		<p>header</p>
	</header>
	@include('partials.menu', ['menu_id' => 1])
	@yield('content')
	<footer>
		<p>footer</p>
	</footer>
	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/bootstrap3-typeahead.min.js') !!}
	{!! Html::script('js/jquery.fancybox.pack.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>