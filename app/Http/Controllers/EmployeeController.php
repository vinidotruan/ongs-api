<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employees\StoreEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\Employees\EmployeeCreationService;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{

    public function __construct(private readonly EmployeeCreationService $employeeCreationService)
    { }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => auth()->user()->ong->employees
        ]);
    }

    public function store(StoreEmployeeRequest $request): JsonResponse
    {
        $this->employeeCreationService->setOng($request->user()->ong);
        $this->employeeCreationService->setData($request->all());

        return response()->json([
            'data' => $this->employeeCreationService->handle()
        ]);
    }

    public function show(Employee $employee): JsonResponse
    {
        return response()->json([
            'data' => $employee
        ]);
    }


    public function update(UpdateEmployeeRequest $request, Employee $employee): JsonResponse
    {
        $employee->update($request->all());
        return response()->json([
            'data' => $employee
        ]);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'data' => $employee
        ]);
    }
}