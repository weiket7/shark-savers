<?php

class SliderController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$temp = Slider::orderBy('position')->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		$data = ['sliders'=>$sliders];
		$this->layout->content = View::make('slider-admin', $data);
	}

	public function indexPost() {
		//$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/supporter/";
    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/sharksavers/img/";
		for ($i=1; $i<=10; $i++) {		
			if ( isset($_POST['delete'.$i]) )	{
				DB::table('slider')->where('id', $i)->update(['image'=>'']);
			} else if (Input::hasFile('image'.$i)) {
	        $file            = Input::file('image'.$i);
	        $filename        = $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($destinationPath, $filename);
	        DB::table('slider')->where('id', $i)->update(['image'=>$filename]);
	    }
		}

		return Redirect::to('admin/slider');
	}

}
