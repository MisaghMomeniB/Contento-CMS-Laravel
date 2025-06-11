<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    Public Function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:50',
            'phone_number'=>'required|string|max:15|unique:users,phone_number',
            'password'=>'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'phone_number'=> $request->phone_number,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('showLogin')->with('success','ثبت نام با موفقیت انجام شد');
    }
}
