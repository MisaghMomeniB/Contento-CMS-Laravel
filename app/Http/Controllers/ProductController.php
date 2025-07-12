<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**a
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            Product::create($request->validated());
            return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت ثبت شد.');
        } catch (\Exception $e) {
            return back()->with('error', 'خطایی در ثبت محصول رخ داد.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            $product->update($request->validated());
            return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت ویرایش شد.');
        } catch (\Exception $e) {
            return back()->with('error', 'خطایی در ویرایش محصول رخ داد.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت حذف شد.');
        } catch (\Exception $e) {
            return back()->with('error', 'خطایی در حذف محصول رخ داد.');
        }
    }
}
