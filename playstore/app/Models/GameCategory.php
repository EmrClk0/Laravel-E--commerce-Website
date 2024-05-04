<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class GameCategory extends Model
{
    use HasFactory;
    protected $table="game_categories";
    protected $fillable = [
        'game_id',
        "category_id"
        
    ];

    
}
