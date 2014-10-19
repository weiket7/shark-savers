<?php

class AmbassadorController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['ambassadors'=>Ambassador::all()];
		$this->layout->content = View::make('ambassador-admin', $data);
	}

	public function create () {
		$data = ['ambassador'=>Ambassador::bare()];
		$this->layout->content = View::make('ambassador-form', $data);
	}

	public function createPost() {
		$input = Input::all();

		$ambassador = new Ambassador();
		$ambassador->name1 = $input['name1'];
		$ambassador->name2 = $input['name2'];
		$ambassador->sub1 = $input['sub1'];
		$ambassador->sub2 = $input['sub2'];
		
		//$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/supporter/";
    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/sharksavers/img/ambassador/";
		if (Input::hasFile('image')) {
        $file            = Input::file('image');
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        $ambassador->image = $filename;
    }
		$ambassador->save();

		return Redirect::to('admin/ambassador');
	}


}
