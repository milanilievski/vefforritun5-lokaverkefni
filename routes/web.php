<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function() {
	return view('home');
});

Route::get('/blogs', 'BlogsController@index');
Route::get('/blogs/create', 'BlogsController@create')->middleware('auth');
Route::get('/blogs/{blog}', 'BlogsController@show');
Route::post('/blogs', 'BlogsController@store')->middleware('auth');
Route::get('/blogs/{blog}/edit', 'BlogsController@edit')->middleware('auth');
Route::patch('/blogs/{blog}', 'BlogsController@update')->middleware('auth');
Route::delete('/blogs/{blog}', 'BlogsController@destroy')->middleware('auth');

Route::post('/blogs/{blog}/comment', 'BlogsController@store')->middleware('auth');

Route::get('/blogs/user/{user}', 'BlogsController@index');