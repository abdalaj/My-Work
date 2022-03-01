<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foods extends Model
{
    protected  $fillable=[
        'name',
        'price',
        'old_qty',
        'qty_prush',
        'qty'
    ];
}
