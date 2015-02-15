@extends('layouts.main')

@section('content')

<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example">
	
		<?php
			$items = Item::all();
		?>
		
		
			<tr>
				<th>Item ID</th>
				<th>Item Name</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			@foreach ($items as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->item_name}}</td>
				<td>{{$item->description}}</td>
				<td>{{ link_to_route('item.edit','Edit',array($item->id)) }}</td>
				<td> 
					{{ Form::open(array('method' => 'DELETE', 'route' => array('item.destroy', $item->id))) }}
					{{ Form::submit('Delete') }}
					{{ Form::close() }}
				</td>
			</tr>
			
			@endforeach	
</table>

@stop