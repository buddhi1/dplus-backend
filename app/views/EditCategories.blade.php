@extends('layouts.main')

@section('content')

<html>
	<head>
		<link href="{{URL::to('/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::to('/')}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::to('/')}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>	
		{{ Form::model($category, array('method' => 'PATCH', 'route' => array('category.update', $category->id))) }}
			<table>
				<tr>
					<td>Category Name: </td>
					<td><input type = "text" name = "cat_name" value =" {{ $category->cat_name }} "></td>
				</tr>
				<tr>
					<td>
						Description: 
					</td>
					<td>
						<textarea cols = "80" rows = "15" name = "description" >{{ $category->description }}</textarea>
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
						<img id = "viewImg" src = "{{URL::to('/')}}/Uploads/graphics/categories/{{$category->image}}">
						<canvas name = "image-canvas" id = "image-canvas" width = "200" height = "100"></canvas>
					</td>
				</tr>
			</table>
			{{ Form::close() }}
	</body>

	<script type="text/javascript" src="{{URL::to('/')}}/js/scripts.js"></script>
</html>

@stop