<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ["start", "duration", "employee_service_id"];
    protected $casts = [
        "start" => "datetime",
        "duration" => "integer"];

    protected $appends = ['end'];

    public function employee(): HasOneThrough
    {
        return $this->hasOneThrough(Employee::class, EmployeeServiceProvided::class);
    }

    public function end(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->start->addMinutes($this->duration)
        );
    }
}
