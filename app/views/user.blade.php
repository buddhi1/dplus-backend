<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Password Chnage</title>
<head>
<body>
	{{ Form::open(array('url' => '/chnagePassword', 'files'=>true)) }}
		<table>
			<tr>
				<td>
					{{ Form::label('Current Password') }}
					{{ Form::password('current') }}					
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('New Password') }}
					{{ Form::password('pw', array('id'=>'pw')) }}
				</td>
				<tr>
				<td>
					{{ Form::label('Confirm Password') }}
					{{ Form::password('confirm', array('id'=>'confirm')). Form::text('message','',array('id'=>'message','disabled'))}}
				</td>
			</tr>
			<tr>
				<td>					
					{{ Form::submit('Submit changes',array('id'=>'submit','disabled')) }}
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
<script type="text/javascript">
	document.getElementById('confirm').onkeyup = function(){		
		var pw = document.getElementById('pw').value;
		var confirm = document.getElementById('confirm').value;
		
		document.getElementById('message').value = 'Password does not match';
		document.getElementById('submit').disabled = true;
		if(pw == confirm){					
					
					document.getElementById('submit').disabled = false;
					document.getElementById('message').value = ' ';
		}
	}
	
</script>
</html>