<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

        $rules = [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'mobile' => ['required', 'string', 'unique:users,mobile'],
            'phone' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'type' => ['required', 'in:حقیقی,حقوقی'],
        ];


        if ($this->type === 'حقیقی') {
            $rules['national_code'] = ['required', 'string', 'unique:real_profiles,national_code'];
            $rules['postal_code'] = ['nullable', 'string'];
            $rules['address'] = ['nullable', 'string'];
        }

        if ($this->type === 'حقوقی') {
            $rules['store_name'] = ['required', 'string'];
            $rules['registration_number'] = ['nullable', 'string'];
            $rules['economic_code'] = ['nullable', 'string'];
            $rules['postal_code'] = ['nullable', 'string'];
            $rules['address'] = ['nullable', 'string'];
        }

        return $rules;
    }
}
