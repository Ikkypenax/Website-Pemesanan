<?php

use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiController;

Route::resource('lokasi', LokasiController::class);

Route::put('/lokasi/{id}/status', [LokasiController::class, 'status'])->name('lokasi.status');


Route::get('/form', [WilayahController::class,'form'])->name('form');
Route::post('/getkabupaten', [WilayahController::class,'getkabupaten'])->name('getkabupaten');
