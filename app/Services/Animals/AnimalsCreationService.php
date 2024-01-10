<?php

namespace App\Services\Animals;

use App\Models\Animal;
use App\Services\BaseService;

class AnimalsCreationService extends BaseService
{

    private array $data;

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function handle()
    {
        $this->data['custumer_id'] = auth()->user()->custumer->id;
        return Animal::create($this->data);
    }
}
