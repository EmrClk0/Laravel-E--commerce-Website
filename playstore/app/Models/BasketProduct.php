<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class BasketProduct extends Model
{
    use HasFactory;
    protected $table = "basket_products";
    protected $fillable = [
        'basket_id',
        "game_id",
        "piece"
       
    ];



    public function getGame(){
        return $this->hasOne(Game::class,"id","game_id");
    }
}
