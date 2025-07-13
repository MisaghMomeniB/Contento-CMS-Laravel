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

Route::get('/payment', function () {
    return view('payment.test');
})->name('payment.test');

Route::get('payment/verify', function () {
    return view('payment.verify');
})->name('payment.verify');

Route::get('/register', [RegisterController::class, 'showForm'])->middleware('guest')->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showForm'])->middleware('guest')->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // روت‌های محصولات (Products)
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // روت‌های فاکتورها (Invoices)
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('admin.invoices.index');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('admin.invoices.create');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('admin.invoices.store');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('admin.invoices.show');
    Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('admin.invoices.edit');
    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('admin.invoices.update');
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('admin.invoices.destroy');

    // روت‌های دسته‌بندی‌ها (Categories)
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

Route::middleware(['auth', 'role:حقیقی'])->group(function () {
    Route::get('/real/dashboard', [RealController::class, 'index'])->name('real.dashboard');
    Route::get('/real/invoices', [RealController::class, 'invoices'])->name('real.invoices.index');
    Route::get('/real/invoices/{invoice}', [RealController::class, 'showInvoice'])->name('real.invoices.show');
});

Route::middleware(['auth', 'role:حقوقی'])->group(function () {
    Route::get('/legal/dashboard', [LegalController::class, 'index'])->name('legal.dashboard');
    Route::get('/legal/invoices', [LegalController::class, 'invoices'])->name('legal.invoices.index');
    Route::get('/legal/invoices/{invoice}', [LegalController::class, 'showInvoice'])->name('legal.invoices.show');
});