<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Drink;
use App\Ingredient;
use App\DrinkPhoto;
use App\IngredientType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Auth;
class AdminController extends Controller {

	/*
	*	Show the list of all drinks 
	*/

	public function index(){

		$db 	= new Drink;
		$drinks = $db->getAllDrinks();
		$data 	= array('drinks' => $drinks, 'page_title' => "Cocktails");

		return view('admin.main', $data);
	}

	/*
	*	Show the list of all ingredients 
	*/

	public function getIngredients(){

		$db 	= new Ingredient;
		$ingredients = $db->getAllIngredients();

		$db     = new IngredientType;
		$ingredient_types = $db->getAllIngredientTypes();

		$data 	= array('ingredients' => $ingredients, 'page_title' => "Ingredients", 'ingredient_types' => $ingredient_types);

		return view('admin.ingredients', $data);
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
		

		//print_r($data);
		//print_r(DB::getQueryLog());
		return view('admin/edit_drink', $data);

	}


	/*
	*	Get list if ingredient types 
	*/

	public function getIngredientTypes(){

		$db = new IngredientType;
		$ingr_types = $db->getAllIngredientTypesByPage();

		$data = [];
		$data['page_title'] = "Ingredient Types";
		$data['ingredient_types'] = $ingr_types;

		return view('admin/ingredient_types', $data);


	}

	/*
	* 	Save ingredient_type with list of ingredients 
	*/

	public function saveIngredientType(){


		if(Request::input('existing_ingredient') == 0)
		{

			// add a new ingredient type in database 
			$ingr = new IngredientType();
			$ingr->type = Request::input('ingredient_type');
			$ingr->save();
			
		}
		else
		$ingr = IngredientType::find(Request::input('existing_ingredient'));	
		// update the ingredients table to link them with this ingredient type 

		for($i = 1; $i <= 50; $i++ ){

			// skip if the checkbox was not selected 
			if(Input::has("ingredient-".$i)){
				 $ingr_item = Request::input('ingredient-'.$i);
				 $ingredient = Ingredient::find($ingr_item);

				 $ingredient->ingredient_type()->associate($ingr);
				 $ingredient->save();
			}

		}

		return redirect()->back();


	}


	public function login(){
		return view('auth.login', array("page_title"=>"Login"));
	}

	public function authorize(){

		$email = Request::input('email');
		$password = Request::input('password');

		if (Auth::attempt(['email' => $email, 'password' => $password, 'type'=> 1]))
        {
            return redirect()->intended('/admin/cocktails');
        }
        else
        	return redirect('/admin/')->with('message', 'Incorrect Email or Password');;


	}


}
