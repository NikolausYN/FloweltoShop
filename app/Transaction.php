<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function joinProduct(){
        return $this->belongsTo(Product::class, 'productid', 'id');
    }

    public function joinTransaction(){
        return $this->belongsTo('App\User', 'id');
    }

    protected $table='Transactions';

    protected $fillable = [
        'productid', 'userid','qty', 'subtotal',
    ];
}
