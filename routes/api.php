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

Route::apiResource('ongs', OngController::class)->middleware('auth:sanctum');
Route::apiResource('customers', CustomerController::class)->middleware('auth:sanctum');
Route::apiResource('animals', AnimalController::class)->middleware('auth:sanctum');
Route::apiResource('appointments', AppointmentController::class)->middleware('auth:sanctum');
Route::apiResource('employees', EmployeeController::class)->middleware('auth:sanctum');
Route::apiResource('schedules', ScheduleController::class)->middleware('auth:sanctum');
Route::apiResource('services-provided', ServiceProvidedController::class)->middleware('auth:sanctum');
Route::post('services-provided/{serviceProvided}/employees/{employee}', [ServiceProvidedController::class, 'addEmployee'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
