<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class serial extends Model
{
    protected $fillable=[
        'is_sell',
        'serial',
        'product_id'
    ];
    public function Product(){
        return $this->belongsTo('App\Product');
    }
}
