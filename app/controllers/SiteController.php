<?php

class SiteController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$temp = Slider::orderBy('position')->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		$data = ['sliders'=>$sliders];
		return View::make('index', $data);
	}

	public function ambassadors() {
		$this->layout = View::make('template');
		$temp = Slider::orderBy('position')->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		$data = [
			'grids'=>Grid::where('type','=','A')->orderBy('position')->get(),
			'sliders'=>$sliders
		];
		$this->layout->content = View::make('index2', $data);
	}

	public function videos() {
		$this->layout = View::make('template');
		$temp = Slider::orderBy('position')->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		$data = [
			'grids'=>Grid::where('type','=','V')->orderBy('position')->get(),
			'sliders'=>$sliders
		];
		$this->layout->content = View::make('index2', $data);
	}

	public function supporters() {
		$this->layout = View::make('template');
		$temp = Slider::orderBy('position')->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		$data = [
			'grids'=>Grid::where('type','=','S')->orderBy('position')->get(),
			'sliders'=>$sliders
		];
		$this->layout->content = View::make('index2', $data);
	}

	public function index2()
	{
		$this->layout = View::make('template');
		$url = explode('/',Request::path());
		$country = $url[0];
		$temp = Slider::orderBy('position')->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		$data = [
			'grids'=>DB::table('grid')
				->rightJoin('grid_country', 'grid.id', '=', 'grid_country.grid_id')
				->where('country', $country)
				->orderBy('position')->get(),
			'sliders'=>$sliders				
		];
		$this->layout->content = View::make('index2', $data);
	}

	public function pledge()
	{
		$this->layout = View::make('template');
		$this->layout->content = View::make('pledge');
	}

	public function pledgePost()
	{
		$input = Input::all();	 	
	 	$validator = Validator::make( $input, Pledge::$rules ); 
		if ( $validator->fails() ) { 
			//return Redirect::to('pledge')->withErrors($validator)->withInput(Input::all());
		}

		$pledge = new Pledge();
		$pledge->first_name = $input['first_name'];
		$pledge->last_name = $input['last_name'];
		$pledge->nric = $input['nric'];
		$pledge->email = $input['email'];
		$pledge->country = $input['country'];
		$pledge->save();

		return Redirect::to($input['url_country'].'/pledge-success');
	}

	public function pledgeSuccess() {
		$this->layout = View::make('template');		
		$data = ['count'=>Pledge::count()];
		$this->layout->content = View::make('pledge-success', $data);
	}

}
