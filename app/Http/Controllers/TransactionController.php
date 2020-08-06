<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionsDetail;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $items = Transaction::all();

           return view('pages.transaction.index')->with([
            'items' => $items
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // details di ambil dari relasi di model
        //menggunakan modal ,ada di script pojok bawah, menggunakn jquery terbaru(3.4)
        //with(detail product) mengambil relasi dari yang ada di modengan dengan class details dan product untuk di tampilkan di modal
        //dengan ketentuan find or fail ,jika data kosong maka akan 404
        //dengan ketentuan di dalam find or fail dengan menggunakan id transaction
        $item = Transaction::with('details.product')->findOrFail($id);

        return view('pages.transaction.show')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.transaction.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);
        $item->update($data);

        return redirect()->route('transaction.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $item = Transaction::findOrFail($id);
        $item->delete();

        //pengalamatan langsung, menghindari menghindari web.php
        return redirect()->route('transaction.index');
    }
    public function setStatus(Request $request,$id)
    {
        $request->validate([
            'status' => 'required|in:pending,success,failed'
        ]);

        $item = Transaction::findOrFail($id);
        $item->transaction_status = $request->status;

        $item->save();

        return redirect()->route('transaction.index');
    }
}
