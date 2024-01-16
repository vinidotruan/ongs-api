<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesProvided\AddEmployeeServiceProvidedRequest;
use App\Http\Requests\ServicesProvided\StoreServiceProvidedRequest;
use App\Http\Requests\ServicesProvided\UpdateServiceProvidedRequest;
use App\Models\Employee;
use App\Models\ServiceProvided;
use App\Services\ServicesProvided\ServiceProvidedCreationService;
use Exception;
use Illuminate\Http\JsonResponse;

class ServiceProvidedController extends Controller
{

    public function __construct(private readonly ServiceProvidedCreationService $creationServiceProvided)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json(['data' => auth()->user()->employee->servicesProvided]);
    }


    /**
     * @throws Exception
     */
    public function store(StoreServiceProvidedRequest $request): JsonResponse
    {
        $this->creationServiceProvided->setName($request->name);
        return response()->json(['data' => $this->creationServiceProvided->handle()]);
    }


    public function show(ServiceProvided $serviceProvided): JsonResponse
    {
        return response()->json(['data' => $serviceProvided]);
    }


    public function update(UpdateServiceProvidedRequest $request, ServiceProvided $serviceProvided): JsonResponse
    {
        return response()->json(['data' => $serviceProvided->update($request->validated())]);
    }


    public function destroy(ServiceProvided $serviceProvided): JsonResponse
    {
        $serviceProvided->delete();
        return response()->json(['data' => "Deleted"]);
    }

    public function addEmployee(AddEmployeeServiceProvidedRequest$request, ServiceProvided $serviceProvided, Employee $employee): JsonResponse
    {
        $serviceProvided->employees()->attach($request->employee_id);
        return response()->json(['data' => $serviceProvided->employees()->get()]);
    }
}
