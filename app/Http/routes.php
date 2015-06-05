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

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/add-order/{id}', [
	'as' => 'user.order',
	'uses' => 'HomeController@addOrder'
]);

Route::get('/show-order',[
	'as' => 'user.show.order',
	'uses' => 'HomeController@showOrder'
]);


Route::get('/fill','UserController@showForm');
Route::post('/fill','UserController@showName');

Route::resource('/inventory','InventoryController');
Route::resource('/place','PlaceController');

Route::controller('/box','BoxController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
