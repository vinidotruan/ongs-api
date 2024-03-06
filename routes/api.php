<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OngController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ServiceProvidedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResources([
        'ongs' => OngController::class,
        'animals' => AnimalController::class,
        'appointments' => AppointmentController::class,
        'employees' => EmployeeController::class,
        'schedules' => ScheduleController::class,
        'services-provided' => ServiceProvidedController::class,
    ]);

    Route::get('ongs/{ong}/services-provided', [OngController::class, 'servicesProvided']);

    Route::post('services-provided/{serviceProvided}/employees/{employee}', [ServiceProvidedController::class, 'addEmployee']);
    Route::apiResource('customers', CustomerController::class)->except(['store']);;
});

Route::post('/customers', [CustomerController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
