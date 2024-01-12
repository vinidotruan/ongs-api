<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employees\StoreEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\Employees\EmployeeCreationService;

class EmployeeController extends Controller
{

    public function __construct(private readonly EmployeeCreationService $employeeCreationService)
    { }

    public function index()
    {
        //
    }

    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeCreationService->setOng($request->user()->ong);
        $this->employeeCreationService->setData($request->all());

        return response()->json([
            'data' => $this->employeeCreationService->handle()
        ]);
    }

    public function show(Employee $employee)
    {
        //
    }


    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    public function destroy(Employee $employee)
    {
        //
    }
}
