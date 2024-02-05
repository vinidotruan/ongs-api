<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class EmployeeServiceProvided extends Model
{
    use HasFactory;

    protected $table = "employee_service_provided";

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function serviceProvided(): BelongsTo
    {
        return $this->belongsTo(ServiceProvided::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
