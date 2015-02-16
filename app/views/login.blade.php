<!doctype html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>

	{{ Form::open(array('url' => 'login')) }}
	<h1>Login</h1>

	<!-- if there are login errors, show them here -->

	<p>
	    {{ Form::label('username', 'User Name') }}
	    {{ Form::text('username', Input::old('username'), array('placeholder' => 'admin')) }}
	</p>

	<p>
	    {{ Form::label('password', 'Password') }}
	    {{ Form::password('password') }}
	</p>

	<p>{{ Form::submit('Login') }}</p>
	{{ Form::close() }}

	</body>
</html>