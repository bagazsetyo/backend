<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
// request falidation di http\request

class Product extends Model
{
    use SoftDeletes;


    // meshassigment bisa input data secara langsung
    protected $fillable = [
    	'name','slug','type','description','price','quantity'
    ];

    protected $hidden = [

    ];

    // relasi
    public function galeries()
    {
    	return $this->hasMany(ProductGallery::class,'products_id');
    }
}
