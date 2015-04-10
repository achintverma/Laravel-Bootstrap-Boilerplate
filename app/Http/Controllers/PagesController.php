<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Drink;

class PagesController extends Controller {

	//
	public function about(){


		$db = new Drink;

		$drinks = $db->getAllDrinks();

		// var_dump($drinks);

		$data = array('drinks' => $drinks, 'page_title' => "Cocktails");

		return view('pages.about', $data);

	}

	public function create($name = 'Default'){

		//return $fname." ".$lname;



		return view('pages.create', ['name'=>$name]);

	}


}
