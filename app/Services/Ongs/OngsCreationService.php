<?php

namespace App\Services\Ongs;

use App\Models\Ong;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

class OngsCreationService extends BaseService
{
    private array $data;
    public function __construct(private readonly Ong $ong)
    {
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }


    /**
     * @throws Exception
     */
    public function handle()
    {
        try {
            DB::beginTransaction();
            $ong = $this->ong->replicate();
            $ong->fill([
                ...$this->data,
                'user_id' => auth()->user()->id
            ]);
            $ong->save();
            DB::commit();
            return $ong;

        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

    }
}
