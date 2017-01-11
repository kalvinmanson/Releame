@extends('layouts.app')

@section('content')

<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<a class="navbar-brand" href="{{ route('admin.categories.index') }}">Categories</a>
    <ul class="nav navbar-nav navbar-right">
	  <li><a href="#add_form" class="fancyb"><i class="fa fa-plus"></i> New</a></li>
	</ul>
  </div>
</nav>

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
		<div class="form-group">
			<label for="name">Name</label>
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