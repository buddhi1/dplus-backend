@extends('layouts.main')

@section('content')

<html>
	<body>	<form action = "cat" method = "post" enctype="multipart/form-data">
			<table height = "500">
				<tr>
					<td>Category Name: </td>
					<td><input type = "text" name = "cat_name" required class="form-control" placeholder="Enter category"></td>
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
						<div class="form-group">
							<input type = "file" name = "image" id = "image" required>
							<input type = "hidden" name = "image_input" id = "image_input" required>
						</div>
						
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