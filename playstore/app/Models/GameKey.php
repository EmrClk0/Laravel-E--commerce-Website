<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameKey extends Model
{
    use HasFactory;
    protected $table="game_keys";
    protected $fillable = [
        'game_id',
        "key"
        
    ];
}
