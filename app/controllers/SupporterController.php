<?php

class SupporterController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['supporters'=>Supporter::all()];
		$this->layout->content = View::make('supporter-admin', $data);
	}

	public function create () {
		$data = ['supporter'=>Supporter::bare()];
		$this->layout->content = View::make('supporter-form', $data);
	}

	public function createPost() {
		$input = Input::all();

		$supporter = new Supporter();
		$supporter->company = $input['company'];
		$supporter->text = $input['text'];

    //$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/supporter/";
    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/sharksavers/img/supporter/";
		if (Input::hasFile('image')) {
        $file            = Input::file('image');
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        $supporter->image = $filename;
    }

    if (Input::hasFile('logo')) {
        $file            = Input::file('logo');
        $filename        = $file->getClientOriginalName();
        $uploadSuccess   = $file->move($destinationPath, $filename);
        $supporter->logo = $filename;
    }
		$supporter->save();

		return Redirect::to('admin/supporter');
	}


}
