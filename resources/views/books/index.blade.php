@extends('layouts.app')

@section('title', 'Relea.me')


@section('content')
<div class="home">
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<img src="/img/logo.png" class="img-responsive">
				<h1>Comparte, vende y compra libros</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<div class="col-sm-5">
				<p>
					<img src="/img/test01.jpg" class="img-responsive">
				</p>
				<p align="center">
					<a href="/auth/register" class="btn btn-lg btn-primary">Comienza ahora!</a>
				</p>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<ul>
		@foreach($books as $book)
		<li>
			<h2>{{ $book->name }}</h2>
			<img src="/photos/{{ $book->picture }}" class="img-responsive">
			<p>{{ $book->description }}</p>
		</li>

		@endforeach
	</ul>
</div>
@endsection
