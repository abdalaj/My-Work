<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shorka extends Model
{
    protected $fillable = [
        'name',
        'prec',
        'amount'
    ];
}
