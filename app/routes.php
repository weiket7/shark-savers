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
Route::get('hello', 'SiteController@index2');
Route::get('pledge', 'SiteController@pledge');
Route::get('pledge-success', 'SiteController@pledgeSuccess');
Route::post('pledge', 'SiteController@pledgePost');
Route::get('admin', 'SiteController@admin');
Route::get('email', function() {
	Mail::send('pledge-email', array('key' => 'value'), function($message)
	{
	    $message->to('foo@example.com', 'John Smith')->subject('Welcome!');
	});
});
