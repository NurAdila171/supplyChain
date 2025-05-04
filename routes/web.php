<?php

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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
Route::get('/', [App\Http\Controllers\LandingController::class, 'index'])->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/notifikasi', [App\Http\Controllers\NotifikasiController::class, 'index'])->name('notifikasi.index');

    Route::middleware('can:role_supplier')->group(function () {
        Route::get('/pembelian', [App\Http\Controllers\PembelianController::class, 'index'])->name('pembelian.index');
        Route::get('/pembelian/beli', [App\Http\Controllers\PembelianController::class, 'beli'])->name('pembelian.beli');
        Route::get('/pembelian/{pembelian}/lihat', [App\Http\Controllers\PembelianController::class, 'show'])->name('pembelian.show');
        Route::post('/pembelian/tambah_keranjang', [App\Http\Controllers\PembelianController::class, 'tambah_keranjang'])->name('pembelian.tambah_keranjang');
        Route::get('/pembelian/keranjang', [App\Http\Controllers\PembelianController::class, 'keranjang'])->name('pembelian.keranjang');
        Route::delete('/pembelian/keranjang/{keranjang}/hapus', [App\Http\Controllers\PembelianController::class, 'hapus_keranjang'])->name('pembelian.keranjang.hapus');
        Route::post('/pembelian/keranjang/proses', [App\Http\Controllers\PembelianController::class, 'proses_keranjang'])->name('pembelian.keranjang.proses');
    });

    Route::middleware('can:role_kasir')->group(function () {
        Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan.index');
        Route::get('/penjualan/tambah', [App\Http\Controllers\PenjualanController::class, 'create'])->name('penjualan.create');
        Route::post('/penjualan/simpan', [App\Http\Controllers\PenjualanController::class, 'store'])->name('penjualan.store');
    });

    Route::middleware('can:role_admin')->group(function () {
        Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk.index');
        Route::get('/produk/tambah', [App\Http\Controllers\ProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk/simpan', [App\Http\Controllers\ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{produk}/ubah', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{produk}/perbarui', [App\Http\Controllers\ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{produk}/hapus', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('produk.destroy');
        Route::get('/produk/{produk}/bahan', [App\Http\Controllers\ProdukController::class, 'bahan'])->name('produk.bahan');

        Route::get('/produk/{produk}/bahan/tambah', [App\Http\Controllers\ProdukBahanController::class, 'create'])->name('produk.bahan.create');
        Route::post('/produk/{produk}/bahan/simpan', [App\Http\Controllers\ProdukBahanController::class, 'store'])->name('produk.bahan.store');
        Route::get('/produk/{produk}/bahan/{bahan}/ubah', [App\Http\Controllers\ProdukBahanController::class, 'edit'])->name('produk.bahan.edit');
        Route::put('/produk/{produk}/bahan/{bahan}/perbarui', [App\Http\Controllers\ProdukBahanController::class, 'update'])->name('produk.bahan.update');
        Route::delete('/produk/{produk}/bahan/{bahan}/hapus', [App\Http\Controllers\ProdukBahanController::class, 'destroy'])->name('produk.bahan.destroy');

        Route::get('/bahan', [App\Http\Controllers\BahanController::class, 'index'])->name('bahan.index');
        Route::get('/bahan/tambah', [App\Http\Controllers\BahanController::class, 'create'])->name('bahan.create');
        Route::post('/bahan/simpan', [App\Http\Controllers\BahanController::class, 'store'])->name('bahan.store');
        Route::get('/bahan/{bahan}/ubah', [App\Http\Controllers\BahanController::class, 'edit'])->name('bahan.edit');
        Route::put('/bahan/{bahan}/perbarui', [App\Http\Controllers\BahanController::class, 'update'])->name('bahan.update');
        Route::delete('/bahan/{bahan}/hapus', [App\Http\Controllers\BahanController::class, 'destroy'])->name('bahan.destroy');

        Route::delete('/pembelian/{pembelian}/hapus', [App\Http\Controllers\PembelianController::class, 'destroy'])->name('pembelian.destroy');
        Route::post('/pembelian/{pembelian}/set_delivered', [App\Http\Controllers\PembelianController::class, 'set_delivered'])->name('pembelian.set_delivered');

        Route::delete('/penjualan/{penjualan}/hapus', [App\Http\Controllers\PenjualanController::class, 'destroy'])->name('penjualan.destroy');
        Route::get('/penjualan/export', [App\Http\Controllers\PenjualanController::class, 'exportToExcel'])->name('penjualan.export.excel');

        Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
        Route::get('/user/tambah', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
        Route::post('/user/simpan', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::get('/user/{user}/ubah', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{user}/perbarui', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{user}/hapus', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
    });
});
