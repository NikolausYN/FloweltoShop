<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function joinCategory(){
        return $this->belongsTo('App\Category', 'id', 'id');
    }

    public function joinCart(){
        return $this->belongsTo(Cart::class, 'id', 'id');
    }

    public function joinTransaction(){
        return $this->belongsTo(Transaction::class, 'id', 'id');
    }

    protected $table = 'product';

    protected $fillable = [
        'catid', 'productname', 'productdesc', 'productprice', 'productimg'
    ];
}
