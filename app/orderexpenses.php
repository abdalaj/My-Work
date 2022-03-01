<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderexpenses extends Model
{
    protected $fillable=[
        'name',
        'price',
        'date',
    ];
}
