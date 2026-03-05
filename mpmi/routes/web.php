<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunAkuntansiController;
use App\Http\Controllers\DatamigranController;
use App\Http\Controllers\HakAkses;
use App\Http\Controllers\PaketKerjaController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/produk', function () {
    return view('produk.index');
});
Route::get('/akun/tree', [AkunAkuntansiController::class, 'tree'])->name('akun.tree');
Route::get('/akun/check/{id}', [AkunAkuntansiController::class, 'checkChildren'])->name('akun.check');
Route::resource('akun', AkunAkuntansiController::class);
// Route::get('/datamigran', function () {
//     return view('datamigran.forminput');
// });
// Route::get('/datamigran', function () {
//     return view('datamigran.index');
// });
// Route::post('/datamigran/store', [DatamigranController::class, 'store'])
//     ->name('datamigran.store');
// Route::get('/datamigran/show/{id}', [DatamigranController::class, 'show'])
//     ->name('datamigran.show');
Route::resource('datamigran', DatamigranController::class);
Route::get('/datamigran/{id}/pdf', [DatamigranController::class, 'cetakPdf'])
    ->name('datamigran.pdf');
Route::resource('paketkerja', PaketKerjaController::class);
Route::get('/hakakses/permission', [HakAkses::class, 'permission'])
    ->name('hakakses.permision');
Route::resource('hakakses', HakAkses::class);
