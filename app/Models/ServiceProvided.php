<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceProvided extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "services_provided";

    public function contract(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}
