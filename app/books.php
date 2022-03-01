<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected  $fillable=[
        'name',
        'price',
        'summry',
        'number',
        'imghome',
        'securty',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
        'charge',
        'describ',
        'discount',
        'saler',
        'stauts',
        'address',
        'color',
        'size',
        'installment',
        'recover',
        'user_item_id'
    ];
}
