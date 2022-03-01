<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    protected $table = 'bank_transactions';

    protected $fillable = [
	    'bank_id',
	    'op_date',
	    'value',
	    'type',
	    'total',
	    'due',
	    'note',
        'record_id',
        'transactionable_type',
        'transactionable_id'
    ];

    public function transactionable(){
        return $this->morphTo();
    }

    public function getValueAttribute($value)
    {
        return currency($value,$this->bank->currency,$this->bank->currency, $format = true);
    }
    public function getTotalAttribute($value)
    {
        return currency($value,$this->bank->currency,$this->bank->currency, $format = true);
    }
    public function getDueAttribute($value)
    {
        return currency($value,$this->bank->currency,$this->bank->currency, $format = true);
    }
    public function bank(){
        return $this->belongsTo(Bank::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

}
