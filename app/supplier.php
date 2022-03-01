<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $fillable=[
        'name',
        'number_phone',
        'address',
        'whoadd',
        'code',
        'type',
        'due'
    ];
}
