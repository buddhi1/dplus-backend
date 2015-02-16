@extends('layouts.main')

@section('content')				

	

	{{ Form::open(array('url' => '/updatePassword')) }}
	<div style="color:red;">
		{{$message}}		
	</div>
		<table height="300">
			<tr>
				<td>
					{{ Form::label('Current Password') }}
				</td>
				<td colspan="2">
					{{ Form::password('current',array('class'=>'form-control', 'placeholder'=>'Enter Current password')) }}					

				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('New Password') }}

				</td>
				<td colspan="2">
					{{ Form::password('pw', array('id'=>'pw','class'=>'form-control', 'placeholder'=>'Enter New Password')) }}

				</td>
			</tr>
				<td width="150">
					{{ Form::label('Confirm Password') }}
				</td>
				<td>
					{{ Form::password('confirm', array('id'=>'confirm','class'=>'form-control', 'placeholder'=>'Enter text'))}}
				</td>
				<td width="50" align="right">
					<button type="button" class="btn btn-warning btn-circle" id="wrong" style="display:none">
						<i class="fa fa-times"></i>
					</button>
					<button type="button" class="btn btn-info btn-circle" id="ok" style="display:none">
						<i class="fa fa-check"></i>
                    </button>
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
		
		document.getElementById('ok').style.display =  "none";
		document.getElementById('wrong').style.display =  "block";
		document.getElementById('submit').disabled = true;
		if(pw == confirm){					
					
					document.getElementById('submit').disabled = false;
					document.getElementById('ok').style.display =  "block";
					document.getElementById('wrong').style.display =  "none";

		}
		
	}
	
</script>
@stop