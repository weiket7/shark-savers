<?php

class SiteController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$data = [];
		$this->layout->content = View::make('index', $data);
	}

	public function index2()
	{
		$data = [];
		$this->layout->content = View::make('index', $data);
	}

	public function pledge()
	{
		$data = [];
		$this->layout->content = View::make('pledge', $data);
	}

	public function pledgePost()
	{
		$input = Input::all();	 	
	 	$validator = Validator::make( $input, Pledge::$rules ); 
		if ( $validator->fails() ) { 
			//return Redirect::to('pledge')->withErrors($validator)->withInput(Input::all());
		}

		$pledge = new Pledge();
		$pledge->first_name = $input['first_name'];
		$pledge->last_name = $input['last_name'];
		$pledge->nric = $input['nric'];
		$pledge->email = $input['email'];
		$pledge->country = $input['country'];
		$pledge->save();

		return Redirect::to('pledge-success');
	}

	public function pledgeSuccess() {
		$data = ['count'=>Pledge::count()];
		$this->layout->content = View::make('pledge-success', $data);
	}

	public function admin() {
		$data = ['pledges'=>Pledge::all()];
		$this->layout->content = View::make('admin', $data);
	}

}
