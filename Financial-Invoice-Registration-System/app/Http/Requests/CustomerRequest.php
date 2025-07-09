<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name'=> 'required',
            'last_name'=> 'required',
            'mobile'=> 'required',
            'phone'=> 'required',
            'postal_code'=> 'required',
            'national_id'=> 'required',
            'company_name'=> 'required',
            'registration_number'=> 'required',
            'economic_number'=> 'required',
            'address'=> 'required',
            'user_type'=> 'required',
            'password'=> 'required'
        ];
    }
}
