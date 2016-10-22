@extends('layouts.admin')

@section('content')
<a href="{{ url('admin/pictures/create') }}" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Crear</a>
<h1>Pictures</h1>

<div class="row">
	@foreach ($pictures as $picture)
		<div class="col-sm-2">
			<a href="{{ '/images/'.$picture->file_name }}" class="fancyb"><img src="{{ '/images/'.$picture->file_name }}" class="img-responsive"></a>
			<a href="{{ route('admin.pictures.edit', $picture->id) }}">{{ $picture->name }} </a>
			{!! Form::open([
	            'method' => 'DELETE',
	            'route' => ['admin.pictures.destroy', $picture->id]
	        ]) !!}
	            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
	        {!! Form::close() !!}
		</div>
	@endforeach
</div>



@endsection