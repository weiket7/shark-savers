<?php

class PledgeController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['pledges'=>Pledge::all()];
		$this->layout->content = View::make('pledge-admin', $data);
	}

	public function create() {
		$data = ['pledge'=>Pledge::bare()];
		$this->layout->content = View::make('pledge-form', $data);		
	}

	public function createPost() {
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

		return Redirect::to('admin/pledge');
	}

}
