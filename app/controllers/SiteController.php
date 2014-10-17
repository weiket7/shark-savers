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
		return View::make('index', $data);
	}

	public function sg() {
		$this->layout = View::make('template');
		$data = [];
		$this->layout->content = View::make('index2', $data);
	}

	public function hk() {
		$this->layout = View::make('template');
		$data = [];
		$this->layout->content = View::make('index2', $data);
	}

	public function my() {
		$this->layout = View::make('template');
		$data = [];		
		$this->layout->content = View::make('index2', $data);
	}

	public function index2()
	{
		$data = [];
		$this->layout->content = View::make('index', $data);
	}

	public function pledge()
	{
		$this->layout = View::make('template');
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
		$this->layout = View::make('template');		
		$data = ['count'=>Pledge::count()];
		$this->layout->content = View::make('pledge-success', $data);
	}

}
