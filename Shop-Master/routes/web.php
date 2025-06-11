<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Dashboard
Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])
->middleware('auth')
->name('adminDashboard');

// User Dashboard
Route::get('/dashboard', [AuthController::class,'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/dashboard', [AuthController::class,'dashboard'])->middleware('auth')->name('dashboard');

// For Get and Post Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');


// For Get and Post Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');