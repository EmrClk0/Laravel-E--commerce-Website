<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameKey;
use App\Models\Categories;
use App\Models\GameCategory;






class AdminController extends Controller
{
    public function gameData(){
        $games = Game::all();
        
        return view("panel.gameData",compact("games"));
    }

    public function showAddGame(){
        return view("panel.addGame");
    }

    public function addGameProccess(Request $request){
        $request->validate([
            "gameName"=> "required",
            "gamePrice" =>"required|regex:/[0-9]+/",
            "gameDescription"=>"required",
            "gameImage" =>"required|image|mimes:png,jpg,jpeg"

        ]);
        $imageExt = $request->gameImage->getClientOriginalExtension();
        $imageName = uniqid().".".$imageExt;
        $upload = $request->gameImage->move(public_path("images/gameImages"),$imageName);
        $newGame = Game::create([
            "name" => $request->gameName,
            "price" => $request->gamePrice,
            "image" => $imageName,
            "description" => $request->gameDescription
        ]);

        return redirect()->back()->with("success","GAME SAVED SUCCESFULLY");

    }

    public function showAddGameKey($gameId=null){
        if($gameId==null){
            $games = Game::all();
            return view("panel.addGameKey",compact("games"));
        }else{
            $game = Game::find($gameId);
            $gameKeys = $game->getGameKeys;
            
            return view("panel.addGameKeyPost",compact("game","gameKeys"));
        }
        
    }


    public function addGameKeyProccess(Request $request){
        $request->validate([
            
            "gameKey" =>[
                "required",
                "regex:/^([A-Z0-9]){5}-([A-Z0-9]){5}-([A-Z0-9]){5}/"
            ],
        ]);
        
        $gameKey=GameKey::where([
            "game_id" => $request->gameId,
            "key" => $request->gameKey
        ])->get();

        if(count($gameKey)==0){
            GameKey::create([
                "game_id" => $request->gameId,
                "key" => $request->gameKey
            ]);
    
            return redirect()->back()->with("success","key logged");

        }else{
            return redirect()->back()->with("error","key already exits");
        }

        

    }



    public function showGameCategory($gameId=null){
            $games = Game::all();
            $categories = Categories::all();

            $selectedCategories = GameCategory::where("game_id",$gameId)->get();
           
           

            
           
            return view("panel.gameCategory",compact("games","gameId","categories","selectedCategories"));
       
        
    }





    public function gameCategoryProccess(Request $request){

        $newCategories= $request->categories;// array
        $gameId= $request->gameId;
        GameCategory::where("game_id",$gameId)->delete();
        if($newCategories!=NULL){
            foreach($newCategories as $newCategory){
                GameCategory::create([
                    "game_id"=>$gameId,
                    "category_id" => $newCategory
                ]);
    
            }
        }
        
        return redirect()->back();
        
        // birebir eşleşme varsa bırak
        //silmediiği?


    }
}
