<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/aboutus', function(){
	return view('aboutuspage.aboutusBlock');
});

Route::get('/privacy', 'privacyController@privacy');
Route::get('/cookies', 'privacyController@cookies');
Route::get('/terms', 'privacyController@terms');
