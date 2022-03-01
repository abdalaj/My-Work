<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $fillable=[
        'name',
        'room_id',
        'start',
        'copy_start',
        'end',
        'hours',
        'price',
        'fully',
        'unique',
        'date'
    ];
    public function orderfood()
    {
        return $this->hasMany('App\orderfood','order_id');
    }
}
