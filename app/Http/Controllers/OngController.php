<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ongs\StoreOngRequest;
use App\Models\Ong;
use App\Services\Ongs\OngsCreationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OngController extends Controller
{
    public function __construct(
        private readonly OngsCreationService $ongsCreationService,
    )
    { }


    public function index(): JsonResponse
    {
        return response()->json(["data" => Ong::all()]);
    }


    public function store(StoreOngRequest $request): JsonResponse
    {
        $this->ongsCreationService->setData($request->validated());

        return response()->json([
            'data' => $this->ongsCreationService->handle()
        ], 201);
    }


    public function show(Ong $ong): JsonResponse
    {
        return response()->json(['data' => $ong]);
    }


    public function update(Request $request, Ong $ong)
    {
        $ong->update($request->all());
        return response()->json([
            'data' => $ong
        ], 200);
    }


    public function destroy(Ong $ong)
    {
        //
    }

    public function servicesProvided(Ong $ong): JsonResponse
    {
        return response()->json(["data" => $ong->servicesProvided()->get()]);
    }
}
