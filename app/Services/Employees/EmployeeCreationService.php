<?php

namespace App\Services\Employees;

use App\Models\Ong;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class EmployeeCreationService extends BaseService
{
    private array $data;
    private Ong $ong;
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function setOng(Ong $ong): void
    {
        $this->ong = $ong;
    }

    public function handle()
    {
        try {
            DB::beginTransaction();
            $this->data = [
                ...$this->data,
                'password' => $this->data['cpf'],
                'user_id' => auth()->user()->id,
                'ongs_id' => $this->ong->id
            ];

            $employee = $this->ong->employees()->create($this->data);
            $employee->user()->create($this->data);
            DB::commit();
            return $employee;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }
}
