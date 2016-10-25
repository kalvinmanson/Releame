@extends('layouts.admin')

@section('content')
<h1>Create page</h1>
<form method="POST" action="{{ url('admin/pages') }}">

	@include('partials.errors')


	<div class="form-group">
		<label for="name">Nombre</label>
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
	</div>
	<div class="form-group">
		<label for="category_id">Category</label>
		<select name="cvategory_id" id="category_id" class="form-control">
			@foreach ($categories as $category)
			<option value="{{ $category->id }}">{{ $category->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<input name="slug" type="text" class="form-control input-xd" value="{{{ old('slug') ? old('slug') : rand(1000000,9999999) }}}">	
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea name="content" id="content" class="form-control"></textarea>
		<script type="text/javascript">
			var editor = CKEDITOR.replace('content');
		</script>

	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection