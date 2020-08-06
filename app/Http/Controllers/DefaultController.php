<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DefaultController extends Controller
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
        //income mengambil data dati tabel transaction dengan transaksi status success
        //setelah data di ambil maka akan di jumlah total datanya
        $income = Transaction::where('transaction_status','success')->sum('transaction_total');


        //menjumlahkan semua kolom di tabel transaction
        $sales = Transaction::count();

        // mengambil 5 data terbaru dari tabel Transaksi 
        $items = Transaction::orderBy('id','DESC')->take(5)->get();

        //menjumlahkan bagian yang pending,success,dan failed
        $pie = [
            'pending' => Transaction::where('transaction_status','pending')->count(),
            'failed' => Transaction::where('transaction_status','failed')->count(),
            'success' => Transaction::where('transaction_status','success')->count(),
        ];

        return view('pages.dashboard')->with([
            'income' => $income,
            'sales' => $sales,
             'items' => $items,
             'pie' => $pie
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
