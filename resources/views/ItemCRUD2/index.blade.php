@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Articles</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('item-create')
	            <a class="btn btn-success" href="{{ route('itemCRUD2.create') }}"> Create New article</a>
	            @endpermission
	        </div>
	    </div>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif


<div class="row">
<div class="col-sm-3">
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Categories</h3>
  </div>
  <div class="panel-body">
@foreach ($categories as $key => $category)
<div><a href="{{ route('category.index',$category->id) }}">{{$category->name}}</a></div>
@endforeach
  </div>
</div>
</div>


	    <div class="col-sm-9">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Title</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($items as $key => $item)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $item->title }}</td>
		<td>{{ $item->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('itemCRUD2.show',$item->id) }}">Show</a>
			@permission('item-edit')
			<a class="btn btn-primary" href="{{ route('itemCRUD2.edit',$item->id) }}">Edit</a>
			@endpermission

			@permission('item-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['itemCRUD2.destroy', $item->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>

	</div>
	</div>

	{!! $items->render() !!}


@endsection