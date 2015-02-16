@extends('layouts.main')

@section('content')

<body onLoad="loadItem()">
	{{ Form::open(array('url' => '/addImage', 'files'=>true)) }}
		<table height=400>
			<tr>
				<td>
					{{ Form::label('category', 'Select category') }}
				</td>
				<td>
					<?php
						$categorys = Category::lists('cat_name', 'id');
					?>
					{{ Form::select('category', $categorys,null , array('id'=>'category','class' => 'form-control','required')) }}
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
						{{ Form::file('image',array('id'=>'image','value' =>'Upload image','required')) }}
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
					
				</td>
			</tr>
		</table>
		<div>
			<canvas id="image-canvas" name="image-canvas" width="200" height="100"></canvas>
		</div>
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

@stop