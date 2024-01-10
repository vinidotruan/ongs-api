<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CustumerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OngController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::apiResource('ongs', OngController::class)->middleware('auth:sanctum');
Route::apiResource('custumers', CustumerController::class)->middleware('auth:sanctum');
Route::apiResource('animals', AnimalController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
