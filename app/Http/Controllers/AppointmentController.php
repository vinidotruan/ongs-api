<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointments\StoreAppointmentRequest;
use App\Http\Requests\Appointments\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Services\Appointments\AppointmentsCreationService;
use Exception;
use Illuminate\Http\JsonResponse;

class AppointmentController extends Controller
{
    public function __construct(private readonly AppointmentsCreationService $creationService)
    {
    }
    public function index(): JsonResponse
    {
        $user = auth()->user();

        if($user->employee()->exists()) {
            $dataGetter = $user->employee;
        } else if($user->customer()->exists()) {
            $dataGetter = $user->customer;
        } else {
            $dataGetter = $user->ong;
        }

        return response()->json([
            'data' => $dataGetter->appointments()->with(['animal', 'schedule', 'employeeServiceProvided.employee', 'employeeServiceProvided.serviceProvided'])->get()
        ]);
    }

    /**
     * @throws Exception
     */
    public function store(StoreAppointmentRequest $request): JsonResponse
    {
        $this->creationService->setData($request->all());
        return response()->json([
            'data' => $this->creationService->handle()
        ], 201);
    }

    public function show(Appointment $appointment): JsonResponse
    {
        return response()->json([
            'data' => $appointment->load(['animal'])
        ]);
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment): JsonResponse
    {
        $appointment->update($request->all());
        return response()->json([
            'data' => $appointment->load(['animal'])
        ]);
    }

    public function destroy(Appointment $appointment): JsonResponse
    {
        $appointment->delete();
        return response()->json([
            'data' => $appointment
        ]);
    }
}
