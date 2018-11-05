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


Route::get('/hello', function () {
    return '<h1> HELLO world </h1>';
});

/*
Route::get('/login', function () {
    return view('pages.login');
});
*/

/*
Route::get('/users/{id}/{name}', function ($id, $name) {
   return 'This is user '.$name.' with an id '.$id;
});
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*
Route::get('/about', function () {
    return view('pages.about');
});
*/

Route::get('/welcome', function(){
    return view('welcome');
});

Route::get('/', function(){
  return view('auth.login');
});

/*Route::get('/', 'PagesController@index');*/
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

//Login
/*Route::post('/login', 'LoginController@login');*/

//Login for API ng ITD
Route::post('/testlogin', 'LoginController@login');



Route::get('/beapDashboard', 'BeapDashboardController@getUsers');

Route::resource('posts','PostsController');

Route::resource('calamities', 'CalamitiesController');

Route::resource('illustrations', 'IllustrationsController');

Route::get('/createCalamity', 'PagesController@createCalamity');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

//Route::get('/report',array('as'=>'report','uses'=>'ItemController@report'));
Route::get('/report', 'ItemController@report');
Route::get('/pdf', 'ItemPrintController@reportPrint');

/**
Route::get('director/login','DirectorAuth\DirectorLoginController@showLoginForm')->name('director.login');
Route::post('director/login','DirectorAuth\DirectorLoginController@login')->name('director.login.submit');
Route::post('director/logout','DirectorAuth\DirectorLoginController@directorLogout')->name('director.logout');

Route::get('director/', 'DirectorController@index')->name('director.dashboard');
 **/