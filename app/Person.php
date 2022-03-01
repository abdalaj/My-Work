<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    protected $table = 'persons';
    protected $fillable = [
        'name','type','mobile','is_client_supplier','region_id',
        'priceType','mobile2','address','remember_review_balance','remember_date','whoadd'];
    protected $with = ['totalDueRelation'];
    const TYPE_CLIENT = 'client';

    const TYPE_SUPPLIER = 'supplier';

    const TYPE_SALES = 'sales';

    public function transaction(){
        return $this->morphOne(BankTransaction::class,'transactionable');
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function meta(){
        return $this->hasOne(SaleMeta::class,'sale_id','id');
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class,'transactionable', 'model_type', 'model_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'client_id','id');
    }
    public function support()
    {
        return $this->hasMany(PersonSupport::class,'person_id','id')->latest();
    }
    public function returns()
    {
        return $this->hasMany(ReturnProduct::class,'client_id','id');
    }

    public function totalDueRelation(){
        return $this->hasOne(Transaction::class, 'model_id')
            ->selectRaw('model_id, SUM(value) AS sum')
            ->where('model_type', static::class)
            ->groupBy('model_id');
    }

    public function latestTransaction(){
        /*return $this->hasOne(Transaction::class, 'model_id')
            ->where('model_type', Person::class)
            ->latest()
            ->withDefault();*/

        return $this->transactions()->orderBy('id','DESC')->first();
    }


    public function latestOrder(){
        return $this->hasOne(Order::class, 'client_id')
            ->latest()
            ->withDefault();
    }

    public function getTotalDueAttribute(){
        $due = $this->totalDueRelation->sum ?? 0;
        //dd($due);
        if($due && abs($due)>1){
            return round($due,1);
        }else{
            $due = 0;
        }
        return $due;
    }

    public function getTotalDue(){
        return $this->transactions()->whereNull('deleted_at')->sum('value');
    }
    public function getBalnceTextAttribute(){
        $totaldue = $this->total_due;
        if($this->is_client_supplier){
            if($this->type=='client'){
                $p2 = Person::where('type','supplier')
                    ->where('name',$this->name)
                    ->where('is_client_supplier',1)
                    ->first();
                if($p2)
                    $totaldue = $totaldue - $p2->total_due;
            }else{
                $p2 = Person::where('type','client')
                    ->where('name',$this->name)
                    ->where('is_client_supplier',1)
                    ->first();
                if($p2)
                    $totaldue =  $totaldue - $p2->total_due;

            }
        }
        $value = currency(round(abs($totaldue),2), currency()->config('default'), currency()->getUserCurrency(),true);
        if($this->type=='client'){
            $balance = $totaldue>0?$value.' عليه (مدين) ':$value.' له (دائن) ';
        }else{
            $balance = $totaldue>0?$value.' له (دائن) ':$value.' عليه (مدين) ';
        }
        return $balance;
    }

    public function getBalnceValueAttribute(){
        $totaldue = $this->total_due;
        if($this->is_client_supplier){
            if($this->type=='client'){
                $p2 = Person::where('type','supplier')
                    ->where('name',$this->name)
                    ->where('is_client_supplier',1)
                    ->first();
                if($p2)
                    $totaldue = $totaldue - $p2->total_due;
            }else{
                $p2 = Person::where('type','client')
                    ->where('name',$this->name)
                    ->where('is_client_supplier',1)
                    ->first();
                if($p2)
                    $totaldue =  $totaldue - $p2->total_due;

            }
        }
        /*$value = currency(round(abs($totaldue),2), currency()->config('default'), currency()->getUserCurrency(),true);
        if($this->type=='client'){
            $balance = $totaldue>0?$value.' عليه (مدين) ':$value.' له (دائن) ';
        }else{
            $balance = $totaldue>0?$value.' له (دائن) ':$value.' عليه (مدين) ';
        }*/
        return $totaldue;
    }

    public function getLastOrderAttribute(){
        return $this->latestOrder->invoice_date;
    }
    public function getLastTransactionAttribute(){
        $last = $this->transactions()
            ->where('value','<',0)
            ->orderBy('id','DESC')
            ->first();
        if(isset($last->created_at)) {
            return $last->created_at->format('Y-m-d');
        }

        return null;
    }
    public function getLastTransactionValueAttribute(){
        $last = $this->transactions()->where('value','<',0)->orderBy('id','DESC')->first();
        if(isset($last->value)) {
            return abs($last->value);
        }

        return null;
    }
    public function getBalanceAttribute(){
        $value = '';
        $trans = $this->transactions()->where('note','رصيد أول المدة')->first();
        if($trans){
            $value = $trans->value;
        }
        return $value;
    }

    public function totalProduct(){
        return $this->hasManyThrough(OrderDetail::class,Order::class, 'client_id','order_id')
            ->selectRaw('product_id, SUM(qty) AS sum')
            ->groupBy('product_id');
    }
    public function totalٌReturn(){
        return $this->hasManyThrough(ReturnDetail::class,ReturnProduct::class, 'client_id','return_id')
            ->selectRaw('product_id, SUM(qty) AS sum')
            ->groupBy('product_id');
    }
    public function points(){
        return $this->hasMany(UserPoint::class,'user_id','id');
    }

    public function getTotalPointsAttribute(){
        return $this->points()->sum('balance');
    }

}
