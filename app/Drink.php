<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Drink extends Model {

	// specify a table name since it can be differnt from the model convention
	protected $table = "drinks";
	
	protected $fillable = ['drink_name']; 

    /* Get list of all drinks
     * return Drinks[] 
	 */

    public function getAllDrinks(){

     	$drinks = Drink::paginate(20);
     	return $drinks;
     }


    // Create relationship between ingredients  
	public function ingredients(){

		return $this->belongsToMany("App\Ingredient", "drink_ingredients", "drink_id", "ingredient_id")->withPivot("qty");

	}



}
