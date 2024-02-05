<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Employee extends Model
{
    use HasFactory;
    protected $with = ['servicesProvided'];

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ong(): BelongsTo
    {
        return $this->belongsTo(Ong::class);
    }

    public function servicesProvided(): BelongsToMany
    {
        return $this->belongsToMany(ServiceProvided::class, 'employee_service_provided', 'employee_id', 'service_provided_id')->withPivot('id');
    }

    public function schedules(): HasManyThrough
    {
        return $this->hasManyThrough(
            Schedule::class,
            EmployeeServiceProvided::class,
            'employee_id',
            'employee_service_id',
            'id',
            'id'
        );
    }
    public function appointments(): HasManyThrough
    {
        return $this->HasManyThrough(
            Appointment::class,
            EmployeeServiceProvided::class,
            'employee_id',
            'employee_service_id',
            'id',
            'id'
        );
    }
}
