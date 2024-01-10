<?php

namespace App\Services\Custumers;

use App\Models\Custumer;
use App\Services\BaseService;

class CustumersCreationService extends BaseService
{
    private array $data;

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function handle(): Custumer
    {
        $this->data['user_id'] = auth()->user()->id;
        return Custumer::create($this->data);
    }
}
