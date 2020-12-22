<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function joinProduct(){
        return $this->belongsTo(Product::class, 'productid', 'id');
    }

    public function joinCart(){
        return $this->belongsTo('App\User', 'id');
    }

    protected $table='Carts';

    protected $fillable = [
        'productid', 'userid','qty', 'subtotal',
    ];
}
