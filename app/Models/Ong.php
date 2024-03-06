<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Ong extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(
            Employee::class,
            'contracts',
            'ong_id',
            'employee_id'
        );
    }
    public function servicesProvided(): BelongsToMany
    {
         return $this->belongsToMany(ServiceProvided::class, 'contracts', 'ong_id', 'service_provided_id');
    }

    public function appointments(): HasManyThrough
    {
        return $this->hasManyThrough(Appointment::class, Contract::class);
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}
