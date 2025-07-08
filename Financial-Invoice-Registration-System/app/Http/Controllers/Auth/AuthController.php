<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // showRegisterForm / View
    public function showRegisterForm()
    {
        return view("auth.register");
    }
}
