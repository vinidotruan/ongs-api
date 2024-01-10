<?php

namespace App\Services\Ongs;

use App\Models\Ong;
use App\Services\BaseService;

class OngsCreationService extends BaseService
{
    private array $data;

    public function setData(array $data): void
    {
        $this->data = $data;
    }


    public function handle()
    {
        $this->data['user_id'] = auth()->user()->id;
        return Ong::create($this->data);
    }
}
