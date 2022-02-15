<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'gallery',
        'category'
    ];


    public function getHowManyInCart()
    {
        return $this->hasMany('App\Models\Cart');
    }

     public function getHowManyOrders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
