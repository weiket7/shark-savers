<?php

class IssueController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$data = ['issues'=>Issue::all()];
		$this->layout->content = View::make('issue-admin', $data);
	}

	public function create() {
		$data = ['issue'=>Issue::bare()];
		$this->layout->content = View::make('issue-form', $data);		
	}

	public function createPost() {
		$input = Input::all();

		$issue = new Issue();
		$issue->title = $input['title'];
		$issue->text = $input['text'];
		$issue->status = $input['status'];
		$issue->save();

		return Redirect::to('admin/issue');
	}

}
