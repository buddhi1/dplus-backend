<?php


class UserController extends BaseController {

	public function showLogin()
	{
	    return View::make('user.login');
	}

	public function doLogin() {

		$rules = array(
		    //'username'    => 'required', // make sure the email is an actual email
		    'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
		);

		$validator = Validator::make(Input::all(), $rules);


		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'username'     => 'admin',
		        'password'  =>  Input::get('password')
   	 			);

		 		if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        	return View::make('layouts.main');

    			} else {        

		        // validation not successful, send back to form 
		        	return View::make('user.login');
    			}

			}
		}

	public function logout() {
		Auth::logout();
		return View::make('user.login');

	}
}
