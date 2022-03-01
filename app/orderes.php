<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderes extends Model
{
    protected $fillable=[
        'name',
        'many',
        'phone',
        'city',
        'carya',
        'describ',
        'price',
        'details',
        'user_item_id'
    ];
}
