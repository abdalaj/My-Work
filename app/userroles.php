<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userroles extends Model
{
    protected $fillable = [
        'user_id',
        'roles_id'
    ];
}
