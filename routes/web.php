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

//**************** PRIVACY ROUTES ************//

Route::get('/privacy', 'privacyController@privacy');
Route::get('/cookies', 'privacyController@cookies');
Route::get('/terms', 'privacyController@terms');

//************ SERVICES ROUTES *****************//
Route::get('/services', 'serviceController@servicePage');
Route::get('/careers', 'serviceController@careerPage');


Route::post('contactus', 'contactusController@storeFeedback');




//******************* ADMIN ROUTES ******************//
Route::get('/admins', 'adminController@index');
Route::get('/admins/login', 'adminController@loginPage');
Route::post('/admins/login', 'adminController@doLogin');
Route::get('/admins/100teflNew', 'adminController@registerPage');
Route::post('/admins/100teflNew', 'adminController@doRegister');
Route::get('/admins/feedback', 'adminController@clientFeedback');
Route::get('/admins/roles', 'adminController@getRoles');
Route::get('/admins/roles/create', 'adminController@createRole');
Route::post('/admins/roles/create', 'adminController@storeRole');
Route::put('/admins/roles/create', 'adminController@storeRole');
Route::get('/admins/roles/edit/{role_id}', 'adminController@editRole');

//************ AUTHENTICATION CONTROLLER ***********//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//*************** NEWS CONTROLLER ***************//

Route::get('/news', 'comingsoon@news');
Route::get('/news/addnews', 'newsController@index');
Route::get('/news/editnews/{newsId}', 'newsController@editnews');
Route::get('/news/viewnews', 'newsController@viewnews');
Route::post('/news/save', 'newsController@newNews');
Route::post('/news/saveEdit', 'newsController@saveEdit');
Route::get('/news/deletenew/{newsId}', 'newsController@deleteNews');
Route::put('/news/save', 'newsController@newNews');
Route::get('/news/newyearparty', 'newsController@newYearParty');
Route::get('/news',  'newsController@showAllNews');
Route::get('/news/{id}',  'newsController@getGivenNews');
Route::post('/news/addFile', 'newsController@addFile');