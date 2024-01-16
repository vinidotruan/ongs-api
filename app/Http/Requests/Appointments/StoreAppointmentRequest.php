<?php

namespace App\Http\Requests\Appointments;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            "employee_service_id" => ["required", "exists:employee_service_provided,id"],
            "customer_id" => ["required", "exists:customers,id"],
            "animal_id" => ["required", "exists:animals,id"],
        ];
    }
}
