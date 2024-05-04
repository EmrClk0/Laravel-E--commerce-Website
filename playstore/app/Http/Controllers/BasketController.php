<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasketProduct;
use App\Models\GameKey;
use App\Models\User;
use Mail;

class BasketController extends Controller
{

    public function showBasketPage(){
        $user  = User::find(session("user")->id);
        session(['user' => $user]);

        $basketProducts= session("user")->getBasket->getBasketProducts;
    
        return view("ecommer.basket",compact("basketProducts"));
    }


    public function addBasket($gameId){
       // game stock kontrol??
       //ekleme satın almada middleware kullan
       /*
        $tf=BasketProduct::create([
            "basket_id" => session("user")->getBasket->id,
            "game_id" =>   $gameId
        ]);

        if($tf->exists){
            return redirect()->back()->with("success","You added a item into your cart");
        }else{
            return redirect()->back()->with("error","Something is wrong");
        }*/

        $Product= BasketProduct::where([
            "basket_id" => session("user")->getBasket->id,
            "game_id" =>   $gameId
        ])->get();
        
        if(count($Product)){
            $Product= $Product[0];
            // kayıt var adet güncelle
            $Product->piece +=1;
            $Product->save(); 

            
            
        }else{
            BasketProduct::create([
                "basket_id" => session("user")->getBasket->id,
                "game_id" =>   $gameId,
                "piece" => 1
            ]);
            
           
        }

        return redirect()->back()->with("success","You added a item into your cart");
    }

    public function removeProduct($basketProductId){
        $basketProduct=BasketProduct::find($basketProductId);
        if(!empty($basketProduct)){
            $basketProduct->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }


    public function decreasePiece($basketProductId){
        $basketProduct=BasketProduct::find($basketProductId);
        $basketProduct->piece -=1;
        $basketProduct->save();
        return redirect()->back();

    }
    
    public function increasePiece($basketProductId){

        $basketProduct=BasketProduct::find($basketProductId);
        $basketProduct->piece +=1;
        $basketProduct->save();
        return redirect()->back();

    }

    


    public function r($e){
        return "fdfsd";
    }









    public function checkout(Request $request){
        
        $emailGreetingMessage = "<h1> THANKS FOR PURCHASE FROM US </h1>";
        $emailGreetingMessage .= "<h2> Dear ".session("user")->name." you can find your keys on the following of this mail. <br>";

        $emailProductMessage="";
        $soldKeys =[];
       
        $basketProducts = $request->basketProducts; //?

        $basketProducts= session("user")->getBasket->getBasketProducts; //?
        
        
        if(count($basketProducts)==0){

            return redirect()->back()->with("error","add item");

        }else{

            foreach($basketProducts as $basketProduct){

                $game = $basketProduct->getGame;
                $pieceInTheBasket= $basketProduct->piece;

                $keys = $game->getGameKeys;
                $realPiece = count($keys);
                

                if($pieceInTheBasket >$realPiece){

                    return back()->with("error","Too much piece for ".$game->name);

                }else{

                    
                    $emailProductMessage.="<h3>" .$game->name."    KEYS </h3> <br>";
                    $emailProductMessage.= "<ul>";
                    
                    

                    for($i=0; $i<$pieceInTheBasket; $i++){
                        $emailProductMessage .= "<li>".$keys[$i]->key."</li>";
                        array_push($soldKeys,$keys[$i]);

                    }
                    $emailProductMessage.= "</ul>  <br>";

                    

                    
                }
            }


            Mail::send([],[],function($message) use ($emailGreetingMessage,$emailProductMessage){
                $message->from("******","BEST KEYS");
                $message->to(session("user")->email);
                $message->setBody($emailGreetingMessage. $emailProductMessage,"text/html");
                $message->subject("GAME KEYS");

            });


                // mail gönder
            foreach($basketProducts as $basketProduct){
                $basketProduct->delete();
            }
            foreach($soldKeys as $soldKey){
                $soldKey->delete();
            }

            return redirect()->route("homePage")->with("success","PURCHASE SUCCESFULL");

            
        }

        
    }
}
