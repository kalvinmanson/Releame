<form method="POST" action="{{ url('admin/fields/' . $field->id) }}">

	@include('partials.errors')

	{{ csrf_field() }}

	<div class="form-group">
		<label for="name">Nombre</label>
		<input name="name" type="text" class="form-control input-lg" value="{{ old('name') ? old('name') : $field->name }}">	
	</div>
	<div class="form-group">
		<label for="content">Content</label>
		<textarea name="content" id="content" class="form-control">{{ old('content') ? old('content') : $field->content }}</textarea>
	</div>
	<input type="hidden" name="_method" value="PUT">
	<button type="submit" class="btn btn-primary">Save</button>
</form>