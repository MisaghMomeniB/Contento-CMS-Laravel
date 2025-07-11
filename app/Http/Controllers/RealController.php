<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RealController extends Controller
{
    public function index() {
        return view("dashboards.real");
    }
}
