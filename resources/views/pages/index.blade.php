@extends('layouts.admin')

@section('content')
<a href="#add_form" class="fancyb btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> New</a>
<h1>Pages</h1>
<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th>Name</th>
		<th width="150">Category</th>
		<th width="30">Country</th>
		<th width="150">TimeStamps</th>
	</tr>
	@foreach ($pages as $page)
	<tr>
		<td>{{ $page->id }}</td>
		<td>
			<a href="{{ route('admin.pages.edit', $page->id) }}">{{ $page->name }} </a><br />
			<small><a href="/{{ $page->category->slug }}/{{ $page->slug }}" target="_blank">/{{ $page->category->slug }}/{{ $page->slug }}</a></small>
			
		</td>
		<td>{{ $page->category ? $page->category->name : "None" }} </td>
		<td>{{ $page->country }}</td>
		<td>{{ $page->created_at }}<br>
		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($page->created_at))->diffForHumans() }}
		</td>

	</tr>
	@endforeach
</table>
{!! $pages->render() !!}


<div class="add_form" id="add_form" style="display: none;">
	<form method="POST" action="{{ url('admin/pages') }}">

		@include('partials.errors')


		<div class="form-group">
			<label for="name">Nombre</label>
			<input name="name" type="text" class="form-control input-lg" value="{{ old('name') }}">	
		</div>
		<div class="form-group">
			<input name="slug" type="text" class="form-control input-xd" value="{{ old('slug') ? old('slug') : rand(1000000,9999999) }}">	
		</div>
		<input type="hidden" name="category_id" value="1">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
</div>

@endsection