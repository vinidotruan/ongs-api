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
        return DB::transaction(fn () => $this->ong->create([...$this->data, 'user_id' => auth()->user()->id]));
    }
}
