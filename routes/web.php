<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DefaultController@index')->name('dashboard');

// goute ini juka di taruh di bawah akan ketimpa dan tidak akan kebaca
Route::get('products/{id}/gallery', 'ProductController@gallery')->name('products.gallery');

// tanpa at berarti memanggil semua class, di definisikan di view masing-masing
Route::resource('products', 'ProductController');
Route::resource('products-galleries', 'ProductGalleryController');
Route::resource('transaction', 'TransactionController');
Route::get('transactions/{id}/set-status', 'TransactionController@setStatus')->name('transactions.status');


Auth::routes(['register' => false]);
