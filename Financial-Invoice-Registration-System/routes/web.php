<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth / Register
Route::get('/register', [AuthController::class, 'showRegisterForm']);