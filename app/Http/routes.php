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

Route::get('/', function () {
    return view('welcome');
});



Route::get('api/users', 'Api\UsersController@index');
Route::post('api/users', 'Api\UsersController@create');
Route::get('api/users/{id}', 'Api\UsersController@get');
Route::post('api/users/{id}', 'Api\UsersController@update');
Route::delete('api/users/{id}', 'Api\UsersController@deactivate');

Route::get('player/{id}', function ($id) {
    return 'User '.$id;
});
