<?php

namespace App\Http\Requests\Schedules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateScheduleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->employee()->id === $this->schedule->employee_id;
    }


    public function rules(): array
    {
        return [
            //
        ];
    }
}
