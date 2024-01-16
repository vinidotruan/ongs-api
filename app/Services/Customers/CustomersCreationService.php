<?php

namespace App\Services\Customers;

use App\Models\Customer;
use App\Models\User;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class CustomersCreationService extends BaseService
{
    private array $data;

    public function __construct(private readonly Customer $customer, private readonly User $user)
    {
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @throws Exception
     */
    public function handle(): Customer
    {
        return DB::transaction(function() {
            $user = $this->user->create($this->data);
            return $user->customer()->create($this->data);
        });
    }
}
