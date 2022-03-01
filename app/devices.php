<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class devices extends Model
{
    protected $fillable=[
        'name',
        'time',
        'price',
        'active',
        'img',
        'room_id'
    ];
}
