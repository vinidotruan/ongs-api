<?php

namespace App\Services\Animals;

use App\Models\Animal;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class AnimalsCreationService extends BaseService
{

    private array $data;
    public function __construct(private readonly Animal $animal)
    {
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function handle()
    {
        return DB::transaction(fn() => $this->animal->create([...$this->data, 'customer_id' => auth()->user()->customer->id]));

    }
}
