@extends('layouts.main')

@section('content')

<html>
	<body>	
		{{ Form::model($item, array('method' => 'PATCH', 'route' => array('item.update', $item->id))) }}
			<table height="500">
				<tr>
					<?php
						$categorys = Category::lists('cat_name', 'id');
					?>
					<td>Category Name: </td>
					
					<td>
						{{ Form::select('category_id',$categorys, $item->cat_id, array('id'=>'category','class' => 'form-control')) }}
					</td>
				</tr>
				<tr>
					<td>Item name</td>
					<td><input type = "text" name = "item_name" value ="{{$item->item_name}}" class="form-control"></td>
				</tr>
				<tr>
					<td>
						Description: 
					</td>
					<td>
						<textarea cols = "80" rows = "15" name = "description" class="form-control">{{$item->description}}</textarea>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-group">
							<input type = "file" name = "image" id = "image">
							<input type = "hidden" name = "image_input" id = "image_input">
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						{{ Form::submit('Update',array('class'=>'btn btn-default')) }}
					</td>
				</tr>				
			</table>
			<div>
				<img id = "viewImg" src = "{{URL::to('/')}}/Uploads/graphics/items/{{$item->image}}">
				<canvas name = "image-canvas" id = "image-canvas" width = "200" height = "100"></canvas>
			</div>
			{{ Form::close() }}
	</body>

	<script type="text/javascript" src="{{URL::to('/')}}/js/scripts.js"></script>
</html>

@stop