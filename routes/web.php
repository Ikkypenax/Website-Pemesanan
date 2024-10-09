<?php

use App\Models\Orders;
use App\Models\Panels;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddfeeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PanelsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about_us.index');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role Admin
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::resource('orders', OrdersController::class);

    Route::get('/getType/{category_name}', [OrdersController::class, 'getType']);
    Route::get('/getPrice/{type}', [OrdersController::class, 'getPrice']);
    Route::post('/getRegencies', [OrdersController::class, 'getRegencies'])->name('getRegencies');

    Route::put('/orders/{id}/status', [OrdersController::class, 'status'])->name('orders.status');
    Route::get('orders/{id}/send-invoice', [OrdersController::class, 'sendInvoice'])->name('orders.sendInvoice');
    Route::get('/orders/{id}/print-invoice', [OrdersController::class, 'printInvoice'])->name('orders.printInvoice');
    Route::get('/orders/{id}/download-invoice', [OrdersController::class, 'downloadInvoice'])->name('orders.downloadInvoice');


    Route::resource('panel', PanelsController::class);

    Route::post('fee', [AddfeeController::class, 'store'])->name('fee.store');
    Route::put('/fee/{id}', [AddfeeController::class, 'update'])->name('fee.update');

    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
    Route::post('/catalog', [CatalogController::class, 'store'])->name('catalog.store');
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
Route::get('/check-order/{order_code}', [OrderController::class, 'show'])->name('order.details');
Route::get('/check-order', [OrderController::class, 'checkOrder'])->name('order.check');
// Route::get('/orders/{id}/download-invoice', [OrderController::class, 'downloadInvoice'])->name('orders.downloadInvoice');
Route::get('/orders/{id}/print-invoice', [OrdersController::class, 'printInvoice'])->name('orders.printInvoice');

