<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\stokBarangController;
use App\Http\Controllers\paketDiskonController;
use App\Http\Controllers\levelHargaController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\etalaseController;
use App\Http\Controllers\editController;

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

Route::get('/', function () {
    return view('first');
});


// Route::get('/', [etalaseController::class, 'index'])->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware('auth');

Route::get('/pembelian', [PembelianController::class, 'index'])->middleware('auth');

Route::get('/dataProduk', [stokBarangController::class, 'index'])->middleware('auth');
Route::get('/dataProduk/{id}/restore', [stokBarangController::class, 'restore'])->middleware('auth');
Route::get('/dataProdukDeleted', [stokBarangController::class, 'SDelete'])->middleware('auth');
Route::post('/dataProduk', [stokBarangController::class, 'store'])->middleware('auth');
Route::get('/dataEdit/{id}', [stokBarangController::class, 'edit'])->middleware('auth');
Route::put('/dataProduk/{id}', [stokBarangController::class, 'update'])->middleware('auth');
Route::get('/produkDelete/{id}', [stokBarangController::class, 'delete'])->middleware('auth');
Route::delete('/produkDestroySoft/{id}', [stokBarangController::class, 'destroySoft'])->middleware('auth');
Route::delete('/produkDestroy/{id}', [stokBarangController::class, 'destroy'])->middleware('auth');

Route::get('/paketDiskon', [paketDiskonController::class, 'index'])->middleware('auth');
Route::get('/tambahPaketDiskon', [paketDiskonController::class, 'tambah'])->middleware('auth');
Route::get('/tambahPD/{id}', [paketDiskonController::class, 'tambahDiskonID'])->middleware('auth');
// Route::get('/diskonEdit/{id}', [paketDiskonController::class, 'edit'])->middleware('auth');
Route::post('/PDEdit/{id}', [paketDiskonController::class, 'update'])->middleware('auth');

Route::get('/levelHarga', [levelHargaController::class, 'index'])->middleware('auth');

Route::get('/kategori', [kategoriController::class, 'index'])->middleware('auth');
Route::post('/kategori', [kategoriController::class, 'store'])->middleware('auth');
Route::delete('/kategoriDelete/{id}', [kategoriController::class, 'delete'])->middleware('auth');

Route::get('/etalase', [etalaseController::class, 'index'])->middleware('auth');

// Route::get('/transaksi', function () {
//     return view('transaksi');
// });

Route::get('/produk', function () {
    return view('produk');
})->middleware('auth');

// Route::get('/etalase', function () {
//     return view('etalase');
// })->middleware('auth');

Route::get('/transaksi', function () {
    return view('Transaksi');
})->middleware('auth');

// Route::get('/produk-add', function () {
//     return view('Transaksi');
// });

// Route::get('/kategori-add', function () {
//     return view('Transaksi');
// });
