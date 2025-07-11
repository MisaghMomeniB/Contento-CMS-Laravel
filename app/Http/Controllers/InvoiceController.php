<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('user')->latest()->get();
        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::all();
        $products = \App\Models\Product::all();
        $categories = \App\Models\Category::all();
        return view('admin.invoices.create', compact('users', 'products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|unique:invoices',
            'invoice_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'invoice_type' => 'required|in:پرداختی,مرجوعی',
            'status' => 'required|in:پرداخت شده,پرداخت نشده',
            'discount' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.product_price' => 'required|numeric|min:0',
            'items.*.category_id' => 'required|exists:categories,id',
            'items.*.discount' => 'nullable|numeric|min:0',
            'items.*.total_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            // ثبت فاکتور
            $invoice = Invoice::create([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'user_id' => $request->user_id,
                'invoice_type' => $request->invoice_type,
                'status' => $request->status,
                'discount' => $request->discount ?? 0,
                'description' => $request->description,
            ]);

            // ثبت آیتم‌های فاکتور
            foreach ($request->items as $item) {
                $product = \App\Models\Product::find($item['product_id']);
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $product->name, // نام محصول در لحظه ثبت
                    'product_price' => $item['product_price'],
                    'category_id' => $item['category_id'],
                    'description' => $item['description'] ?? null,
                    'discount' => $item['discount'] ?? 0,
                    'total_price' => $item['total_price'],
                ]);
            }

            DB::commit();
            return redirect()->route('invoices.index')->with('success', 'فاکتور با موفقیت ثبت شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'خطایی در ثبت فاکتور رخ داد.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
