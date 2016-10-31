@extends('layouts.admin')

@section('content')
<a href="#add_form" class="fancyb btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> New</a>
<h1>Categories</h1>
<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th>Name</th>
		<th width="50">Pages</th>
		<th width="150">TimeStamps</th>
	</tr>
	@foreach ($categories as $category)
	<tr>
		<td>{{ $category->id }}</td>
		<td>
			<a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }} </a><br />
			<small><a href="/{{ $category->slug }}" target="_blank">/{{ $category->slug }}</a></small>
		</td>
		<td>
			{{ $category->pages->count() }}
		</td>
		<td>{{ $category->created_at }}<br>
		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($category->created_at))->diffForHumans() }}
		</td>

	</tr>
	@endforeach
</table>
{!! $categories->render() !!}


<div class="add_form" id="add_form" style="display: none;">
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
</div>



@endsection