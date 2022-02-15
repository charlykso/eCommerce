<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'status',
        'payment_method',
        'payment_status',
        'address'
    ];


        public function getUserFromOrder()
    {
        return $this->belongsTo(related: 'App\Models\User', foreignKey: 'user_id', ownerKey: 'id');
    }

    public function getProductFromOrder()
    {
        return $this->belongsTo(related: 'App\Models\Product', foreignKey: 'product_id', ownerKey: 'id');
    }
}
