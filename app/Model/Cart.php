<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
        'product_id', 'product_quantity','product_price','user_ip'
    ];

    public function cartToProductJoin(){
        return $this->belongsTo(Product::class, 'product_id');
    }

}
