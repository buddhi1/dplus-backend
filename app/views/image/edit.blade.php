<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Image Details</title>

	 <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::to('/')}}{{URL::to('/')}}{{URL::to('/')}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('/')}}{{URL::to('/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::to('/')}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<head onLoad="loadItem()">
<body>
	{{ Form::open(array('url' => '/update', 'files'=>true)) }}
		<table height="900">
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
				</td>
				<td>
					{{ Form::select('category', $categorys,null, array('id'=>'category','selected'=>$category[0]['id'],'class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('item', 'Select item') }}
				</td>
				<td>
					{{ Form::select('item',array('selected'=>$item[0]['item_name']),null,array('class' => 'form-control')) }}
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
				<td colspan="2" align="center">					
					<img id="image" name="image" src="Uploads/graphics/images/{{ $image[0]['img_name'] }}"  />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">					
					{{ Form::submit('Submit changes',array('class'=>'btn btn-default')) }}
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