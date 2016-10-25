@extends('layouts.admin')

@section('content')
<h1>Create category</h1>
<form method="POST" action="{{ url('admin/categories') }}">

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif


	<div class="form-group">
		<label for="name">Nombre</label>
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
	</div>
	<div class="form-group">
		<input name="slug" type="text" class="form-control input-xd" value="{{{ old('slug') ? old('slug') : rand(1000000,9999999) }}}">	
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection