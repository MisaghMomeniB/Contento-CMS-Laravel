<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RealController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(callback: function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');

    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('admin.invoices.create');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('admin.invoices.store');
});

Route::middleware(['auth', 'role:حقیقی'])->group(function () {
    Route::get('/real/dashboard', [RealController::class, 'index'])->name('real.dashboard');
});

Route::middleware(['auth', 'role:حقوقی'])->group(function () {
    Route::get('/legal/dashboard', [LegalController::class, 'index'])->name('legal.dashboard');
});

// Route::prefix('admin/categories')->name('admin.categories.')->middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/create', [CategoryController::class, 'create'])->name('create');
//     Route::post('/store', [CategoryController::class, 'store'])->name('store');
//     Route::get('/', [CategoryController::class, 'index'])->name('index');
// });

Route::prefix('admin/categories')->name('admin.categories.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/', CategoryController::class)->parameters(['' => 'category']);
});