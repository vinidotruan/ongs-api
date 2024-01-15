<?php

namespace App\Http\Requests\ServicesProvided;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeServiceProvidedRequest extends FormRequest
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
            "employee_id" => ["required", "exists:employees,id"],
            "service_provided_id" => ["required", "exists:services_provided,id", 'in:' . $this->route('id')],
        ];
    }
}
