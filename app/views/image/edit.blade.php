@extends('layouts.main')

@section('content')

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

						$items = Item::where('cat_id','=',$item[0]['cat_id'])->lists('item_name', 'id');
					?>
					{{ Form::hidden('id', $img_id) }}
				</td>
				<td>
					{{ Form::select('category', $categorys,$item[0]['cat_id'], array('id'=>'category','class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('item', 'Item') }}
				</td>
				<td>
					{{ Form::select('item',$items,$image[0]['item_id'],array('class' => 'form-control')) }}
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
					{{ Form::submit('Submit changes',array('class'=>'btn btn-default')) }}
				</td>
			</tr>	
			<tr>
				<td colspan="2" align="center">					
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

@stop