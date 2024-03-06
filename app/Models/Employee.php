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

    protected $guarded = ['id'];
    protected $with = ['servicesProvided', 'schedules'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ongs():BelongsToMany
    {
        return $this->belongsToMany(
            Ong::class,
            'contracts',
            'employee_id',
            'ong_id');
    }

    public function servicesProvided(): BelongsToMany
    {
        return $this->belongsToMany(ServiceProvided::class,
            'contracts',
            'employee_id',
            'service_provided_id');
    }

    public function contract(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    public function schedules(): HasManyThrough
    {
        return $this->hasManyThrough(
            Schedule::class,
            Contract::class,
        );
    }
}
