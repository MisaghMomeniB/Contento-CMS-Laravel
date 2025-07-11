<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('mobile', $request->mobile)->first();

        // چک کن آیا کاربر پیدا شده یا نه
        // dd([
        //     'user_found' => $user !== null,
        //     'user' => $user,
        //     'roles' => $user ? $user->getRoleNames() : null,
        // ]);

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()->withErrors(['mobile' => 'اطلاعات ورود نادرست است.']);
        }

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return back()->withErrors(['mobile' => 'اطلاعات ورود نادرست است.']);
        }

        // dd([
        //     'role_names' => $user->getRoleNames()->toArray(),
        //     'roles_relation' => $user->roles->pluck('name')->toArray(),
        // ]);

        Auth::login($user);
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('حقیقی')) {
            return redirect()->route('real.dashboard');
        } elseif ($user->hasRole('حقوقی')) {
            return redirect()->route('legal.dashboard');
        }

        return redirect()->route('home');

        // dd([
        //     'logged_in' => auth()->check(),
        //     'role' => $user->getRoleNames(),
        // ]);
    }
}
