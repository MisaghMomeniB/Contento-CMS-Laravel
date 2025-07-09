<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OtpController;

// نمونه یک route ساده
Route::post('/send-otp', [OtpController::class, 'send']);
Route::post('/verify-otp', [OtpController::class, 'verifyOtp']);