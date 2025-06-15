<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    public function showLogin() {
        return view('auth.login');
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('showLogin');
        }
        return view('auth.dashboard');
    }

    public Function showRegister() {
        return view('auth.register');
    }
    // Login Post
    public function login(Request $request)
    {
            $request->validate([
                'captcha' => 'required|captcha'
                    ], [
                        'captcha.captcha' => 'کد امنیتی وارد شده نادرست است.'
            ]);

        $credentials = $request->only('phone_number', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') 
        {
            return redirect()->route('adminDashboard');
        } elseif($user->role === 'owner') {
            return redirect()->route('dashboard');
        } else {
            Auth::logout();
            return redirect()->route('showLogin')->withErrors(['role' => 'نقش کاربر نامعتبر است']);
        }
        }

        
    }

    public function register(Request $request)
    {
            $request->validate([
                'captcha' => 'required|captcha'
                    ], [
                        'captcha.captcha' => 'کد امنیتی وارد شده نادرست است.'
            ]);
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

    public function adminDashboard(Request $request) {
        if (!Auth::check()) {
            return redirect()->route('showLogin');
        }

        $users = User::latest()->take(50)->get();
        $stores = \App\Models\Store::all();
        $tickets = []; // Ticket::latest()->take(50)->get();
        $invoices = \App\Models\Invoice::with('store')->latest()->take(50)->get();

        return view('auth.adminDashboard', compact('stores', 'users', 'tickets', 'invoices'));
    }

public function storeInvoice(Request $request)
{
    $request->validate([
        'store_id' => 'required|exists:stores,id',
        'amount' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'is_paid' => 'nullable|boolean',
    ]);

    Invoice::create([
        'store_id' => $request->store_id,
        'amount' => $request->amount,
        'description' => $request->description,
        'is_paid' => $request->has('is_paid'),
    ]);

    return back()->with('success', 'فاکتور با موفقیت ثبت شد.');
}
}