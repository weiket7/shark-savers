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

Route::get('/r', function() {
	return View::make('r');
});

Route::get('bxslider', function() {
	return View::make('bxslider');
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
}); 

Route::group(array('prefix' => 'admin'), function()
{	 
	Route::get('/', 'GridController@info');
	Route::get('grid', 'GridController@index');
	Route::get('grid/create', 'GridController@create');
	Route::post('grid/create', 'GridController@createPost');
	Route::get('pledge', 'PledgeController@index');
	Route::get('pledge/create', 'PledgeController@create');
	Route::post('pledge/create', 'PledgeController@createPost');
	Route::get('issue', 'IssueController@index');
	Route::get('issue/create', 'IssueController@create');
	Route::post('issue/create', 'IssueController@createPost');
	/*Route::get('video', 'VideoController@index');
	Route::get('video/create', 'VideoController@create');
	Route::post('video/create', 'VideoController@createPost');
	Route::get('video/update', 'VideoController@update');
	Route::post('video/update', 'VideoController@updatePost');
	Route::get('supporter', 'SupporterController@index');
	Route::get('supporter/create', 'SupporterController@create');
	Route::post('supporter/create', 'SupporterController@createPost');
	Route::get('supporter/update', 'SupporterController@update');
	Route::post('supporter/update', 'SupporterController@updatePost');
	Route::get('ambassador', 'AmbassadorController@index');
	Route::get('ambassador/create', 'AmbassadorController@create');
	Route::post('ambassador/create', 'AmbassadorController@createPost');
	Route::get('ambassador/update', 'AmbassadorController@update');
	Route::post('ambassador/update', 'AmbassadorController@updatePost');*/
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
