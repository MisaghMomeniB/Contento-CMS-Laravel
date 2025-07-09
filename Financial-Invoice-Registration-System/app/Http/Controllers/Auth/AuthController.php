<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Kavenegar\KavenegarApi;
use Illuminate\Http\Request;
use App\Services\KavenegarService;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function sendOtp(Request $request, KavenegarService $kavenegar) {
        $phone = $request->input('mobile');
        $code = rand(100000, 999999);

        Cache::put('otp_', $phone, $code, now()->addMinutes(5));
        $message = "کد ورود شما : $code";
        $result = $kavenegar->sendOtp($phone, $message);

        return response()->json(['message' => 'OTP sent', 'kavenegar' => $result]);
    }

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

    // showLoginForm / View
    public function showLoginForm()
    {
        return view("auth.login");
    }

    // loginForm / Request
    public function login(LoginRequest $request)
    {
        $validate = $request->only('mobile', 'password');

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
    }

    // Logout Form / Done
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('showLogin');
    }
}
