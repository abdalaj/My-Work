<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class getmony extends Model
{
    protected $fillable = [
        'mony',
        'whoadd',
        'client_id'
    ];
}
