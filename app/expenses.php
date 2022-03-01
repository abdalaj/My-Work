<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    protected $fillable = [
        'name',
        'bank_id',
        'prushes_type',
        'prushes_id',
        'mony',
        'date'
    ];
}
