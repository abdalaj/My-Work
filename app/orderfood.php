<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderfood extends Model
{
    protected $fillable=[
        'name',
        'price',
        'qty',
        'order_id',
        'unique',
        'date'
    ];
    public function order()
    {
        return $this->belongsTo('App\order','order_id');
    }
}
