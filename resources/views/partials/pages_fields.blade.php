<div class="sidefields">

	<div class="panel panel-default">
	  <div class="panel-heading">New field</div>
	  <div class="panel-body">
	  	<form method="POST" action="{{ url('admin/fields') }}">
		    <div class="form-group">
		    	<label form="name">Name</label>
		    	<input type="text" name="name" id="name" class="form-control typeahead" autocomplete="off" style="text-transform: lowercase;">
		    </div>
		    <div class="form-group">
		    	<label form="content">Content</label>
		    	<textarea name="content" id="content" class="form-control"></textarea>
		    </div>
		    <div class="form-group">
				<input type="hidden" name="page_id" value="{{ $page->id }}" id="token">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
		    	<button type="submit" class="btn btn-primary">Save</button>
		    </div>
		</form>
	  </div>
	</div>

	<div class="list-group">
	@foreach ($page->fields as $field)
	  <div class="list-group-item">

	  	{!! Form::open([
	  	    'method' => 'DELETE',
	  	    'route' => ['admin.fields.destroy', $field->id]
	  	]) !!}
	  	    <button type="submit" class="btn btn-danger btn-xs pull-right"><i class="fa fa-remove"></i></button>
	  	{!! Form::close() !!}

	    <h4 class="list-group-item-heading">{{ $field->name }}</h4>
	    <p class="list-group-item-text">{{ $field->content }}</p>
	  </div>
	@endforeach
	</div>
</div>
