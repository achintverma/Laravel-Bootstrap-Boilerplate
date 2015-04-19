<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Drink;
use Illuminate\Contracts\View\Factory;

class DrinksController extends Controller {

	
	public function search($id = 1){
		
		$drinker = new Drink;

		$allDrinks = $drinker->getAllDrinks();


		$data = [];		
		$data['page_title'] = "Search Page";
		$data['drinks'] = $allDrinks;
 
		return view('pages.search',$data);
			

	}

	public function getDrink($slug){

		$obj = new Drink;

		$drink = $obj->getDrinkBySlug($slug);

		$data = [];		
		$data['page_title'] = $drink->drink_name;
		$data['drink'] = $drink;

		return view('pages.single_drink',$data);

	}


}
