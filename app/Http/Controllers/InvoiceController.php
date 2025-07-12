<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('user')->latest()->paginate(10);
        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        return view('admin.invoices.create', compact('users', 'products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $invoice = Invoice::create($request->validated());

            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $product->name,
                    'product_price' => $item['product_price'],
                    'category_id' => $item['category_id'],
                    'description' => $item['description'] ?? null,
                    'discount' => $item['discount'] ?? 0,
                    'total_price' => $item['total_price'],
                ]);
            }

            DB::commit();
            return redirect()->route('admin.invoices.index')->with('success', 'فاکتور با موفقیت ثبت شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'خطایی در ثبت فاکتور رخ داد.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('user', 'items.product', 'items.category');
        return view('admin.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        $invoice->load('items');
        return view('admin.invoices.edit', compact('invoice', 'users', 'products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceUpdateRequest $request, Invoice $invoice)
    {
        DB::beginTransaction();
        try {
            $invoice->update($request->validated());

            $invoice->items()->delete();
            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $product->name,
                    'product_price' => $item['product_price'],
                    'category_id' => $item['category_id'],
                    'description' => $item['description'] ?? null,
                    'discount' => $item['discount'] ?? 0,
                    'total_price' => $item['total_price'],
                ]);
            }

            DB::commit();
            return redirect()->route('admin.invoices.index')->with('success', 'فاکتور با موفقیت ویرایش شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'خطایی در ویرایش فاکتور رخ داد.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        DB::beginTransaction();
        try {
            $invoice->items()->delete();
            $invoice->delete();
            DB::commit();
            return redirect()->route('admin.invoices.index')->with('success', 'فاکتور با موفقیت حذف شد.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'خطایی در حذف فاکتور رخ داد.');
        }
    }
}
