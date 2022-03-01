<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    protected $fillable = ['store_id', 'product_id','qty','unit_id'];

    public function store(){
        return $this->belongsTo(Store::class,'store_id','id')->withTrashed();
    }

    public function product(){
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function unit(){
        return $this->belongsTo(Unit::class)->withTrashed();
    }
}
