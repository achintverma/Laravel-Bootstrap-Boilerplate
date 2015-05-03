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
Route::get('admin/ingredients', 'AdminController@getIngredients');

Route::get('admin/drink/new', 'AdminController@addDrink');

Route::post('admin/drink/add', 'AdminController@createDrink');

Route::get('admin/drink/{id}', 'AdminController@getDrinkDetail');
Route::get('admin/drink/{id}/edit', 'AdminController@editDrink');
Route::get('get-ingredients/{name}', 'AdminController@getIngredientsAjax');


Route::get('search/{id?}','DrinksController@search');

Route::get('register',"PagesController@register");

Route::get('drink/{slug}','DrinksController@getDrink')->where(['slug'=>'[a-z-]+']);

Route::get('drink/{id}', 'DrinksController@getDrinkById')->where(['id'=>'[0-9]+']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('logout',function(){

	Auth::logout();
	redirect('/');

});