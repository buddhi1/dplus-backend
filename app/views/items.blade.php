@extends('layouts.main')

@section('content')

<html>
	<body>	<form action = "add" method = "post" enctype="multipart/form-data">
			<table height = "500">
				<tr>
					<td>Item Name: </td>
					<td><input type = "text" name = "item_name" required class="form-control" placeholder="Enter item"></td>
				</tr>
				<tr>
					<td>Category Name: </td>
					<td>
						<?php
						$items = Category::lists('cat_name', 'id');
						//var_dump($items);
						?>
						{{ Form::select('category', $items,null,array('class'=>'form-control')) }}
					</td>
				</tr>
				<tr>
					<td>
						Description: 
					</td>
					<td>
						<textarea cols = "80" rows = "15" name = "description" required class="form-control"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type = "file" name = "image" id = "image" required  class="form-group">
						<input type = "hidden" name = "image_input" id = "image_input">
					</td>
				</tr>
				<tr>
					<td colspan = "2"><input type = "submit" value = "Submit" class="btn btn-default"></td>
				</tr>
			</table>
			<div>
					<canvas name = "image-canvas" id = "image-canvas" width = "200" height = "100"></canvas>
			</div>
		</form>
	</body>
	<script type="text/javascript" src="{{URL::to('/')}}/js/scripts.js"></script>
</html>

@stop