<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LegalController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('items')->where('user_id', Auth::id())->latest()->get();
        return view('dashboards.legal', compact('invoices'));
    }

    public function invoices()
    {
        $invoices = Invoice::with('items')->where('user_id', Auth::id())->latest()->get();
        return view('legal.invoices.index', compact('invoices'));
    }

    public function showInvoice(Invoice $invoice)
    {
        if ($invoice->user_id !== Auth::id()) {
            abort(403, 'دسترسی غیرمجاز');
        }
        return view('legal.invoices.show', compact('invoice'));
    }
}