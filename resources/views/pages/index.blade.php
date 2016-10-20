@extends('layouts.admin')

@section('content')
<a href="{{ url('admin/pages/create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear</a>
<h1>Pages</h1>
<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th>TimeStamps</th>
		<th>Name</th>
		<th></th>
	</tr>
	@foreach ($pages as $page)
	<tr>
		<td>{{ $page->id }}</td>
		<td>{{ $page->created_at }}<br>
		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($page->created_at))->diffForHumans() }}
		</td>
		<td>{{ $page->name }} <br /><small>{{ $page->slug }}</small></td>
	</tr>
	@endforeach
</table>

{!! $pages->render() !!}



@endsection