<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceUpdateRequest extends FormRequest
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
            'invoice_number' => ['required', Rule::unique('invoices')->ignore($this->invoice)],
            'invoice_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'invoice_type' => 'required|in:پرداختی,مرجوعی',
            'status' => 'required|in:پرداخت شده,پرداخت نشده',
            'discount' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.product_price' => 'required|numeric|min:0',
            'items.*.category_id' => 'required|exists:categories,id',
            'items.*.discount' => 'nullable|numeric|min:0',
            'items.*.total_price' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'invoice_number.required' => 'شماره فاکتور الزامی است.',
            'invoice_number.unique' => 'شماره فاکتور قبلاً ثبت شده است.',
            'invoice_date.required' => 'تاریخ فاکتور الزامی است.',
            'user_id.required' => 'انتخاب کاربر الزامی است.',
            'invoice_type.required' => 'نوع فاکتور الزامی است.',
            'status.required' => 'وضعیت فاکتور الزامی است.',
            'items.required' => 'حداقل یک آیتم برای فاکتور الزامی است.',
        ];
    }
}
