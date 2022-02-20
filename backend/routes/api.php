<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\NewPasswordController;
use App\Http\Controllers\Api\V1\ClientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [LoginController::class, 'logout']);

});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/reset-password', [NewPasswordController::class, 'store']);


// Clients...
Route::group([
    'prefix' => 'v1',
    'as' => 'api.',
    'namespace' => 'Api\V1',
    'middleware' => ['auth:sanctum']
], function () {
    Route::apiResource('clients', ClientsController::class);
});
