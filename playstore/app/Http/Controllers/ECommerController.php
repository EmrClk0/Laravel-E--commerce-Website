<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Game;
use App\Models\GameCategory;

use Illuminate\Http\Request;

class ECommerController extends Controller
{
    public function showHomePage(){
        
        //tüm oyunları çek yolla
        $allGames = Game::all();
        
        return view("ecommer.home",compact("allGames"));
    }


    public function showCategoryPage($categoryName){

       
        $category=Categories::where("name",$categoryName)->first();
        
        $categoryGames= $category->getGames;
        
        return view("ecommer.category",compact("categoryGames","categoryName"));

    }

    public function showLoginPage(){
        return view("ecommer.authentication.login");
    }


    public function showRegisterPage(){
        return view("ecommer.authentication.register");
    }

    public function showBasketPage(){
        return view("ecommer.basket");
    }


    public function userLogout(Request $request){
        $request->session()->forget("user");
        return redirect()->route("homePage");

    }
}
