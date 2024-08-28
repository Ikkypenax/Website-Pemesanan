<?php

use App\Models\Panels;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PanelsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AddfeeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\BiayaLainController;
use App\Http\Controllers\OrdersController;
use App\Models\Orders;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about_us.index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role Admin
Route::group(['middleware' => ['auth']], function () {
    // Route::resource('pesanan', PesananController::class);
    
    // Route::get('/getJenis/{kategori_id}', [PesananController::class, 'getJenis']);
    // Route::get('/getHarga/{jenis}', [PesananController::class, 'getHarga']);
    // Route::post('/getkabupaten', [PesananController::class, 'getkabupaten'])->name('getkabupaten');

    Route::resource('orders', OrdersController::class);

    Route::get('/getType/{category_name}', [OrdersController::class, 'getType']);
    Route::get('/getPrice/{type}', [OrdersController::class, 'getPrice']);
    Route::post('/getRegencies', [OrdersController::class, 'getRegencies'])->name('getRegencies');
    
    Route::put('/orders/{id}/status', [OrdersController::class, 'status'])->name('orders.status');
    Route::get('orders/{id}/send-invoice', [OrdersController::class, 'sendInvoice'])->name('orders.sendInvoice');
    
    
    // Route::resource('barang', BarangController::class);
    // Route::put('biaya/{id}', [BarangController::class, 'update'])->name('biaya.update');
    
    Route::resource('panel', PanelsController::class);
    // Route::put('biaya/{id}', [PanelsController::class, 'update'])->name('biaya.update');
    
    // Route::resource('biaya', BiayaLainController::class);
    // Route::put('/biaya/{id}', [BiayaLainController::class, 'update'])->name('biaya.update');
    
    Route::resource('biaya', AddfeeController::class);
    Route::put('/biaya/{id}', [AddfeeController::class, 'update'])->name('biaya.update');
    
    // Route::get('/catalog/create', [KatalogController::class, 'create'])->name('catalog.create');
    // Route::post('/catalog', [KatalogController::class, 'store'])->name('catalog.store');
    // Route::get('/catalog', [KatalogController::class, 'index'])->name('catalog.index');
    // Route::get('/catalog/{catalog}/edit', [KatalogController::class, 'edit'])->name('catalog.edit');
    // Route::delete('/catalog/{catalog}', [KatalogController::class, 'destroy'])->name('catalog.destroy');
    // Route::put('/catalog/{catalog}', [KatalogController::class, 'update'])->name('catalog.update');
    
    Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
    Route::post('/catalog', [CatalogController::class, 'store'])->name('catalog.store');
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/{catalog}/edit', [CatalogController::class, 'edit'])->name('catalog.edit');
    Route::delete('/catalog/{catalog}', [CatalogController::class, 'destroy'])->name('catalog.destroy');
    Route::put('/catalog/{catalog}', [CatalogController::class, 'update'])->name('catalog.update');
});

// Role User
Route::get('/catalog/list', [CatalogController::class, 'list'])->name('catalog.list');
Route::get('/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/getType/{category_name}', [OrderController::class, 'getType']);
Route::get('/getPrice/{type}', [OrderController::class, 'getPrice']);
Route::post('/getRegencies', [OrderController::class, 'getRegencies'])->name('getRegencies');
