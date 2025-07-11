<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RealProfiles;
use Illuminate\Http\Request;
use App\Models\LegalProfiles;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // ساخت یوزر
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => $request->type,
        ]);

        // نسبت دادن نقش به کاربر
        if (in_array($user->type, ['حقیقی', 'حقوقی'])) {
            $user->assignRole($user->type);
        }

        // ساخت پروفایل بر اساس نوع کاربر
        if ($user->type === 'حقیقی') {
            $user->realProfile()->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'national_code' => $request->national_code,
                'postal_code' => $request->postal_code,
                'address' => $request->address,
            ]);
    }

        if ($user->type === 'حقوقی') {
            $user->legalProfile()->create([
                'store_name' => $request->store_name,
                'registration_number' => $request->registration_number,
                'economic_code' => $request->economic_code,
                'postal_code' => $request->postal_code,
                'address' => $request->address,
            ]);
        }

        
        auth()->login($user);

        return redirect()->route('login.form')->with('success', 'ثبت‌نام با موفقیت انجام شد.');
    }
}
