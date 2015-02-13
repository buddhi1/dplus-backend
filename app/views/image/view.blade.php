<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View All Image Details</title>
</head>
<body>
	
		<table>
			<tr>
				<td>
					
					<?php
						$images = Image::all();						
					?>
					<table border="1">
						<tr>
							<th>Image id</th>
							<th>Image name</th>
							<th>Description</th>
							<th colspan="2">Edit/Delete</th>
						</tr>

					@foreach ($images as $image)
					<tr>
						<td>{{ $image['id']}}</td>
						<td>{{ $image['img_name']}}</td>
						<td>{{ $image['description']}}</td>
						
						<td> 
							{{ Form::open(array('url' => '/editImage')) }}
							{{ Form::submit('Edit',array('id'=> $image['id'])).Form::hidden('Edit',$image['id'],array('id'=> 'Edit'))}} 
							{{ Form::close() }}
						</td>
						<td>
							{{ Form::open(array('url' => '/deleteImage')) }}
							{{ Form::submit('Delete'). 
							Form::hidden('Delete',$image['id'],array('id'=> 'Delete')).
							Form::hidden('Name',$image['img_name'],array('id'=> 'Name'))  }} 
							{{ Form::close() }}
					

						</td>
					</tr>		
					
					@endforeach
					</table>			
					
				</td>
			</tr>
			
		</table>
		
	
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif	
</body>
</html>