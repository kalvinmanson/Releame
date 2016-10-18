@extends('layouts.app')

@section('content')
<h1>Create page</h1>
<form method="POST" class="form-inline" action="{{ url('pages') }}">
	{!! csrf_field() !!}

	<input name="name" type="text" class="form-control" value="{{ old('name') }}">
	<input name="slug" type="text" class="form-control" value="{{ rand(10000,99999) }}">
	<button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection