<?php

class GridController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['grids'=>Grid::all()];
		$this->layout->content = View::make('grid/index', $data);
	}


}
