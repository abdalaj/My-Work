<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expire extends Model
{
    protected $fillable=[
        'name',
        'price',
        'date',
        'store'
    ];
}
