<!DOCTYPE html>
<html>
<head>
	<title>Drodmin - @yield('title')</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('css/bootstrap.min.css') !!}
    
</head>
<body>
	@include('partials.menu', ['menu_id' => 2])
	@yield('content')

	{!! Html::script('js/jquery.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
</body>
</html>