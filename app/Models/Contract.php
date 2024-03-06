<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ong(): BelongsTo
    {
        return $this->belongsTo(Ong::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function serviceProvided(): BelongsTo
    {
        return $this->belongsTo(ServiceProvided::class);
    }
}
