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
    Route::get('admin/users/list', [DashboardController::class,'fetchUsers'])->name('admin.users.list');
});

// User Create / Customer
Route::get('/admin/dashboard/createCustomer', function() {
    return view("admin.users.store");
})->name("createCustomerTest");

// CRUD User
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});