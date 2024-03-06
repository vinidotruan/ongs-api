<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function ong(): HasOneThrough
    {
        return $this->hasOneThrough(
            Ong::class,
            Contract::class,
        );
    }

    public function employee(): HasOneThrough
    {
        return $this->hasOneThrough(
            Employee::class,
            Contract::class,
        );
    }

    public function serviceProvided(): HasOneThrough
    {
        return $this->hasOneThrough(
            ServiceProvided::class,
            Contract::class,
        );
    }
}
