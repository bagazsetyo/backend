<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;


    // meshassigment bisa input data secara langsung
    protected $fillable = [
    	'products_id','transactions_id'
    ];

    protected $hidden = [

    ];

    //relasi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transactions_id','id');
    }

    public function product()
    {
    	return $this->belongsTo(Product::class,'products_id', 'id');
    }
}
