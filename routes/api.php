<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/auth/login', LoginController::class)->name('api.v1.auth.login');
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);

    Route::middleware(['auth:api', 'role:dev,manager'])->group(function () {
        Route::post('/auth/register', [AuthController::class, 'register'])->name('api.v1.auth.register');
    });
});

