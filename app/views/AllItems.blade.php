<table border = "1">
	
		<?php
			$category = Item::all();
		?>
		{{ Form::open(array('url' => '')) }}
		
			<tr>
				<th>Category ID</th>
				<th>Category Name</th>
				<th>Description</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

			@foreach ($category as $cat)
			<tr>
				<td>{{$cat->id}}</td>
				<td>{{$cat->cat_name}}</td>
				<td>{{$cat->description}}</td>
				<td>{{Form::submit('Edit')}}</td>
				<td>{{Form::submit('Delete')}}</td>
			</tr>
			@endforeach
		{{ Form::close() }}
			
</table>