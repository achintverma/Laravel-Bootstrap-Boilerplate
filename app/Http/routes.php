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

Route::post('learning', function(){

	return $name = Request::input('name');;

});


Route::get("param/{id}",function($id){

	return $id;

});

Route::get("create/{name?}","PagesController@create");

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('about', 'PagesController@about');


Route::get('foo/{id}', function($id){

	return("Hello, ".$id);

})->where('id','[a-z0-9]+');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
