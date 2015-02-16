<?php
class UserController extends BaseController {
	public function logout() {
		Auth::logout();
		return View::make('user.login');
	}
}