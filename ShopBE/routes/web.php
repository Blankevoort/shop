<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
