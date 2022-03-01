<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Partner extends Model
{
    protected $table = 'partners';
    protected $fillable = ['name','value','percent'];

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
