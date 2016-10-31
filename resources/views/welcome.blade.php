@extends('layouts.app')

@section('title', 'Bienvenido')


@section('content')
	@include('partials.menu', ['menu_id' => 2])
    <h1>Hola mundo</h1>
@endsection