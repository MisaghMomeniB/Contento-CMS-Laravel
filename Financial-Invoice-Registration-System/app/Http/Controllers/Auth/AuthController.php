<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    // showRegisterForm / View
    public function showRegisterForm()
    {
        return view("auth.register");
    }

    // registerForm / Request
    public function register(RegisterRequest $request)
    {
        $user  = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);
        return redirect()->route('showLogin');
    }
}
