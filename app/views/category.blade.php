@extends('layouts.main')

@section('content')

<html>
	<body>	<form action = "cat" method = "post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Category Name: </td>
					<td><input type = "text" name = "cat_name" required></td>
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
						<input type = "hidden" name = "image_input" id = "image_input" required>
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