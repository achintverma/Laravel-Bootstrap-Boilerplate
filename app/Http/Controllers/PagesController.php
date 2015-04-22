<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Drink;
use Illuminate\Contracts\View\Factory;

class PagesController extends Controller {

	//
	public function index(){


		$db = new Drink;

		$drinks = $db->getAllDrinks();

		// var_dump($drinks);

		$data = array('drinks' => $drinks, 'page_title' => "Cocktails");

		return view('pages.about', $data);

	}


	public function register(){
		return view('auth.register');
	}


}
