<?php

namespace App\Services\Employees;

use App\Models\Employee;
use App\Models\Ong;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class EmployeeCreationService extends BaseService
{
    private array $data;
    private Ong $ong;

    public function __construct(private readonly Employee $employee)
    {
    }
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
            $employee = $this->employee->replicate();
            $employee->fill([...$this->data,
                'user_id' => auth()->user()->id,
                'ongs_id' => $this->ong->id
            ]);

            $employee = $this->ong->employees()->create($employee->toArray());
            $employee->user()->create([
                "email" => $this->data["email"], "password" => $this->data["cpf"]
            ]);

            DB::commit();
            return $employee;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }
}
