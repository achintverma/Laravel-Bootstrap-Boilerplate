<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model {

	// define the name of the table associated with this
	protected $table  = "ingredients"; 

	public function drinks(){

		return $this->belongsToMany("App\Drink", "drink_ingredients", "drink_id", "ingredient_id");

	}

	public function getIngredientByName($name){

		return Ingredient::where('ingredient','LIKE','%'.$name.'%')->take(10)->get(['id','ingredient']);

	}


	/*
	*	Get all ingredients wih pagination. This function is used in admin panel
	*/

	public function getAllIngredients(){

		$ingredients 	= Ingredient::paginate(50);
		return $ingredients;
	}



	/*
	* Function to delete ingredient
	**/

	public function deleteIngredint($id){

		$in = Ingredient::find($id);

		$ingredient_id = $in->id;

		$in->delete();

		return $ingredient_id;

	}


}
