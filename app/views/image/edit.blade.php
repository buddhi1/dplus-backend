<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Image Details</title>
<head onLoad="loadItem()">
<body>
	{{ Form::open(array('url' => '/update', 'files'=>true)) }}
		<table>
			<tr>
				<td>
					{{ Form::label('category', 'Category') }}
					<?php
						$categorys = Category::lists('cat_name', 'id');

						$image = Image::where('id','=',$img_id)->get();
						$item = Item::where('id','=',$image[0]['item_id'])->get();
						$category = Category::where('id','=',$item[0]['cat_id'])->get();
					?>
					{{ Form::hidden('id', $img_id) }}
					{{ Form::select('category', $categorys, array('id'=>'category','selected'=>$category[0]['id'])) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('item', 'Select item') }}
					{{ Form::select('item',array('selected'=>$item[0]['item_name'])) }}
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
					{{ Form::submit('Submit changes') }}
				</td>
			</tr>
			<tr>
				<td>					
					<img id="image" name="image" src="Uploads/graphics/images/{{ $image[0]['img_name'] }}"  />
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
	document.getElementById('description').value = '{{ $image[0]['description'] }}';
</script>
<script type="text/javascript" src="{{URL::to('/')}}/js/js_config.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/js/script.js"></script>
</html>