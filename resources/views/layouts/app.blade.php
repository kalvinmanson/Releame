<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Drodmin - @yield('title')</title>
	<meta name="keywords" content="@yield('meta-keywords')">
    <meta name="description" content="@yield('meta-keywords')">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png" />
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery.fancybox.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/animations.css') !!}
    {!! Html::style('css/app.css') !!}
    
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<a href="/">
						<img src="/img/logo.png" class="img-responsive">
					</a>
				</div>
				<div class="col-sm-9">
				</div>
			</div>
		</div>
	</header>
		<div class="container">
			@include('flash::message')
     		@include('partials.errors')
			@yield('content')
		</div>
	<footer>
		<div class="container">
			<p>&copy; 2017 By Droni.co</p>
		</div>
	</footer>

	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/bootstrap3-typeahead.min.js') !!}
	{!! Html::script('js/css3-animate-it.js') !!}
	{!! Html::script('js/jquery.fancybox.pack.js') !!}
	{!! Html::script('js/main.js') !!}
</body>
</html>