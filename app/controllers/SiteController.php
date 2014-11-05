<?php

class SiteController extends BaseController {

	public function __construct() {	

	}

	public function index()
	{
		$temp = Slider::where('country', '0')->orderBy(DB::raw('RAND()'))->get();
		$sliders = [];
		foreach($temp as $key => $s) {
			$sliders[$s->id] = ['image'=>$s->image, 'position'=>$s->position];
		}
		$data = ['sliders'=>$sliders];
		return View::make('index', $data);
	}

	public function ambassadors() {
		$this->layout = View::make('template');
		$country = strtoupper(Request::segment(1));
		$country_arr = ['SG'=>'1', 'MY'=>'2', 'HK'=>'3'];
		$country = $country_arr[$country];
		
		$data = [
			'grids'=>DB::table('grid')
				->where('country', $country)
				->where('type', 'A')
				->orderBy(DB::raw('RAND()'))->get(),
			'sliders'=>Slider::getSlider($country),
		];
		$this->layout->content = View::make('index2', $data);
	}

	public function category($category_raw) {
		$this->layout = View::make('template');
		$country = strtoupper(Request::segment(1));
		$country_arr = ['SG'=>'1', 'MY'=>'2', 'HK'=>'3'];
		$country = $country_arr[$country];

		$category_arr = [''=>'', 'artanddesign'=>'A', 'corporate'=>'C', 'entertainment'=>'E', 'media'=>'M',
			'ngo'=>'N', 'professional'=>'P', 'sports'=>'S'];
		$category = $category_arr[$category_raw];
		$data = [
			'grids'=>DB::table('grid')
				->where('country', $country)
				->where('type', 'A')
				->where('category', $category)
				->orderBy(DB::raw('RAND()'))->get(),
			'sliders'=>Slider::getSlider($country),
		];
		$this->layout->content = View::make('index2', $data);
	}

	public function videos() {
		$this->layout = View::make('template');
		$country = strtoupper(Request::segment(1));
		$country_arr = ['SG'=>'1', 'MY'=>'2', 'HK'=>'3'];
		$country = $country_arr[$country];

		$data = [
			'grids'=>DB::table('grid')
				->where('country', $country)
				->where('type', 'V')
				->orderBy(DB::raw('RAND()'))->get(),
			'sliders'=>Slider::getSlider($country),
		];
		$this->layout->content = View::make('index2', $data);
	}

	public function supporters() {
		$this->layout = View::make('template');
		$country = strtoupper(Request::segment(1));
		$country_arr = ['SG'=>'1', 'MY'=>'2', 'HK'=>'3'];
		$country = $country_arr[$country];

		$data = [
			'grids'=>DB::table('grid')
				->where('country', $country)
				->where('type', 'S')
				->orderBy(DB::raw('RAND()'))->get(),
			'sliders'=>Slider::getSlider($country),
		];
		$this->layout->content = View::make('index2', $data);
	}

	public function index2()
	{
		$this->layout = View::make('template');
		$country = strtoupper(Request::segment(1));
		$country_arr = ['SG'=>'1', 'MY'=>'2', 'HK'=>'3'];
		$country = $country_arr[$country];

		$data = [
			'grids'=>DB::table('grid')
				->where('country', $country)
				->orderBy(DB::raw('RAND()'))->get(),
			'sliders'=>Slider::getSlider($country),		
			'country'=>$country,			
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
		$country = strtoupper(Request::segment(1));
		$country_arr = ['SG'=>'1', 'MY'=>'2', 'HK'=>'3'];
		$country_domain = $country_arr[$country];

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
		$pledge->country_domain = $country_domain;
		$pledge->save();

		return Redirect::to($input['url_country'].'/pledge-success');
	}

	public function pledgeSuccess() {
		$this->layout = View::make('template');		
		$data = ['count'=>Pledge::count()];
		$this->layout->content = View::make('pledge-success', $data);
	}

	public function about() {
		$this->layout = View::make('template');
		$country = strtoupper(Request::segment(1));
		$country_arr = ['SG'=>'1', 'MY'=>'2', 'HK'=>'3'];
		$country = $country_arr[$country];

		$country = Request::segment(1);
		if ($country == 'sg') {
			$this->layout->content = View::make('about-sg', ['country'=>$country]);
		} else if ($country == 'my') {
			$this->layout->content = View::make('about-my', ['country'=>$country]);			
		} else if ($country == 'hk') {
			$this->layout->content = View::make('about-hk', ['country'=>$country]);			
		}
	}

}
