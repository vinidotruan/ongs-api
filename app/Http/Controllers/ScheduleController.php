<?php

namespace App\Http\Controllers;

use App\Http\Requests\Schedules\StoreScheduleRequest;
use App\Http\Requests\Schedules\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use App\Services\Schedules\ScheduleCreationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    public function __construct(private readonly ScheduleCreationService $creationScheduleService)
    {
    }

    public function index(): JsonResponse
    {
        $user = User::find(auth()->user()->id);

        Log::info("getting schedules from type: " . $user->userType());
        if($user->userType() === 'ong') {
            $ong = $user->ong()->first();
            $data = $ong->employees()->with("schedules")->get();
        } else {
            $data = $user->employee->schedules()->get();
        }
        return response()->json(["data" => $data]);
    }

    public function store(StoreScheduleRequest $request): JsonResponse
    {
        $this->creationScheduleService->setData($request->all());
        return response()->json(["data" => $this->creationScheduleService->handle()], 201);
    }

    public function show(Schedule $schedule): JsonResponse
    {
        return response()->json(["data" => $schedule]);
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule): JsonResponse
    {
        return response()->json(["data" => $schedule->update($request->all())]);
    }

    public function destroy(Schedule $schedule): JsonResponse
    {
        $schedule->delete();
        return response()->json([], 204);
    }
}
