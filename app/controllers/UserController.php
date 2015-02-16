<?php

class UserController extends BaseController {

	public function showLogin()
	{
	    return View::make('login');
	}

	public function doLogin() {

		$rules = array(
		    'username'    => 'required', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		$validator = Validator::make(Input::all(), $rules);


		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'username'     => Input::get('username'),
		        'password'  => Input::get('password')
   	 			);

		 	if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        echo 'SUCCESS!';

    		} else {        

		        // validation not successful, send back to form 
		        echo 'fail!';
    		}

		}

	/*
			$pass = Input::get('password');
			$username = Input::get('username');

			 if (Auth::attempt(array('username' => $username, 'password' => $pass))) {
			 	return Redirect::intended('admin');
			 } else {
			 	echo "fail!";
			 	echo $pass;
			 	echo $username;
			 }
		}*/
	}
}