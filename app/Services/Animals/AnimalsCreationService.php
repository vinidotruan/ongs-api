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
        try {
            DB::beginTransaction();
            $animal = $this->animal->replicate();
            $animal->fill([
                ...$this->data,
                'custumer_id' => auth()->user()->custumer->id
            ]);

            $animal->save();
            DB::commit();
            return $animal;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

    }
}
