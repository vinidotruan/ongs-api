<?php

namespace App\Services\Employees;

use App\Models\Employee;
use App\Models\Ong;
use App\Services\BaseService;
use Exception;
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

    /**
     * @throws Exception
     */
    public function handle()
    {

        return DB::transaction(function() {
            $employee = $this->employee->create([
                ...$this->data,
                'user_id' => auth()->user()->id,
                'ongs_id' => $this->ong->id
            ]);

            $this->addToOng($employee, $this->ong);
            $this->createUserToEmployee($employee);
            return $employee;
        });
    }

    private function addToOng(Employee $employee, Ong $ong): void
    {
        $ong->employees()->save($employee);
    }

    private function createUserToEmployee(Employee $employee): void
    {
        $employee->user()->create([
            "email" => $this->data["email"], "password" => $this->data["cpf"]
        ]);
    }
}
