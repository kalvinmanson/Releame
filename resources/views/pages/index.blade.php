@extends('layouts.app')

@section('content')
<h1>Pages</h1>
<ul>
	@foreach ($pages as $page)
	<li>
		{{ $page->name }} || {{ $page->slug }}
	</li>
	@endforeach
</ul>
{{ csrf_token() }}

<a href="{{ url('pages/create') }}">Crear</a>

@endsection