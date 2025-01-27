<?php


use App\Models\FeeRent;
use App\Http\Middleware\IsUser;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RentsController;
use App\Http\Controllers\AddfeeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PanelsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\FeerentController;
use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog/list', [CatalogController::class, 'list'])->name('catalog.list');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about_us.index');
Route::get('/rent/create', [RentController::class, 'create'])->name('rent.create');
Route::post('/rent/store', [RentController::class, 'store'])->name('rent.store');
Route::get('/getPanel/{category_name}', [RentController::class, 'getPanel']);
Route::get('/getPrice/{type}', [RentController::class, 'getPrice']);
Route::post('/getRegencis', [RentController::class, 'getRegencis'])->name('getRegencis');

Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/getType/{category_name}', [OrderController::class, 'getType']);
Route::get('/getPrice/{type}', [OrderController::class, 'getPrice']);
Route::post('/getRegencies', [OrderController::class, 'getRegencies'])->name('getRegencies');

Route::get('/login-user', [AuthController::class, 'showUserForm'])->name('login.user');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('user.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


// Role Admin
Route::middleware([IsAdmin::class . ':admin,superadmin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('orders', OrdersController::class);

    Route::get('/rent', [RentsController::class, 'index'])->name('rent.index');
    Route::get('/rent/{id}/edit', [RentsController::class, 'edit'])->name('rent.edit');
    Route::put('/rent/{id}', [RentsController::class, 'update'])->name('rent.update');
    Route::delete('/rent/{id}', [RentsController::class, 'destroy'])->name('rent.destroy');
    Route::get('/rent/{id}', [RentsController::class, 'show'])->name('rent.show');
    Route::put('/rent/{id}/status', [RentsController::class, 'status'])->name('rent.status');
    Route::get('/rent/{id}/send-invoice', [RentsController::class, 'sendInvoice'])->name('rent.sendInvoice');
    Route::get('/rent/{id}/wa-invoice', [RentsController::class, 'waInvoice'])->name('rent.waInvoice');
    Route::get('/admin/rent/{id}/print-invoice/{name}', [RentsController::class, 'printInvoice'])->name('admin.rent.printInvoice');

    Route::post('/rent/fee', [FeerentController::class, 'store'])->name('feerent.store');
    Route::put('/rent/fee/{id}', [FeerentController::class, 'update'])->name('feerent.update');

    Route::get('/getType/{category_name}', [OrdersController::class, 'getType']);
    Route::get('/getPrice/{type}', [OrdersController::class, 'getPrice']);
    Route::post('/getRegencies', [OrdersController::class, 'getRegencies'])->name('getRegencies');

    Route::put('/orders/{id}/status', [OrdersController::class, 'status'])->name('orders.status');
    Route::get('/orders/{id}/send-invoice', [OrdersController::class, 'sendInvoice'])->name('orders.sendInvoice');
    Route::get('/admin/orders/{id}/print-invoice/{name}', [OrdersController::class, 'printInvoice'])->name('admin.orders.printInvoice');
    Route::get('/orders/{id}/download-invoice', [OrdersController::class, 'downloadInvoice'])->name('orders.downloadInvoice');
    Route::get('/orders/{id}/wa-invoice', [OrdersController::class, 'waInvoice'])->name('orders.waInvoice');


    Route::resource('panel', PanelsController::class);

    Route::post('fee', [AddfeeController::class, 'store'])->name('fee.store');
    Route::put('/fee/{id}', [AddfeeController::class, 'update'])->name('fee.update');

    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
    Route::post('/catalog', [CatalogController::class, 'store'])->name('catalog.store');
    Route::get('/catalog/{catalog}/edit', [CatalogController::class, 'edit'])->name('catalog.edit');
    Route::put('/catalog/{catalog}', [CatalogController::class, 'update'])->name('catalog.update');
    Route::delete('/catalog/{catalog}', [CatalogController::class, 'destroy'])->name('catalog.destroy');

    Route::post('/logout-admin', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware([IsAdmin::class . ':superadmin'])->group(function () {
    Route::get('/admins', [AddAdminController::class, 'index'])->name('superadmin.index');
    Route::get('/admins/create', [AddAdminController::class, 'create'])->name('superadmin.create');
    Route::post('/admins', [AddAdminController::class, 'store'])->name('superadmin.store');
    Route::delete('/admins/{id}', [AddAdminController::class, 'destroy'])->name('superadmin.destroy');
});

// Role User



Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/getType/{category_name}', [OrderController::class, 'getType']);
Route::get('/getPrice/{type}', [OrderController::class, 'getPrice']);
Route::post('/getRegencies', [OrderController::class, 'getRegencies'])->name('getRegencies');




// Route::get('/check-order/{order_code}', [OrderController::class, 'show'])->name('order.details');
Route::get('/check-order/{code}', [OrderController::class, 'show'])->name('order.details');
Route::get('/check-order', [OrderController::class, 'checkOrder'])->name('order.check');
Route::get('/user/orders/{id}/print-invoice', [OrdersController::class, 'printInvoice'])->name('orders.printInvoice');
Route::get('/user/rent/{id}/print-invoice', [RentController::class, 'printInvoice'])->name('rent.printInvoice');
// Route::get('/orders/{id}/download-invoice', [OrderController::class, 'downloadInvoice'])->name('orders.downloadInvoice');

// Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout.user');
// Route::middleware([IsUser::class . ':user'])->group(function () {
// });
