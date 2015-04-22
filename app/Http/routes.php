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


// admin routes 
Route::get('admin/', 'AdminController@index');
Route::get('admin/drink/add', 'AdminController@addDrink');
Route::get('admin/drink/{id}', 'AdminController@getDrinkDetail');
Route::get('admin/drink/{id}/edit', 'AdminController@editDrink');


Route::get('search/{id?}','DrinksController@search');

Route::get('register',"PagesController@register");

Route::get('drink/{slug}','DrinksController@getDrink')->where(['slug'=>'[a-z-]+']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('logout',function(){

	Auth::logout();
	redirect('/');

});