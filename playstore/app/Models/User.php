<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Basket;


class User extends Model
{
    use HasFactory;
    protected $table="users";
    protected $fillable = [
        'name',
        "email",
        "password",
        "phone_number"
    ];


    public function getBasket(){
        return $this->hasOne(Basket::class,"user_id","id");
    }
}
