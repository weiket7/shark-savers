<?php
class TemplateController extends BaseController
{
	
	public function index() {
		$this->layout->content = View::make('release/index');
	}

	public function create()
	{
		$data = array('task' => Task::bare());
	 	$this->layout->content = View::make('release/form', $data);
	}

	public function create_post() {
		 $input = Input::all();
		 $task = new Task;
		 $task->task = $input['task'];

		 $task->save();
		 return Redirect::to('release')->with('msg', 'Task has been created');
	}

	public function view(Task $task) {
		$data = array('task' => $task);
		$this->layout->content = View::make('release/form', $data);
	}

	public function update(Task $task) {
	 $data = array('task'=>$task);
	 	$this->layout->content = View::make('release/form', $data);
	}

	 public function update_post() {
	 	$task = Task::findOrFail(Input::get('id'));
	 	$input = Input::all();
		$task->task = $input['task'];

 	  $task->save();
 	  return Redirect::to('tasks')->with('msg', 'Task has been updated');
  }

  public function dataTable() {
  	return View::make('dataTable');
  }

}