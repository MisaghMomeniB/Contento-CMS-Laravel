<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($this->product)],
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'نام محصول الزامی است.',
            'name.string' => 'نام محصول باید متنی باشد.',
            'name.max' => 'نام محصول نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',
            'name.unique' => 'این نام محصول قبلاً ثبت شده است.',
            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی انتخاب‌شده معتبر نیست.',
            'price.required' => 'قیمت محصول الزامی است.',
            'price.numeric' => 'قیمت باید عددی باشد.',
            'price.min' => 'قیمت نمی‌تواند منفی باشد.',
        ];
    }
}
