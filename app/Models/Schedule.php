<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ["start", "duration", "employee_service_id"];

    public function employee(): HasOneThrough
    {
        return $this->hasOneThrough(Employee::class, EmployeeServiceProvided::class);
    }
}
