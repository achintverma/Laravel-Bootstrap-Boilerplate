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

	public function getAllIngredientTypesByPage(){

		$ingredient_types =  IngredientType::with('ingredients')->get();
		

		return $ingredient_types;

	}

}
