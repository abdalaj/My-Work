<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exporter extends Model
{
    protected $fillable=[
        'id',
        'name',
        'code',
        'describ',
        'qty',
        'height',
        'volum',
        'safym2',
        'price',
        'amount',
        'qty_refuse',
        'allqty_refuse',
        'amount_refuse',
        'qty_found',
        'qtyall_found',
        'amount_found',
        'import_miuns_publish_befor_discount',
        'import_miuns_publish_after_discount',
        'import_miuns_export',
        'god',
        'number_hawya',
        'name_client',
        'date',
        'order_id',
        'publisher_id',
        'store_id',
        'month',
        'is_return'
    ];

    public function order()
    {
        return $this->belongsToMany('App\order');
    }
    public function publisher()
    {
        return $this->belongsTo('App\publisher');
    }
    public function store()
    {
        return $this->belongsToMany('App\store');
    }
}
