<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bankTransaction extends Model
{
    protected $fillable = [
        'name',
        'mony',
        'amount_after',
        'type',
        'whoadd',
        'bank_id',
    ];
}
