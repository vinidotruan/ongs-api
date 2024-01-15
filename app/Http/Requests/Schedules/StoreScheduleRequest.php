<?php

namespace App\Http\Requests\Schedules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->employee()->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "start" => ["required", "date"],
            "duration" => ["required", "integer", "min:1"],
            "employee_id" => ["required", "integer", "exists:employees,id"],
            "service_id" => ["required", "integer", "exists:services_provided,id"],
        ];
    }
}
