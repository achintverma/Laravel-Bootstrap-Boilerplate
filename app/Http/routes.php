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

Route::get("create/{name?}",'PagesController@create')->where(['name'=>'[A-Za-z ]+']);

Route::get('/', 'PagesController@index');

Route::get('search/{id?}','DrinksController@search');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
