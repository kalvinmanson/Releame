@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')
<div class="jumbotron">
<h1>welcome to Drodmin</h1>
	<p>This example show you a simple view in Drodmin.</p>
	<p>
		<a class="btn btn-lg btn-primary" href="{{ route('admin.pages.index') }}" role="button">Admin Login »</a>
	</p>
</div>
@endsection