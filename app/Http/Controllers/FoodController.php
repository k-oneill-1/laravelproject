<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    //render page and pass food data to front 

    public function CreateFood()
    {
        $foods = Food::all();
       // $foods = DB::table('foods')->get();

    
        return Inertia::render('/create-food', ['foods' => $foods]);
    }


//autocomplete functionality, 'pluck' for column items

    
public function index()
{
    $foods = Food::all();
    //$foods = DB::table('foods')->get();

    return Inertia::render('/create-food', [
        'foods' => $foods,
        'foodOptions' => $foods->pluck('product'),
    ]);
}

//AFTER user has entered food and value:
//fetch the food from the foods table and get associated values

public function foodDetails (Request $request)
{
    $selectedFoodId = $request->input('selectedFood');

    // retrieve the  food  details based on the ID
    $foodDetails = Food::findOrFail($selectedFoodId);

    // get the nutrient values for protein, fat, carbs, and calories per 100g from the food item's data
    //put them in separate variable to use for calculation

    $proteinPer100g = $foodDetails->protein_100g;
    $fatPer100g = $foodDetails->fat_100g;
    $carbsPer100g = $foodDetails->carbs_100g;
    $caloriesPer100g = $foodDetails->calories_100g;
}

//query food table (id) and return data associated 
 
public function getFoodById($id)
{

    $foodDetails = Food::findOrFail($id);

    return $foodDetails;
}


//calculate the values for the total calories, protein, fat, and carbs
//based on the user entered weight

public function calculateDetails (Request $request)

{
    $selectedFoodId = $request->input('selectedFood');
    $foodDetails = $this->getFoodById($selectedFoodId);

    // get the user's entered weight from the request data
    $userEnteredWeight = $request->input('weight');

    // Calculate values
    $protein = $proteinPer100g * $userEnteredWeight / 100; 
    $fat = $fatPer100g * $userEnteredWeight / 100;
    $carbs = $carbsPer100g * $userEnteredWeight / 100;
    $calories = $caloriesPer100g * $userEnteredWeight / 100;


   return; //Next have to Create and store the calculated values

}


//I think I'm making it into too many functions?
//below needs updating, should call it FOOD ITEM, later it will be 
//a DAILY RECORD of mutliple food items
// 




}
