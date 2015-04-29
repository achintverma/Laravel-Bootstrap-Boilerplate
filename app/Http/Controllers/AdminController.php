<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Drink;
use App\Ingredient;
use App\DrinkPhoto;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller {

	/*
	*	Show the list of all drinks 
	*/

	public function index(){

		$db 	= new Drink;
		$drinks = $db->getAllDrinks();
		$data 	= array('drinks' => $drinks, 'page_title' => "Cocktails");

		return view('pages.about', $data);
	}

	/*
	*  Show a page to add a new cocktail
	*/

	public function addDrink(){

		$dr = new Drink;

		$data = [];
		//$data['ingredients'] = 
		$data['page_title'] = "Add a cocktail";
		$data['glasses'] = $dr->getUniqueGlasses();

		return view('admin.add_drink', $data);
	}
		
	/*
	*  Save the drink added through the backend
	*/	

	public function createDrink(){


		//print_r($_POST);

		 $dr = new Drink;

		 $dr->drink_name 	= Request::input('drink_name');
		 $dr->glass      	= Request::input('glass');
		 $dr->is_top_drink 	= Request::input('top_drink');	
		 $dr->excerpt 		= Request::input('excerpt');
		 $dr->description 	= Request::input('instructions');	

		 $ingr_data = array();

		 for($i=1;$i<=10;$i++)
		 {
		 	if(Request::input('ingr-id-'.$i) != "")
		 		$ingr_data[Request::input('ingr-id-'.$i)] = array("qty"=>Request::input('qty-'.$i));

		 }
		 
		// Save the drink
		 $dr->save();

		 $filename = "";

		 // save the file on server 
		 if (Request::hasFile('drink_file')) // if the file is uploaded
		 {
		 	$file = Request::file("drink_file");

		 	$filename = $dr->drink_name."-".time().".".$file->getClientOriginalExtension();
		 	$savepath = "uploads";

		 	$file->move($savepath, $filename);

		 	$photo = new DrinkPhoto;
			$photo->filename = $filename;
			$photo->drink_id = $dr->id;
			$photo->save();


		 }
		 
		 // save the ingredients associated with the drink
		 $dr->ingredients()->attach($ingr_data);

		 

	}

	/*
	* 	Pull the list of ingredients based on the input
	*   @return JSON
	*/

	public function getIngredientsAjax($name){

		$ingr = new Ingredient;
		$ingredients = $ingr->getIngredientByName($name);

		$json_array = [];

		foreach ($ingredients as $ingredient) {
			
			$json_array[$ingredient->id] = $ingredient->ingredient;
		}

		return response()->json($json_array);

	}

	/*
	* 	Show Edit Drink Page	
	*/

	public function editDrink($id){

		DB::enableQueryLog();

		$drink = new Drink;
		$drink = $drink->find($id);

		$data = [];
		$data['page_title'] = "Edit: ".$drink->drink_name;
		$data['drink']		= $drink;
		$data['glasses'] 	= $drink->getUniqueGlasses();
		$data['photos'] 	= $drink->photos;

		//print_r($data);
		//print_r(DB::getQueryLog());
		return view('admin/edit_drink', $data);

	}


	public function register(){
		return view('auth.register');
	}


}
