<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publisher extends Model
{
    protected $fillable=[
        'id',
        'name',
        'number_makina',
        'volum_almaza',
        'qty_publish',
        'volum_amount',
        'volum_publish',
        'number_smears',
        'number_tables',
        'copy_number_tables',
        'height',
        'width',
        'volum',
        'safy',
        'price',
        'amount',
        'price_mears',
        'amount_mears',
        'amount_all',
        'price_charge',
        'amount_all_plus',
        'safym2',
        'amount_with_safym2',
        'date',
        'tip',
        'order_id',
        'important_id',
        'name_client',
        'store_id',
        'month'
    ];
    public function order()
    {
        return $this->belongsToMany('App\order');
    }
    public function important()
    {
        return $this->belongsTo('App\important');
    }

    public function exporter()
    {
        return $this->hasMany('App\exporter');
    }

    public function store()
    {
        return $this->belongsToMany('App\store');
    }
}
