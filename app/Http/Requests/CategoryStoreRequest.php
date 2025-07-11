<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; // یا منطق دسترسی برای ادمین
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام دسته‌بندی الزامی است.',
            'name.string' => 'نام دسته‌بندی باید متنی باشد.',
            'name.max' => 'نام دسته‌بندی نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            'name.unique' => 'این نام دسته‌بندی قبلاً ثبت شده است.',
        ];
    }
}