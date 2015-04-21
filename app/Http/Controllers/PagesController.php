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

	public function create($name = 'Default'){

		view()->share('page_title', 'User Form');
		
		return view('pages.create', ['name'=>$name]);
			

	}

	public function search(){
		

		$data = [];		
		$data['page_title'] = "Search Page";
 
		return view('pages.search',$data);
			

	}

	public function register(){
		return view('auth.register');
	}


}
