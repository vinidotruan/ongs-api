<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CustumerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OngController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('ongs', OngController::class)->middleware('auth:sanctum');
Route::apiResource('custumers', CustumerController::class)->middleware('auth:sanctum');
Route::apiResource('animals', AnimalController::class)->middleware('auth:sanctum');
Route::apiResource('employees', EmployeeController::class)->middleware('auth:sanctum');
Route::apiResource('schedules', ScheduleController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
