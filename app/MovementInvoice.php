<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovementInvoice extends Model
{
    protected $table = 'movement_invoice';
    protected $fillable = ['note','created_at'];

    public function detailes(){
        return $this->hasMany(Movement::class,'invoice_id','id');
    }
}
