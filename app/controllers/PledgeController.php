<?php

class PledgeController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['pledges'=>Pledge::all()];
		$this->layout->content = View::make('pledge/index', $data);
	}

	public function create() {
		$data = ['pledge'=>Pledge::bare()];
		$this->layout->content = View::make('pledge/form', $data);		
	}

}
