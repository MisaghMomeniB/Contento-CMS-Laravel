<?php

use App\Http\Controllers\Auth\AuthController;
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

// Dashboard / Admin / Test
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin');
})->name('dashboard');

Route::get('/admin/dashboard/create-product', function () {
    return view ('dashboard.createProduct');
})->name('createProduct');

Route::get('/admin/dashboard/create-category', function() {
    return view('dashboard.createCategory');
})->name('createCategory');

Route::get('/admin/dashboard/create-invoice', function() {
    return view("dashboard.createInvoice");
})->name("createInvoice");

// Route::get