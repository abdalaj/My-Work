<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class important extends Model
{
    protected $fillable=[
        'id',
        'name',
        'number_herfy',
        'number_factory',
        'number_client',
        'name_client',
        'qty',
        'height',
        'width',
        'volum',
        'safy',
        'discount',
        'safy_after',
        'price',
        'amount',
        'date',
        'order_id',
        'store_id',
        'month',
        'is_return'
    ];

    public function publisher()
    {
        return $this->hasMany('App\publisher');
    }

    public function order()
    {
        return $this->belongsToMany('App\order');
    }

    public function store()
    {
        return $this->belongsToMany('App\store');
    }
}
