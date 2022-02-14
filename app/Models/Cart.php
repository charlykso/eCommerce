<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table = "cart";

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function getUser()
    {
        return $this->belongsTo(related: 'App\Models\User', foreignKey: 'user_id', ownerKey: 'id');
    }

    public function getProduct()
    {
        return $this->belongsTo(related: 'App\Models\Product', foreignKey: 'product_id', ownerKey: 'id');
    }
}
