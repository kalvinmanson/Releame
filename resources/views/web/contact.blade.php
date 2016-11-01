@extends('layouts.app')

@section('title', 'Contacto')


@section('content')
    <h1>Contacto</h1>
    <form action="/contact" method="POST">
    	{{ csrf_field() }}
    	<input name="name" id="name">
    	<button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection