<?php

namespace App\Services\Customers;

use App\Models\Customer;
use App\Services\BaseService;

class CustomersCreationService extends BaseService
{
    private array $data;

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function handle(): Customer
    {
        $this->data['user_id'] = auth()->user()->id;
        return Customer::create($this->data);
    }
}
