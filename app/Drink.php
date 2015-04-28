<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Drink extends Model {

	// specify a table name since it can be differnt from the model convention
	protected $table = "drinks";
	
	protected $fillable = ['drink_name']; 

    /* Get list of all drinks
     * return Drinks[] 
	 */

    // Create relationship between ingredients  
    public function ingredients(){

        return $this->belongsToMany("App\Ingredient", "drink_ingredients", "drink_id", "ingredient_id")->withPivot("qty");

    }

    public function photos(){

        $this->hasMany('App\DrinkPhoto','id','drink_id');
    }

    /*
    *   Get a lisk of unique glasses   
    *
    *
    */
    public function getUniqueGlasses(){

        return $glasses = Drink::distinct()->get(array('glass'));

    }


    public function getAllDrinks(){

     	$drinks = Drink::paginate(20);
     	return $drinks;
     }


    /*
    	Get Drink by slug (SEO frindly text URL)

    	@param string slug
    	@return App\Drink

    */

    public function getDrinkBySlug($slug){

    	$drinks =  Drink::where('slug','=',$slug)->take(1)->get();
        return $drinks[0];

    }	

    public function deleteDrink($id){

        $drink = Drink::find($id);
        $id = $drink->id;

        $drink->delete();
        return $id;

    }

    


}
