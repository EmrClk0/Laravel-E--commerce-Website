<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GameKey;

class Game extends Model
{
    use HasFactory;
    protected $table="games";
    protected $fillable = [
        'name',
        "price",
        "image",
        "description"
    ];

    public function getGameKeys(){
        return $this->hasMany(GameKey::class,"game_id","id");
    }
}
