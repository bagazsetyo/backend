<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transaction extends Model
{

     use SoftDeletes;


    // meshassigment bisa input data secara langsung
    protected $fillable = [
    	'uuid','nama','email','number','address','transaction_total','transaction_status'
    ];

    protected $hidden = [

    ];

    public function details()
    {
        return $this->hasMany(TransactionsDetail::class,'transactions_id');
    }
}
