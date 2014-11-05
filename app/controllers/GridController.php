<?php

class GridController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['grids'=>Grid::orderBy('position')->get()];
		$this->layout->content = View::make('grid-admin', $data);
	}

	public function create () {
		$data = ['grid'=>Grid::bare(), 'grid_country'=>[]];
		$this->layout->content = View::make('grid-form', $data);
	}

	public function update (Grid $grid) {
		$data = [
		'grid'=>$grid,
		'grid_country'=>DB::table('grid_country')->where('grid', $grid->id)->lists('country'),
		];
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
		$grid->country = $input['country'];
		$grid->text = $input['text'];

		if ($grid->type == 'V') {
			$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/grid/video/";			
		} else if ($grid->type == 'A') {
			$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/grid/";			
		} else if ($grid->type == 'S') {
			$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/grid/supporter/";
		}

		if (Input::hasFile('image')) {
      $file            = Input::file('image');
      $image_name        = $file->getClientOriginalName();
      $uploadSuccess   = $file->move($destinationPath, $image_name);
      $grid->image = $image_name;
    }
    if (Input::hasFile('logo')) {
      $file           = Input::file('logo');
      $logo_name        = $file->getClientOriginalName();
      $uploadSuccess   = $file->move($destinationPath, $logo_name);
      $grid->logo = $logo_name;
    }
		$grid->save();

		return Redirect::to('admin/grid')->with('msg', 'Grid has been created');
	}

	public function updatePost() {
		$input = Input::all();
		$grid = Grid::findOrFail(Input::get('id'));

		if (isset($_POST['delete'])) {
			$grid->delete();
			DB::table('grid_country')
      ->where('grid', $input['id'])
      ->delete();
			return Redirect::to('admin/grid')->with('msg', 'Grid has been deleted');
		}

		$grid->type = $input['type'];
		$grid->title = $input['title'];
		$grid->link = $input['link'];
		$grid->category = $input['category'];
		$grid->country = $input['country'];
		/*$grid->position = $input['position'];*/
		/*$grid->caption = $input['caption'];*/
		$grid->text = $input['text'];

		/*DB::table('grid_country')
      ->where('grid', $input['id'])
      ->delete();
    foreach($_POST['country'] as $key => $c) {
    	DB::table('grid_country')
      ->insert(['grid'=>$input['id'], 'country'=>$c]);
    }*/

    if ($grid->type == 'V') {
			$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/grid/video/";			
		} else if ($grid->type == 'A') {
			$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/grid/";			
		} else if ($grid->type == 'S') {
			$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/grid/supporter/";
		}
		
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

		return Redirect::to('admin/grid')->with('msg', 'Grid has been updated');
	}

	public function position() {
		$data = ['grids'=>Grid::orderBy('position')->get()];
		$this->layout->content = View::make('position', $data);
	}

	public function positionPost() {
		$id_arr = DB::table('grid')->lists('id');
		//var_dump($id_arr);
		foreach($id_arr as $key => $id) {
			echo $id . $_POST['grid'.$id].'<br>';
			DB::table('grid')
            ->where('id', $id)
            ->update(array('position' => $_POST['grid'.$id]));
		}
		return Redirect::to('admin/position');
	}


}
