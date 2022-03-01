<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    protected $fillable=[
        'facebook',
        'twitter',
        'instagrame',
        'youtube'
    ];
}
