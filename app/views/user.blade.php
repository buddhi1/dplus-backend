<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Password Chnage</title>
	 <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::to('/')}}{{URL::to('/')}}{{URL::to('/')}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('/')}}{{URL::to('/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::to('/')}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<head>
<body>
	{{ Form::open(array('url' => '/updatePassword')) }}
		<table height="300">
			<tr>
				<td>
					{{ Form::label('Current Password') }}
				</td>
				<td colspan="2">
					{{ Form::password('current',array('class'=>'form-control', 'placeholder'=>'Enter text')) }}					
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('New Password') }}
				</td>
				<td colspan="2">
					{{ Form::password('pw', array('id'=>'pw','class'=>'form-control', 'placeholder'=>'Enter text')) }}
				</td>
				<tr>
				<td>
					{{ Form::label('Confirm Password') }}
				</td>
				<td>
					{{ Form::password('confirm', array('id'=>'confirm','class'=>'form-control', 'placeholder'=>'Enter text'))}}
				</td>
				<td>
					{{ Form::text('message','',array('id'=>'message','disabled','class'=>'form-control'))}}
				</td>
			</tr>
			<tr>
				<td colspan=3 align="center">					
					{{ Form::submit('Submit changes',array('id'=>'submit','disabled','class'=>'btn btn-default')) }}
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