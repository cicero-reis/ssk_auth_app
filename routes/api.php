<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\RefreshController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::post('/auth/login', LoginController::class)->name('api.v1.auth.login');
    Route::post('/auth/refresh', RefreshController::class)->name('api.v1.auth.refresh');
    Route::post('/auth/logout', LogoutController::class)->name('api.v1.auth.logout');

    Route::middleware(['auth:api', 'role:dev,admin'])->group(function () {
        Route::post('/auth/register', [AuthController::class, 'register'])->name('api.v1.auth.register');
    });
});
