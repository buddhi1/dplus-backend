@extends('layouts.main')

@section('content')

<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
	
		<?php
			$category = Category::all();
		?>
		
		
			<tr>
				<th>Category ID</th>
				<th>Category Name</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			@foreach ($category as $cat)
			<tr>
				<td>{{$cat->id}}</td>
				<td>{{$cat->cat_name}}</td>
				<td>{{$cat->description}}</td>
				<td>{{ link_to_route('category.edit','Edit',array($cat->id)) }}</td>
				<td> 
					{{ Form::open(array('method' => 'DELETE', 'route' => array('category.destroy', $cat->id))) }}
					{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
					{{ Form::close() }}
				</td>
			</tr>
			
			@endforeach	
</table>

@stop