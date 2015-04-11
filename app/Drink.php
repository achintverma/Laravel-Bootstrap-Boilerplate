<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Drink extends Model {

	// specify a table name since it can be differnt from the model convention
	protected $table = "drinks";



     public function getAllDrinks(){

     	$drinks = Drink::paginate(20);

     	return $drinks;
     }



}
