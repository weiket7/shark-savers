<?php

class VideoController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['videos'=>Video::all()];
		$this->layout->content = View::make('video-admin', $data);
	}

	public function create () {
		$data = ['video'=>Video::bare()];
		$this->layout->content = View::make('video-form', $data);
	}

	public function createPost() {
		$input = Input::all();

		$video = new Video();
		$video->title = $input['title'];
		$video->link = $input['link'];
		$video->text = $input['text'];
		$video->save();

		return Redirect::to('admin/video');
	}


}
