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



Route::resource('/dashboard', 'DashboardController');


Route::resource('posts','PostsController');

Route::resource('calamities', 'CalamitiesController');

Route::resource('illustrations', 'ExitsController');

Route::get('/report', 'ItemController@report');

Route::get('/pdf', 'ItemPrintController@reportPrint');

Auth::routes();

Route::get('/errorLogin', function() {
    return view('pages.errorLogin');
});
