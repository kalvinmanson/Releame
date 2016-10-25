@extends('layouts.admin')

@section('content')
<a href="{{ url('admin/categories/create') }}" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Crear</a>
<h1>Categories</h1>
<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th width="150">TimeStamps</th>
		<th>Name</th>
	</tr>
	@foreach ($categories as $category)
	<tr>
		<td>{{ $category->id }}</td>
		<td>{{ $category->created_at }}<br>
		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($category->created_at))->diffForHumans() }}
		</td>
		<td>
			<a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }} </a><br />
			<small>/{{ $category->slug }}</small>
			
		</td>

	</tr>
	@endforeach
</table>
{!! $categories->render() !!}



@endsection