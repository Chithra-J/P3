<?php

	/*
	Route::get('/', 'P3LoremIpsumController@getIndex');
			
		Route::get('/P3', 'P3LoremIpsumController@getIndex');
	
		Route::get('/P3/lorem-ipsum', 'P3LoremIpsumController@getLoremIpsum');
		
		Route::post('/P3/lorem-ipsum', 'P3LoremIpsumController@postLoremIpsum');
	
		Route::get('/P3/user-generator', 'P3RandomUserController@getRandomUsers');
		
		Route::post('/P3/user-generator', 'P3RandomUserController@postRandomUsers');*/
	
	
Route::group(['middleware' => ['web']], function() {

	
	/*
	Route::get('/', function() {
				return view('welcome');
			});*/
	
		Route::get('/', 'P3LoremIpsumController@getIndex');
		Route::get('/P3', 'P3LoremIpsumController@getIndex');
	
		Route::get('/P3/lorem-ipsum', 'P3LoremIpsumController@getLoremIpsum');
		
		Route::post('/P3/lorem-ipsum', 'P3LoremIpsumController@postLoremIpsum');
	
		Route::get('/P3/user-generator', 'P3RandomUserController@getRandomUsers');
		
		Route::post('/P3/user-generator', 'P3RandomUserController@postRandomUsers');
	

});
