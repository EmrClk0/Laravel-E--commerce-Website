<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AuthenticationController extends Controller
{
    public function validateRegister(Request $request){
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:rfc,dns',
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]+/',      // must contain at least one lowercase letter
                'regex:/[A-Z]+/',      // must contain at least one uppercase letter
                'regex:/[0-9]+/',       // must contain at least one digit
                
            ], 
            'password_confirm' =>'required|same:password',
            //'phone_number' => '',
            'terms'=>'required',
        ]);

        $isUserExist=User::where("email",$request->email)->count();

        if($isUserExist){
            return back()->with("error","There is a already a user with $request->email");
        }else{

           User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
            "phone_number"=>$request->phone_number,
           ]);
            // SQL TETİKLEYİCİ OLUŞTUR?
            $user = User::where("email",$request->email)->first();
           
            Basket::create([
                "user_id" => $user->id,
            ]);

            return redirect()->route("loginPage")->with("success","REGISTRATION PROCESS SUCCESSFUL. YOU ARE ABLE TO LOGIN");
           
        }

        
        
    }

    
    public function validateLogin(Request $request){
        $user = User::where(["email" => $request->email,"password" => $request->password
        ])->first();

        //return  " <br>$request->email <br> $request->password <br> $user   <br>";
       
        if($user){
           
           
            session(['user' => $user]);
            return redirect()->route("homePage");
            
            
        }else{
            return back()->with("error","USER INFORMATION DOESN'T MATCH");
            
            
        }

    }





}
