@extends('layouts.admin')

@section('content')
<h1>Create page</h1>
<form method="POST" action="{{ url('admin/pages/' . $page->id) }}">

	@include('partials.errors')


	<div class="form-group">
		<label for="name">Nombre</label>
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $page->name }}">	
	</div>
	<div class="form-group">
		<input name="slug" type="text" class="form-control input-sm" value="{{ old('slug') ? old('slug') : $page->slug }}">	
	</div>
	<div class="form-group">
		<label for="category_id">Category</label>
		<select name="category_id" id="category_id" class="form-control">
			@foreach ($categories as $category)
			<option value="{{ $category->id }}" {{ $category->id == $page->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea name="content" id="content" class="form-control">{{ old('content') ? old('content') : $page->content }}</textarea>
		<script type="text/javascript">
			var editor = CKEDITOR.replace('content');
		</script>
	</div>
	<div class="form-group">
		<label for="country">Country</label>
		<select name="country" id="country" class="form-control">
			<option value="all">All</option>
			<option value="co">Colombia</option>
			<option value="cl">Chile</option>
			<option value="mx">Mexico</option>
		</select>
	</div>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<input type="hidden" name="_method" value="PUT" id="token">
	<button type="submit" class="btn btn-primary">Save</button>
</form>
<hr />
{!! Form::open([
    'method' => 'DELETE',
    'route' => ['admin.pages.destroy', $page->id]
]) !!}
    {!! Form::submit('Delete this page?', ['class' => 'btn btn-danger pull-right']) !!}
{!! Form::close() !!}
@endsection