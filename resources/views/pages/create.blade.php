@extends('layouts.admin')

@section('content')
<h1>Create page</h1>
<form method="POST" action="{{ url('admin/pages') }}">

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


	{!! csrf_field() !!}
	<div class="form-group">
		<label for="name">Nombre</label>
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
	</div>
	<div class="form-group">
		<input name="slug" type="text" class="form-control input-xd" value="{{{ old('slug') ? old('slug') : rand(1000000,9999999) }}}">	
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection