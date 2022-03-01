<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchases extends Model
{
    protected $fillable = [
        'name',
        'qty',
        'price',
        'describe',
        'date',
        'order_id',
        'client_id',
        'is_return'
    ];
}
