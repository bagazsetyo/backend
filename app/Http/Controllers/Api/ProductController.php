<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    //copy
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $product = Product::with('galeries')->find($id);

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }


        if($slug)
        {
            $product = Product::with('galeries')
                ->where('slug', $slug)
                ->first();

            if($product)
                return ResponseFormatter::success($product,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }

        $product = Product::with('galeries');

        if($name)
            $product->where('name', 'like', '%' . $name .'%');

        if($type)
            $product->where('type', 'like', '%' . $type .'%');

        if($price_from)
            $product->where('price', '>=', $price_from);

        if($price_to)
            $product->where('price', '<=', $price_to);

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data list produk berhasil diambil'
        );



    }

	// //mengambil data berdasarkan kebutuhan
 //    public function all(Request $request)
 //    {

 //    	$id = $request->input('id');
 //    	$limit = $request->input('limit',6);
 //    	$name = $request->input('name');
 //    	$slug = $request->input('slug');
 //    	$type = $request->input('type');
 //    	$price_from = $request->input('price_from');
 //    	$price_to = $request->input('price_to');




	//     // if ($id) 
	//    	//  {
	//     // 	$product = Product::with('galeries')
	//     // 	->where('slug',$slug)
	//     // 	->first();
	    	
	//     // 	//karena di dalam if,true nya cuma ada 1 kondisi maka tidak menggunakan kurung kurawal
	//     // 	if ($product)
	//     // 		return ResponseFormatter::success($product,'Data Produck Berhasil di ambil');	
	//     // 	else
	//     // 		return ResponseFormatter::error(null,'Data Produck tidak ada'. 404);	
	//    	//  }


	//    	 if ($slug) 
	//    	 {
	//     	$product = Product::with('galeries')->find($id);
	    	
	//     	//karena di dalam if,true nya cuma ada 1 kondisi maka tidak menggunakan kurung kurawal
	//     	if ($product)
	//     		return ResponseFormatter::success($product,'Data Produck Berhasil di ambil');	
	//     	else
	//     		return ResponseFormatter::error(null,'Data Produck tidak ada'. 404);	
	//    	 }

	//    	 $product = Product::with('galeries');

	//    	 if ($id) 
	//    	 	$product->where('id', $id);

	//    	 if ($name) 
	//    	 	$product->where('name','like','%' . $name . '%');

	//    	 if ($type) 
	//    	 	$product->where('type','like','%' . $type . '%');

	//    	 if ($price_from) 
	//    	 	$product->where('price','>=', $price_from);

	//    	 if ($price_to) 
	//    	 	$product->where('price','<=', $price_to);

	// 	 return ResponseFormatter::success(
	// 	    	//limit dari variabel limit di atas
	// 	    	$product->paginate($limit),
	// 	    	'data list produk berhasil di ambil'
	// 	    );

 //    }




}
