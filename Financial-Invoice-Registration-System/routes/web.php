<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth / Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Auth / Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Auth / Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard / Admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'show'])->name('admin.dashboard');
    // Route::get('admin/users/list', [DashboardController::class,'fetchUsers'])->name('admin.users.list');
});

// User Create / Customer
Route::get('/admin/dashboard/createCustomerGenuine', function () {
    return view("admin.users.genuine-store");
})->name("createCustomerGenuine");

Route::get('/admin/dashboard/createCustomerLegal', function () {
    return view("admin.users.legal-store");
})->name("createCustomerLegal");

// CRUD User
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});

// Test
Route::prefix('admin/dashboard/customers')->name('admin.customers.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('indexCustomer');
    Route::post('/store', [UserController::class, 'store'])->name('storeCustomer');
    Route::get('/{customer}', [UserController::class, 'show'])->name('showCustomer');
    Route::get('/{customer}/edit', [UserController::class, 'edit'])->name('editCustomer');
    Route::put('/{customer}', [UserController::class, 'update'])->name('updateCustomer');
    Route::delete('/{customer}', [UserController::class, 'destroy'])->name('destroyCustomer');
});