<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Models\Customer;
use App\Services\Customers\CustomersCreationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function __construct(private readonly CustomersCreationService $clientsCreationService)
    {
    }


    public function index(): JsonResponse
    {
        return response()->json([
            'data' => auth()->user()->customer()->get()
        ]);
    }


    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $this->clientsCreationService->setData($request->all());
        return response()->json([
            'data' => $this->clientsCreationService->handle()
        ], 201);
    }


    public function show(Customer $client): JsonResponse
    {
        return response()->json([
            'data' => $client
        ]);
    }


    public function update(Request $request, Customer $client): JsonResponse
    {
        $client->update($request->all());
        return response()->json([
            'data' => $client
        ]);
    }


    public function destroy(Customer $client)
    {
        $client->delete();
        return response()->json([
            'data' => 'deleted'
        ]);
    }
}
