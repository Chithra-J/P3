<?php

/*
 |--------------------------------------------------------------------------
 | Application Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register all of the routes for an application.
 | It's a breeze. Simply tell Laravel the URIs it should respond to
 | and give it the controller to call when that URI is requested.
 |
 */

Route::get('/', function() {
	return redirect('/P3');
});

Route::get('/', 'P3LoremIpsumController@getIndex');

Route::get('/P3', 'P3LoremIpsumController@getIndex');

Route::get('/P3/lorem-ipsum', 'P3LoremIpsumController@getLoremIpsum');

Route::post('/P3/lorem-ipsum', 'P3LoremIpsumController@postLoremIpsum');

Route::get('/P3/user-generator', 'P3RandomUserController@getRandomUsers');

Route::post('/P3/user-generator', 'P3RandomUserController@postRandomUsers');
