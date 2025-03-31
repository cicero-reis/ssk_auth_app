<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login'])->name('api.v1.auth.login');
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('api.v1.auth.logout');
    Route::post('/auth/register', [AuthController::class, 'register'])->name('api.v1.auth.register');
    Route::middleware(['auth:api', 'role:admin'])->get('/auth', AuthController::class)->name('api.v1.auth.index');
});

