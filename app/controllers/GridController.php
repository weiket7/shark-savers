<?php

class GridController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['grids'=>Grid::all()];
		$this->layout->content = View::make('grid-admin', $data);
	}

	public function create () {
		$data = ['grid'=>Grid::bare()];
		$this->layout->content = View::make('grid-form', $data);
	}

	public function createPost() {
		$input = Input::all();

		$grid = new Grid();
		$grid->type = $input['type'];
		$grid->content_id = $input['content_id'];
		$grid->caption = $input['caption'];

		//$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/supporter/";
    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/sharksavers/img/grid/";
		if (Input::hasFile('image')) {
        $file            = Input::file('image');
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        $grid->image = $filename;
    }
		$grid->save();

		return Redirect::to('admin/grid');
	}


}
