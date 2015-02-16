<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Image</title>

	 <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::to('/')}}{{URL::to('/')}}{{URL::to('/')}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('/')}}{{URL::to('/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::to('/')}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body onLoad="loadItem()">
	{{ Form::open(array('url' => '/addImage', 'files'=>true)) }}
		<table height=600>
			<tr>
				<td>
					{{ Form::label('category', 'Select category') }}
				</td>
				<td>
					<?php
						$categorys = Category::lists('cat_name', 'id');
					?>
					{{ Form::select('category', $categorys,null , array('id'=>'category','class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('item', 'Select item') }}
				</td>
				<td>
					{{ Form::select('item',array() ,null ,$attributes = ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>					
					{{ Form::label('description', 'Description') }}
				</td>
				<td>
					{{ Form::textarea('description',$value = null ,$attributes = ['class' => 'form-control']) }}
					
					
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group">
						{{ Form::file('image',array('id'=>'image','value' =>'Upload image')) }}
						{{ Form::hidden('image_input','',array('id'=>'image_input')) }}
					</div>				
				</td>
				<td>
						&nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">					
					{{ Form::submit('Upload Image',array('class'=>'btn btn-default')) }}
				</td>
			</tr>
			<tr>
				<td colspan="2">					
					<canvas id="image-canvas" name="image-canvas" width="200" height="100">
					</canvas>
				</td>
			</tr>
		</table>
		
	{{ Form::close() }}
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif	
</body>
<script>
	var http_path = '{{URL::to('/')}}';
</script>
<script type="text/javascript" src="{{URL::to('/')}}/js/js_config.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/script.js"></script>
</html>