<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'SiteController@index');

Route::model('grid', 'Grid');
Route::model('pledge', 'Pledge');
Route::model('slider', 'Slider');

Route::filter('logged_in', function()
{
  if (Session::get('logged_in') != 'true') {
    return Redirect::to('admin')->with('msg', 'Not logged in');
  }
});
/*
Route::get('exist/{nric}', function($nric) {
	$nric = preg_replace('/[^0-9,]|,[0-9]*$/','',$nric);	//remove non-numeric
	$p = DB::table('pledge')->where('nric', 'like', '%'.$nric.'%')->get();
	//var_dump($p);
	echo $p ? 'true' : 'false';	//exist = true 
});*/

Route::get('exist/{email}', function($email) {
	$p = DB::table('pledge')->where('email', 'like', '%'.$email.'%')->get();
	/*var_dump($p);*/
	echo $p ? 'true' : 'false';	//exist = true 
});

Route::group(array('prefix' => 'sg'), function()
{	 
	Route::get('/', 'SiteController@index2');
	Route::get('pledge', 'SiteController@pledge');
	Route::get('pledge-success', 'SiteController@pledgeSuccess');
	Route::post('pledge', 'SiteController@pledgePost');
	Route::get('ambassadors', 'SiteController@ambassadors');
	Route::get('videos', 'SiteController@videos');
	Route::get('supporters', 'SiteController@supporters');
	Route::get('about', 'SiteController@about');
	Route::get('ambassadors/{category_raw}', 'SiteController@category');
}); 

Route::group(array('prefix' => 'my'), function()
{	 
	Route::get('/', 'SiteController@index2');
	Route::get('pledge', 'SiteController@pledge');
	Route::get('pledge-success', 'SiteController@pledgeSuccess');
	Route::post('pledge', 'SiteController@pledgePost');
	Route::get('ambassadors', 'SiteController@ambassadors');
	Route::get('videos', 'SiteController@videos');
	Route::get('supporters', 'SiteController@supporters');
	Route::get('about', 'SiteController@about');
	Route::get('ambassadors/{category_raw}', 'SiteController@category');	 
}); 


Route::group(array('prefix' => 'hk'), function()
{	 
	Route::get('/', 'SiteController@index2');
	Route::get('pledge', 'SiteController@pledge');
	Route::get('pledge-success', 'SiteController@pledgeSuccess');
	Route::post('pledge', 'SiteController@pledgePost');
	Route::get('ambassadors', 'SiteController@ambassadors');
	Route::get('videos', 'SiteController@videos');
	Route::get('supporters', 'SiteController@supporters');
	Route::get('about', 'SiteController@about');
	Route::get('ambassadors/{category_raw}', 'SiteController@category');	
}); 

Route::get('admin/', 'AdminController@index');
Route::post('admin/login', 'AdminController@loginPost');
Route::get('admin/logout', 'AdminController@logout');

Route::group(array('prefix' => 'admin', 'before'=>'logged_in'), function()
{	 
	Route::get('info', 'AdminController@info');
	Route::get('grid', 'GridController@index');
	Route::get('grid/create', 'GridController@create');
	Route::post('grid/create', 'GridController@createPost');
	Route::get('grid/update/{grid}', 'GridController@update');
	Route::post('grid/update', 'GridController@updatePost');
	Route::get('position', 'GridController@position');
	Route::post('position', 'GridController@positionPost');
	Route::get('pledge', 'PledgeController@index');
	Route::get('pledge/create', 'PledgeController@create');
	Route::post('pledge/create', 'PledgeController@createPost');
	Route::get('issue', 'IssueController@index');
	Route::get('issue/create', 'IssueController@create');
	Route::post('issue/create', 'IssueController@createPost');
	Route::get('slider', 'SliderController@index');
	Route::get('slider/create', 'SliderController@create');
	Route::post('slider/create', 'SliderController@createPost');
	Route::get('slider/update/{slider}', 'SliderController@update');
	Route::post('slider/update', 'SliderController@updatePost');
	Route::get('slider/order/{country}', 'SliderController@order');
	Route::post('slider/order/{country}', 'SliderController@orderPost');

});


/*Route::get('sg', 'SiteController@sg');
Route::get('my', 'SiteController@my');
Route::get('hk', 'SiteController@hk');
*/

Route::get('email', function() {
	Mail::send('pledge-email', array('key' => 'value'), function($message)
	{
	    $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});
});
