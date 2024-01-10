<?php

namespace App\Http\Controllers;

use App\Http\Requests\Animals\StoreAnimalRequest;
use App\Models\Animal;
use App\Services\Animals\AnimalsCreationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public function __construct(private readonly AnimalsCreationService $animalsCreationService)
    {
    }

    public function index(): JsonResponse
    {
       return response()->json([
           'data' => auth()->user()->custumer->animals
       ]);
    }


    public function store(StoreAnimalRequest $request): JsonResponse
    {
        $this->animalsCreationService->setData($request->all());
        return response()->json([
            'data' => $this->animalsCreationService->handle()
        ], 201);
    }


    public function show(Animal $animal): JsonResponse
    {
       return response()->json([
           'data' => $animal
       ]);
    }


    public function update(Request $request, Animal $animal): JsonResponse
    {
        $animal->update($request->all());
        return response()->json([
            'data' => $animal
        ]);
    }


    public function destroy(Animal $animal): JsonResponse
    {
        $animal->delete();
        return response()->json([
            'data' => 'deleted'
        ]);
    }
}
