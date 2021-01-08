<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id','product_id',
    ];

    public function wishlistToProductJoin(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
