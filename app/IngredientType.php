<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientType extends Model {

	//
	protected $table = "ingredient_types";

	function ingredients(){

			return $this->hasMany("App\Ingredient");

	}


}
