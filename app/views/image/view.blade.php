<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View All Image Details</title>

	 <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::to('/')}}{{URL::to('/')}}{{URL::to('/')}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('/')}}{{URL::to('/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::to('/')}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
	
		<table>
			<tr>
				<td>
					
					<?php
						$images = Image::all();						
					?>
					<table border="1" class="table table-striped table-bordered table-hover dataTable no-footer">
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
							{{ Form::submit('Edit',array('id'=> $image['id'],'class'=>'btn btn-primary')).Form::hidden('Edit',$image['id'],array('id'=> 'Edit'))}} 
							{{ Form::close() }}
						</td>
						<td>
							{{ Form::open(array('url' => '/deleteImage')) }}
							{{ Form::submit('Delete',array('class'=>'btn btn-danger')). 
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