<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\NewPasswordController;
use App\Http\Controllers\Api\V1\Clients\DeleteController;
use App\Http\Controllers\Api\V1\Clients\IndexController;
use App\Http\Controllers\Api\V1\Clients\ShowController;
use App\Http\Controllers\Api\V1\Clients\StoreController;
use App\Http\Controllers\Api\V1\Clients\UpdateController;
use Illuminate\Support\Facades\Route;

// Auth
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
], function () {
    Route::post(uri: '/login', action: [LoginController::class, 'authenticate'])->name(name: 'login');
    Route::post(uri: '/reset-password', action: [NewPasswordController::class, 'store'])->name(name: 'reset-password');
    Route::post(uri: '/logout', action: [LoginController::class, 'logout'])->middleware(['auth:sanctum'])->name(name: 'logout');
});

// Clients
Route::prefix('clients')->as('clients.')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', IndexController::class)->name('index');
    Route::post('/', StoreController::class)->name('store');
    Route::get('/{client:uuid}', ShowController::class)->name('show');
    Route::match(['put', 'patch'], '/{client:uuid}', UpdateController::class)->name('update');
    Route::delete('/{client:uuid}', DeleteController::class)->name('delete');
});
