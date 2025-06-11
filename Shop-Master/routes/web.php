<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// For Get and Post Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');


// For Get and Post Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');