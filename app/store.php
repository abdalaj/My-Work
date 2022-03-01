<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    protected $fillable=[
        'name'
    ];

    public function important()
    {
        return $this->hasMany('App\important');
    }
    public function exporter()
    {
        return $this->hasMany('App\exporter');
    }
    public function publisher()
    {
        return $this->hasMany('App\publisher');
    }
}
