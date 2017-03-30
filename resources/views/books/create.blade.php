@extends('layouts.app')

@section('content')

<h1>Edit Page</h1>
<div class="row">
	<div class="col-sm-8">
		<form method="POST" action="/{{ LaravelLocalization::getCurrentLocale() }}/books"">

			<div class="form-group">
				<label for="name">Nombre</label>
				<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
			</div>
			<div class="form-group">
				<input name="slug" type="text" class="form-control input-sm" value="{{ old('name') }}">	
			</div>
			<div class="form-group">
				<label for="content">Content</label>
				<textarea name="content" id="content" class="form-control">{{ old('name') }}</textarea>
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
			{{ csrf_field() }}
			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
	<div class="col-sm-4">
		
	</div>
</div>
@endsection