<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            Category::create($request->validated());
            return redirect()->route('admin.categories.index')->with('success', 'دسته‌بندی با موفقیت ثبت شد.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'خطایی در ثبت دسته‌بندی رخ داد.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
            return redirect()->route('admin.categories.index')->with('success', 'دسته‌بندی با موفقیت ویرایش شد.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'خطایی در ویرایش دسته‌بندی رخ داد.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('admin.categories.index')->with('success', 'دسته‌بندی با موفقیت حذف شد.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'خطایی در حذف دسته‌بندی رخ داد.');
        }
    }
}