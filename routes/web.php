<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\WilayahController;

Route::resource('lokasi', LokasiController::class);

Route::resource('barang', BarangController::class);


Route::put('/lokasi/{id}/status', [LokasiController::class, 'status'])->name('lokasi.status');


Route::get('/form', [WilayahController::class,'form'])->name('form');
Route::post('/getkabupaten', [WilayahController::class,'getkabupaten'])->name('getkabupaten');

Route::get('/getJenis/{kategori}', [LokasiController::class, 'getJenis']);
Route::get('/getHarga/{jenis}', [LokasiController::class, 'getHarga']);


// Route::get('/barang/create', [BarangController::class, 'create']);
// Route::post('/barang/store', [BarangController::class, 'store']);