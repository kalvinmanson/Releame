@extends('layouts.admin')

@section('content')
<h1>Create picture</h1>
<form method="POST" action="{{ url('admin/pictures') }}" enctype="multipart/form-data">

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
		<label for="name">Name</label>
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
	</div>
	<div class="form-group">
		<label for="picture">Picture</label>
		<input name="picture" id="picture" type="file" class="form-control input-lg" value="{{ old('picture') }}">	
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection