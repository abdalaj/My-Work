<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $fillable = ['value','note','record_id','transaction_type','created_at','sale_id'];

    public function transactionable()
    {
        return $this->morphTo();
    }

    public function sale(){
        return $this->belongsTo(Employee::class,'sale_id','id');
    }
}
