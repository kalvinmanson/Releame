@extends('layouts.app')

@section('content')
<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<a class="navbar-brand" href="{{ route('admin.users.index') }}">Users</a>
  </div>
</nav>
<table class="table table-striped">
	<tr>
		<th width="20">ID</th>
		<th>Name</th>
		<th width="150">TimeStamps</th>
	</tr>
	@foreach ($users as $user)
	<tr>
		<td>{{ $user->id }}</td>
		<td>
			<a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }} </a>			
		</td>
		<td>{{ $user->created_at }}<br>
		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() }}
		</td>

	</tr>
	@endforeach
</table>
{!! $users->render() !!}

@endsection