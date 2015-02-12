<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Image</title>
</head>
<body onLoad="loadItem()">
	{{ Form::open(array('url' => '/addImage', 'files'=>true)) }}
		<table>
			<tr>
				<td>
					{{ Form::label('category', 'Select category') }}
					<?php
						$categorys = Category::lists('cat_name', 'id');
					?>
					{{ Form::select('category', $categorys, array('id'=>'category')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('item', 'Select item') }}
					{{ Form::select('item') }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('description', 'Description') }}
					{{ Form::textarea('description') }}
				</td>
			</tr>
			<tr>
				<td>				
					{{ Form::file('image',array('id'=>'image','value' =>'Upload image')) }}
					{{ Form::hidden('image_input','',array('id'=>'image_input')) }}
				</td>
			</tr>
			<tr>
				<td>					
					{{ Form::submit('Upload Image') }}
				</td>
			</tr>
			<tr>
				<td>					
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