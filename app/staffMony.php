<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staffMony extends Model
{
    protected $fillable = [
        'name',
        'mony',
        'bank_id',
        'staff_id',
        'prushes_id'
    ];
}
