@extends('layouts.main')

@section('content')

<html>
	<body>	<form action = "add" method = "post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Item Name: </td>
					<td><input type = "text" name = "item_name" required></td>
				</tr>
				<tr>
					<td>Category Name: </td>
					<td>
						<?php
						$items = Category::lists('cat_name', 'id');
						//var_dump($items);
						?>
						{{ Form::select('category', $items) }}
					</td>
				</tr>
				<tr>
					<td>
						Description: 
					</td>
					<td>
						<textarea cols = "80" rows = "15" name = "description" required></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type = "file" name = "image" id = "image" required>
						<input type = "hidden" name = "image_input" id = "image_input">
					</td>
				</tr>
				<tr>
					<td colspan = "2"><input type = "submit" value = "Submit"></td>
				</tr>
				<tr>
					<td colspan = "2" colspan = "2"><canvas name = "image-canvas" id = "image-canvas" width = "200" height = "100"></canvas></td>
				</tr>
			</table>
		</form>
	</body>
	<script type="text/javascript" src="{{URL::to('/')}}/js/scripts.js"></script>
</html>

@stop