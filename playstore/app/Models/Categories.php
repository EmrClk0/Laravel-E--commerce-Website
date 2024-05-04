<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GameCategory;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = [
        'id',
        'name',
    ];

    public function getGameCategory(){
        return $this->hasMany(GameCategory::class,"category_id");
    }

    public function getGames(){
        return $this->belongsToMany(Game::class,"game_categories","category_id","game_id");
    }
}
