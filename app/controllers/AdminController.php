<?php

class AdminController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		return View::make('login');
	}

	public function loginPost() {
		if (Input::get('password') == 'sharky123') {
			Session::put('logged_in', 'true');			
			return Redirect::to('admin/info')->with('msg', 'Logged in');			
		} else {
			return Redirect::to('admin')->with('msg', 'Wrong password');
		}
	}

	public function info() {
		$this->layout->content = View::make('info');		
	}

	public function logout() {
		Session::forget('logged_in');
		return Redirect::to('admin')->with('msg', 'Logged out');
	}

	

}
