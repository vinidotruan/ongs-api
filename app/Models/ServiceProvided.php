<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ServiceProvided extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "services_provided";

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employee_service_provided', 'service_provided_id', 'employee_id');
    }
}
