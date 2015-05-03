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


		$data 				= [];		
		$data['page_title'] = "Search Page";
		$data['drinks'] 	= $allDrinks;
 
		return view('pages.search',$data);
			

	}

	/*
	*  Get a Drink Detail Page By Slug
	*  @param slug String
	*/

	public function getDrink($slug){

		$obj = new Drink;

		$drink = $obj->getDrinkBySlug($slug);

		$data = [];		
		$data['page_title'] = $drink->drink_name;
		$data['drink'] = $drink;
 
		return view('pages.drink',$data);

	}

	/*
	*  Get a Drink Detail Page By ID
	*  @param id integer
	*/

	public function getDrinkById($id){

		$obj = new Drink;

		$drink = $obj->find($id);

		$data = [];		
		$data['page_title'] = $drink->drink_name;
		$data['drink'] = $drink;
 
		return view('pages.drink',$data);

	}


}
