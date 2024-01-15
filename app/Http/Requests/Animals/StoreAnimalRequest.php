<?php

namespace App\Http\Requests\Animals;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnimalRequest extends FormRequest
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
            "breed" => ["required", "string"],
            "birthday" => ["required", "date"],
            "weight" => ["required", "numeric"],
            "customer_id" => ["required", "integer", "exists:customers,id"],
        ];
    }
}
