<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\NewPasswordController;
use App\Http\Controllers\Api\V1\ClientsController;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;

// Auth
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function () {
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('reset-password');
});

Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::apiResource('clients', ClientsController::class);


});


