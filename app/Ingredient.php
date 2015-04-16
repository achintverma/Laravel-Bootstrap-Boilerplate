<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model {

	// define the name of the table associated with this
	protected $table  = "ingredients"; 

	public function drinks(){

		$this->belongsToMany("App\Drink", "drink_ingredients", "drink_id", "ingredient_id");

	}

}
