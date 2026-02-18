<?php

use App\Http\Controllers\AkunAkuntansiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('produk.index');
});
Route::get('/akun/tree',[AkunAkuntansiController::class,'tree'])->name('akun.tree');
Route::get('/akun/check/{id}',[AkunAkuntansiController::class,'checkChildren'])->name('akun.check');
Route::resource('akun',AkunAkuntansiController::class);
// Route::post('/akun/store',[AkunAkuntansiController::class,'store'])->name('akun.store');
// Route::post('/akun/update/{id}',[AkunAkuntansiController::class,'update'])->name('akun.update');