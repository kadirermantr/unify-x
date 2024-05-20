<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\IntegrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('integration', [IntegrationController::class, 'store']);
Route::put('integration/{integration}', [IntegrationController::class, 'update']);
Route::delete('integration/{integration}', [IntegrationController::class, 'destroy']);
