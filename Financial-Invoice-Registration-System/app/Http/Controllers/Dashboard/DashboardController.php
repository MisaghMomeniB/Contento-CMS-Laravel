<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function show()
    {
        return view("dashboard.admin");
    }

    public function fetchUsers(Request $request)
    {
        $users = User::all();
        $index = User::find($request->user_id);
        return view("admin.partials.users-list", compact("users", "index"))->render();
    }
}
