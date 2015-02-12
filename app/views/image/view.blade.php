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
					
					<?php
						$images = Image::all;
					?>

					@foreach ($image as $images)
						{{ $image['id']}}
					@endforeach
					
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