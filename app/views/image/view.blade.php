@extends('layouts.main')

@section('content')
	

					<?php
						$images = Image::all();						
					?>
					<table class="table table-striped table-bordered table-hover dataTable no-footer" id = "dataTables-example">
						<tr>
							<th>Image id</th>
							<th>Image name</th>
							<th>Description</th>
							<th colspan="2">Edit/Delete</th>
						</tr>

					@foreach ($images as $image)
					<tr>
						<td>{{ $image['id']}}</td>
						<td>{{ $image['img_name']}}</td>
						<td>{{ $image['description']}}</td>
						
						<td> 
							{{ Form::open(array('url' => '/editImage')) }}
							{{ Form::submit('Edit',array('id'=> $image['id'],'class'=>'btn btn-primary')).Form::hidden('Edit',$image['id'],array('id'=> 'Edit'))}} 
							{{ Form::close() }}
						</td>
						<td>
							{{ Form::open(array('url' => '/deleteImage')) }}
							{{ Form::submit('Delete',array('class'=>'btn btn-danger')). 
							Form::hidden('Delete',$image['id'],array('id'=> 'Delete')).
							Form::hidden('Name',$image['img_name'],array('id'=> 'Name'))  }} 
							{{ Form::close() }}
					

						</td>
					</tr>		
					
					@endforeach
					</table>			

		
	
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif	


@stop