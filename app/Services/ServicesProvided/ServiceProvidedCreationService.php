<?php

namespace App\Services\ServicesProvided;

use App\Models\ServiceProvided;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class ServiceProvidedCreationService extends BaseService
{
    private string $name;

    public function __construct(private readonly ServiceProvided $serviceProvided)
    {
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @throws Exception
     */
    public function handle()
    {
        return DB::transaction(function() {
            return $this->serviceProvided->create(['name' => $this->name]);
        });
    }
}
