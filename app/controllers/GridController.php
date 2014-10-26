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

	public function update (Grid $grid) {
		$data = ['grid'=>$grid];
		$this->layout->content = View::make('grid-form', $data);
	}

	public function info () {
		$this->layout->content = View::make('info');		
	}

	public function createPost() {
		$input = Input::all();

		$grid = new Grid();
		$grid->type = $input['type'];
		$grid->title = $input['title'];
		$grid->link = $input['link'];
		$grid->category = $input['category'];
		/*$grid->position = $input['position'];*/
		$grid->caption = $input['caption'];
		$grid->text = $input['text'];

		//$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/supporter/";
    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/sharksavers/img/grid/";
		if (Input::hasFile('image')) {
        $file            = Input::file('image');
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        $grid->image = $filename;
    }
    if (Input::hasFile('logo')) {
        $file            = Input::file('logo');
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        $grid->logo = $filename;
    }
		$grid->save();


		return Redirect::to('admin/grid');
	}

	public function updatePost() {
		$input = Input::all();

		$grid = Grid::findOrFail(Input::get('id'));
		$grid->type = $input['type'];
		$grid->title = $input['title'];
		$grid->link = $input['link'];
		$grid->category = $input['category'];
		/*$grid->position = $input['position'];*/
		$grid->caption = $input['caption'];
		$grid->text = $input['text'];

		//$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/supporter/";
    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/sharksavers/img/grid/";
		if (Input::hasFile('image')) {
        $file            = Input::file('image');
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        $grid->image = $filename;
    }
    if (Input::hasFile('logo')) {
        $file            = Input::file('logo');
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        $grid->logo = $filename;
    }
		$grid->save();


		return Redirect::to('admin/grid/update/'.$input['id']);
	}


}
