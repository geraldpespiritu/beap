<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//MEDIUM.COM
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('scope[]')->get('/user', function (Request $request) {
    return $request->user();
});
//List illustrations
Route::get('illustrations', 'NewIllustrationController@index');

//List single illustration
Route::get('illustration/{id}', 'NewIllustrationController@show');

//Create new illustration
Route::post('illustration', 'NewIllustrationController@store');

//Update illustration
Route::put('illustration', 'NewIllustrationController@store');

//Delete illustration
Route::delete('illustration/{id}', 'NewIllustrationController@destroy');


/*CALAMITIES*/

//List Calamities
Route::get('/calamities', 'API\CalamitiesApiController@index');

//List Single Calamities
Route::get('calamity/{calamityID}', 'API\CalamitiesApiController@show');

/*
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('calamities', 'API\CalamitiesApiController@index');
});*/

