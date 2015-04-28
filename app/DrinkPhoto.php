<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DrinkPhoto extends Model {

	//
	protected $table = "drink_photos";

	function drink(){

			$this->belongsTo("App\Drink",'id','drink_id');

	}


}
