<?php

class SliderController extends BaseController {

	protected $layout = 'template-admin';

	public function index()
	{
		$sliders = Slider::orderBy('country')->orderBy('position')->get();		
		$data = ['sliders'=>$sliders];
		$this->layout->content = View::make('slider-admin', $data);
	}

	public function create() {
		$data = [
		'slider'=>Slider::bare(),
		'country_arr'=>[''=>'', '0'=>'Landing', '1'=>'SG', '2'=>'MY', '3'=>'HK']
		];
		$this->layout->content = View::make('slider-form', $data);
	}

	public function createPost() {
    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/slider/";
    $slider = new Slider();
    $slider->country = Input::get('country');

    if (Input::hasFile('image')) {
      $file            = Input::file('image');
      $image_name        = $file->getClientOriginalName();
      $uploadSuccess   = $file->move($destinationPath, $image_name);
      $slider->image = $image_name;
    }
    $slider->save();

		return Redirect::to('admin/slider');
	}

	public function update(Slider $slider) {
		$data = [
		'slider'=>$slider,
		'country_arr'=>[''=>'', '0'=>'Landing', '1'=>'SG', '2'=>'MY', '3'=>'HK']
		];
		$this->layout->content = View::make('slider-form', $data);
	}

	public function updatePost() {
		$input = Input::all();
		$slider = Slider::findOrFail(Input::get('id'));

		if (isset($_POST['delete'])) {
			$slider->delete();
			return Redirect::to('admin/grid')->with('msg', 'Slider has been deleted');
		}

		$destinationPath = $_SERVER['DOCUMENT_ROOT'] . "/img/slider/";
    $slider->country = Input::get('country');
    if (Input::hasFile('image')) {
      $file            = Input::file('image');
      $image_name        = $file->getClientOriginalName();
      $uploadSuccess   = $file->move($destinationPath, $image_name);
      $slider->image = $image_name;
    }
    $slider->save();

		return Redirect::to('admin/slider');
	}

	public function order($country) {
		$country_arr = ['landing'=>'0', 'sg'=>'1', 'my'=>'2', 'hk'=>'3'];
		$data = [
		'sliders'=>Slider::where('country', $country_arr[$country])->get(),
		'country_arr'=>[''=>'', '0'=>'Landing', '1'=>'SG', '2'=>'MY', '3'=>'HK']
		];
		//dd(DB::getQueryLog());
		$this->layout->content = View::make('slider-order', $data);
	}

	/*public function indexPost() {
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
	}*/

}
