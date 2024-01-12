<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedules\StoreScheduleRequest;
use App\Http\Requests\Schedules\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Services\Schedules\CreationScheduleService;
use Illuminate\Http\JsonResponse;

class ScheduleController extends Controller
{
    public function __construct(private readonly CreationScheduleService $creationScheduleService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json(["data" => auth()->user()->employee->schedules()->get()]);
    }

    public function store(StoreScheduleRequest $request)
    {
        $this->creationScheduleService->setData($request->all());
        $schedule = $this->creationScheduleService->handle();
        return response()->json(["data" => $schedule], 201);
    }

    public function show(Schedule $schedule)
    {
        return response()->json(["data" => $schedule]);
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule): JsonResponse
    {
        return response()->json(["data" => $schedule->update($request->all())]);
    }

    public function destroy(Schedule $schedule)
    {
       $schedule->delete();
         return response()->json([], 204);
    }
}
