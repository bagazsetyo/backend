<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ProductGallery extends Model
{
     use SoftDeletes;


    // meshassigment bisa input data secara langsung
    protected $fillable = [
    	'products_id','photo','is_default'
    ];

    protected $hidden = [

    ];

    // relasi
    public function product()
    {
    	return $this->belongsTo(Product::class,'products_id','id');
    }


    // menggunakan assesor dan mutator agar menyertakan url pada foto
    //get bawaan laravel, Photo fild di database, attribute bawaan laravel
    public function getPhotoAttribute($value)
    {
    	//jika ingin menggunakan storage pada laravel harus menjalankan perintah
    	//php artisan storage:link
    	return url('storage/' . $value); 
    }

}
