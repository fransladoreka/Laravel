<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunAkuntansiController;
use App\Http\Controllers\DatamigranController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/produk', function () {
  return view('produk.index');
});
Route::get('/akun/tree',[AkunAkuntansiController::class,'tree'])->name('akun.tree');
Route::get('/akun/check/{id}',[AkunAkuntansiController::class,'checkChildren'])->name('akun.check');
Route::resource('akun',AkunAkuntansiController::class);
Route::get('/datamigran', function () {
  return view('datamigran.forminput');
});
Route::post('/datamigran/store', [DatamigranController::class, 'store'])
    ->name('datamigran.store');
