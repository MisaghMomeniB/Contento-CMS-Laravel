<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['role:admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('auth.adminDashboard');
//     })->name('adminDashboard');
// });

// Route::middleware(['role:owner'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard.owner');
//     })->name('dashboard');
// });

// // Admin Dashboard
Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])
->middleware('auth')
->name('adminDashboard');

Route::post('/admin/invoices/create', [AuthController::class, 'storeInvoice'])->name('createinvoice');

// // User Dashboard
Route::get('/dashboard', [AuthController::class,'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/dashboard', [AuthController::class,'dashboard'])->middleware('auth')->name('dashboard');

// For Get and Post Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');


// For Get and Post Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', function() {
    Auth::logout();
    return redirect()->route('showLogin');
})->name('logout');

Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets/store', [TicketController::class, 'store'])->name('tickets.store');

// Payment Method
Route::get('/payment', [PaymentController::class, 'pay'])->name('payment');
Route::get('/payment/verify', [PaymentController::class, 'verify'])->name('payment.verify');