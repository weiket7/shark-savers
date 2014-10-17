<?php

class AdminController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['pledges'=>Pledge::all()];
		$this->layout->content = View::make('admin', $data);
	}

	

}
