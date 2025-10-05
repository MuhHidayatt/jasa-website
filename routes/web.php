<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('landing');

/*
|--------------------------------------------------------------------------
| Auth: Login & Register
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'indexLogin'])->name('auth.login');
Route::post('/login', [LoginController::class, 'proses'])->name('auth.login.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'Register'])->name('auth.register');
Route::post('/register', [LoginController::class, 'storeRegister'])->name('auth.register.store');

/*
|--------------------------------------------------------------------------
| Dashboard (Hanya User yang Login)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [PageController::class, 'index'])->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Group: Admin Only
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isLogin:admin'])->group(function () {
    Route::resource('dashboard', PageController::class)->only(['index']);
});

/*
|--------------------------------------------------------------------------
| Group: Admin & Customer
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isLevel:admin,customer'])->group(function () {
    // 🔹 Customers
    Route::resource('customers', CustomerController::class);

    // 🔹 Services
    Route::resource('services', ServiceController::class);

    // 🔹 Orders
    Route::resource('orders', OrderController::class);

    // Menandai order sebagai selesai
    Route::post('/orders/{order}/mark-done', [OrderController::class, 'markAsDone'])->name('orders.markDone');

    // 🔹 Invoice
    Route::get('/orders/{order}/invoice', [OrderController::class, 'invoice'])->name('orders.invoice');
    Route::get('/orders/{order}/invoice/pdf', [OrderController::class, 'invoicePdf'])->name('orders.invoice.pdf');

    // 🔹 Laporan Order
    Route::get('/orders/report', [OrderController::class, 'report'])->name('orders.report');
    Route::get('/orders/report/pdf', [OrderController::class, 'reportPdf'])->name('orders.report.pdf');

    // 🔹 Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/create/{order}', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
});
