<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class win extends Model
{
    protected $fillable = [
        'name',
        'type',
        'mony',
        'staff_id'
    ];
}
