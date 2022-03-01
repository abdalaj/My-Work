<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $fillable = [
        'name',
        'type',
        'phone',
        'salery',
        'days',
        'salery_days',
        'date',
        'notes'
    ];
}
