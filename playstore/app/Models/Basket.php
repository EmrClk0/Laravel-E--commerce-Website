<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BasketProduct;
use App\Models\Game;

class Basket extends Model
{
    use HasFactory;
    protected $table = "baskets";
    protected $fillable = [
        'user_id',
       
    ];
    /*
    public function getGames(){
        
        return $this->belongsToMany(Game::class,"basket_products","basket_id","game_id");
    }
    */

    public function getBasketProducts(){
        return $this->hasMany(BasketProduct::class,"basket_id","id");
    }
}
