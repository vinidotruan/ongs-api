<?php

namespace App\Http\Controllers;

use App\Http\Requests\Custumers\StoreCustumerRequest;
use App\Models\Custumer;
use App\Services\Custumers\CustumersCreationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustumerController extends Controller
{

    public function __construct(private readonly CustumersCreationService $clientsCreationService)
    {
    }


    public function index(): JsonResponse
    {
        return response()->json([
            'data' => auth()->user()->custumer()->get()
        ]);
    }


    public function store(StoreCustumerRequest $request): JsonResponse
    {
        $this->clientsCreationService->setData($request->all());
        return response()->json([
            'data' => $this->clientsCreationService->handle()
        ], 201);
    }


    public function show(Custumer $client): JsonResponse
    {
        return response()->json([
            'data' => $client
        ]);
    }


    public function update(Request $request, Custumer $client): JsonResponse
    {
        $client->update($request->all());
        return response()->json([
            'data' => $client
        ]);
    }


    public function destroy(Custumer $client)
    {
        $client->delete();
        return response()->json([
            'data' => 'deleted'
        ]);
    }
}
