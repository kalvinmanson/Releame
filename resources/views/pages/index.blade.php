@extends('layouts.admin')

@section('content')
<a href="{{ url('admin/pages/create') }}" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Crear</a>
<h1>Pages</h1>
<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th width="150">TimeStamps</th>
		<th>Name</th>
		<th>Category</th>
	</tr>
	@foreach ($pages as $page)
	<tr>
		<td>{{ $page->id }}</td>
		<td>{{ $page->created_at }}<br>
		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($page->created_at))->diffForHumans() }}
		</td>
		<td>
			<a href="{{ route('admin.pages.edit', $page->id) }}">{{ $page->name }} </a><br />
			<small>/{{ $page->slug }}</small>
			
		</td>
		<td>{{ $page->category ? $page->category->id : "None" }}</td>

	</tr>
	@endforeach
</table>
{!! $pages->render() !!}



@endsection