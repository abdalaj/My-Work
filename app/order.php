<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable=[
        'client_id',
        'invoice_type',
        'invoice_number',
        'payment_type',
        'total',
        'currency',
        'paid',
        'due',
        'tax',
        'note',
        'whoadd',
        'created_at'
    ];
    public function important()
    {
        return $this->hasMany('App\important','order_id','invoice_number');
    }
    public function exporter()
    {
        return $this->hasMany('App\exporter','order_id','invoice_number');
    }
    public function publisher()
    {
        return $this->hasMany('App\publisher','order_id','invoice_number');
    }
}
