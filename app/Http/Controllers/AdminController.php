<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $realCount = User::where('type', 'حقیقی')->count();
        $legalCount = User::where('type', 'حقوقی')->count();
        $productCount = Product::count();
        // شما می‌تونید فاکتورها و پرداختی‌ها رو اینجا هم بگیرید اگر میخواید نمایش بدید

        return view('dashboards.admin', compact('realCount', 'legalCount', 'productCount'));
    }
}
