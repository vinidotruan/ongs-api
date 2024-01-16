<?php

namespace App\Http\Requests\Customers;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string"],
            "cpf" => ["required", "string"],
            "whatsapp" => ["required", "string"],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "min:8"],
        ];
    }
}
