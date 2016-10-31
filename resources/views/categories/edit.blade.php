@extends('layouts.admin')

@section('content')

<h1>Edit category</h1>
<form method="POST" action="{{ url('admin/categories/'.$category->id) }}">

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
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $category->name }}">	
	</div>
	<div class="form-group">
		<input name="slug" type="text" class="form-control input-sm" value="{{ old('slug') ? old('slug') : $category->slug }}">	
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<input name="_method" type="hidden" value="PUT">
	<button type="submit" class="btn btn-primary">Save</button>
</form>
<hr />
{!! Form::open([
    'method' => 'DELETE',
    'route' => ['admin.categories.destroy', $category->id]
]) !!}
    {!! Form::submit('Delete this?', ['class' => 'btn btn-danger pull-right']) !!}
{!! Form::close() !!}
@endsection