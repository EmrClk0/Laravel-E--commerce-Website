<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\GameKey;
use App\Models\Game;


class StockCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
       $gameId= $request->route()->parameter('gameId');
       $stock = GameKey::where("game_id",$gameId)->get();
       $stock = count($stock);


       if($stock){
        return $next($request);
       }
       return redirect()->back()->with("error","NOT ENOUGH STOCK");
    }
}
