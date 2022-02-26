<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\NewPasswordController;
use App\Http\Controllers\Api\V1\ClientsController;
use Illuminate\Support\Facades\Route;

// Auth
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function () {
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/reset-password', [NewPasswordController::class, 'store']);
});

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::apiResource('clients', ClientsController::class);
});
