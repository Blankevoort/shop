<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function() {
    return view('welcome');
});
Route::get('books', 'BookController@index');
Route::get('books/{book}', 'BookController@show')->name('books.show');
Route::get('books/{book}/purchase', 'BookPurchaseController@purchase')->name('purchase');
Route::get('books/{book}/purchase/result', 'BookPurchaseController@result')->name('purchase.result');
Route::get('library', 'LibraryController@index')->name('library');
Route::get('transactions', 'TransactionLogController@index');

Auth::routes();
