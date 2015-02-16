@extends('layouts.main')

@section('content')

<html>
	<body>	
		{{ Form::model($item, array('method' => 'PATCH', 'route' => array('item.update', $item->id))) }}
			<table>
				<tr>
					<td>Category Name: </td>
					<td><input type = "text" name = "item_name" value =" {{ $item->item_name }} "></td>
				</tr>
				<tr>
					<td>
						Description: 
					</td>
					<td>
						<textarea cols = "80" rows = "15" name = "description" >{{ $item->description }}</textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type = "file" name = "image" id = "image">
						<input type = "hidden" name = "image_input" id = "image_input">
					</td>
				</tr>
				<tr>
					<td>
						{{ Form::submit('Update') }}
					</td>
				</tr>
				<tr>
					<td colspan = "2">
						<img id = "viewImg" src = "{{URL::to('/')}}/Uploads/graphics/items/{{$item->image}}">
						<canvas name = "image-canvas" id = "image-canvas" width = "200" height = "100"></canvas>
					</td>
				</tr>
			</table>
			{{ Form::close() }}
	</body>

	<script type="text/javascript" src="{{URL::to('/')}}/js/scripts.js"></script>
</html>

@stop