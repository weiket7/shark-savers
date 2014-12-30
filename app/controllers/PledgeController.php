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

	public function createApi() {
		$this->layout = "";

		$input = Input::all();	 

		if ($input["token"] != 'tDXxYO1Pi5Hgene2brKL') {
				return 'false: wrong token';
		}

	 	$validator = Validator::make( $input, Pledge::$rules ); 
		if ( $validator->fails() ) { 
			 return 'false: missing fields';
		}

		$pledge = new Pledge();
		$pledge->first_name = $input['first_name'];
		$pledge->last_name = $input['last_name'];
		$pledge->nric = $input['nric'];
		$pledge->email = $input['email'];
		$pledge->country = $input['country'];
		if (isset($input['im_finished'])) $pledge->im_finished = $input['im_finished'];
		if (isset($input['support'])) $pledge->support = $input['support'];

		$p = DB::table('pledge')->where('email', 'like', '%'.$input['email'].'%')->get();
		if ($p)
			return 'false: email exists';

		if (isset($input['test']) && $input['test'] == 'true') {
			return 'true: test only did not create';
		}

		$pledge->save();			
		return 'true: pledge created';
	}

}
