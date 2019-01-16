@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Categories</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New category</a>
	        </div>
	    </div>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($categories as $key => $Category)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $Category->name }}</td>
		<td>{{ $Category->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('categories.show',$Category->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('categories.edit',$Category->id) }}">Edit</a>



			{!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $Category->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}

		</td>
	</tr>
	@endforeach
	</table>

	{!! $categories->render() !!}


@endsection