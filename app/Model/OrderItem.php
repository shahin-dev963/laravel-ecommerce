<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];

    public function OrderItemToProductJoin(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
