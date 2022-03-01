<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Expense extends Model
{
    //use LogsActivity;
    protected $table = 'expenses';
    protected $fillable = ['note','value','partner_id','expenses_type_id','employee_id','created_at'];

    //protected static $logAttributes = ['note','value','partner_id','expenses_type_id','employee_id','created_at'];
    public function partner(){
        return $this->belongsTo(Partner::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function type(){
        return $this->belongsTo(ExpensesType::class,'expenses_type_id','id');
    }
    public function transaction(){
        return $this->morphOne(BankTransaction::class,'transactionable');
    }
}
