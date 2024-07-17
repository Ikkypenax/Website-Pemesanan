<?php

use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LokasiController;

Route::resource('lokasi', LokasiController::class);

Route::get('/form', [WilayahController::class,'form'])->name('form');
Route::post('/getkabupaten', [WilayahController::class,'getkabupaten'])->name('getkabupaten');
