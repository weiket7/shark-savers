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

Route::group(array('prefix' => 'sg'), function()
{	 
	Route::get('pledge', 'SiteController@pledge');
	Route::get('pledge-success', 'SiteController@pledgeSuccess');
	Route::post('pledge', 'SiteController@pledgePost');
});

Route::group(array('prefix' => 'admin'), function()
{	 
	Route::get('/', 'SiteController@admin');
	Route::get('pledge', 'PledgeController@index');
	Route::get('grid', 'GridController@index');
	Route::get('pledge/create', 'PledgeController@create');
});


Route::get('sg', 'SiteController@sg');
Route::get('my', 'SiteController@my');
Route::get('hk', 'SiteController@hk');


Route::get('email', function() {
	Mail::send('pledge-email', array('key' => 'value'), function($message)
	{
	    $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});
});
