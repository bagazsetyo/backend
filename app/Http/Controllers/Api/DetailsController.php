<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\TesRequest;
use App\Http\Requests\Api\CheckoutRequest;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionsDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailsController extends Controller
{

//tes api controller 
    public function all(Request $request)
    {	
    	$data = $request->except('transaction_details');

		$transaction = Transaction::create($data);

        return ResponseFormatter::success($transaction);
	
			foreach ($request->transaction_details as $product)
	        {
	            $details[] = new TransactionsDetail([
	                'transactions_id' => $transaction->id,
	                'products_id' => $product,
	            ]);

	            Product::find($product)->decrement('quantity');
	        }

	        $transaction->details()->saveMany($details);

	        return ResponseFormatter::success($transaction);
	 
	}
}
