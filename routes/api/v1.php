<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\NewPasswordController;
use App\Http\Controllers\Api\V1\Clients\Contracts\ShowController as ClientsContractShowController;
use App\Http\Controllers\Api\V1\Clients\Contracts\StoreController as ClientsContractStoreController;
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
    Route::get('/', IndexController::class)
        ->middleware(['permission:view-clients'])
        ->name('index');

    Route::post('/', StoreController::class)
        ->middleware(['permission:create-clients'])
        ->name('store');

    Route::get('/{client:uuid}', ShowController::class)
        ->middleware(['permission:view-clients'])
        ->name('show');

    Route::match(['put', 'patch'], '/{client:uuid}', UpdateController::class)
        ->middleware(['permission:edit-clients'])
        ->name('update');

    Route::delete('/{client:uuid}', DeleteController::class)
        ->middleware(['permission:delete-clients'])
        ->name('delete');

    // Contract
    Route::get('/{client:uuid}/contract', ClientsContractShowController::class)
        ->middleware(['permission:view-contract'])
        ->name('contract.show');

    Route::post('/{client:uuid}/contract', ClientsContractStoreController::class)
        ->middleware(['permission:create-contract'])
        ->name('contract.store');
});
