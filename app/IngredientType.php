<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientType extends Model {

	//
	protected $table = "ingredient_types";

	public function ingredients(){

			return $this->hasMany("App\Ingredient");

	}

	public function getAllIngredientTypes(){

		return IngredientType::orderBy('type','desc')->get();

	}

}
