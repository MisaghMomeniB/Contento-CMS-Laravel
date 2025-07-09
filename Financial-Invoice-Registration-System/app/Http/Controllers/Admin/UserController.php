<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function store(CustomerRequest $request)
    {

        Customer::create($request->validated());
        return redirect()->route("admin.dashboard");
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $users = User::all();
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(RegisterRequest $request, User $user)
    {
        $user->update($request->only(['first_name', 'last_name', 'mobile', 'user_type']));
        return redirect()->route('admin.users.index')->with('success', 'اطلاعات با موفقیت به‌روزرسانی شد.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'مشتری با موفقیت حذف شد.');
    }
}
