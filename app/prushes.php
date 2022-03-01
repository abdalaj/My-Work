<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prushes extends Model
{
    protected $fillable=[
        'name',
        'price',
        'qty',
        'amount',
        'date'
    ];
}
