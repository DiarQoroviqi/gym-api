<?php

declare(strict_types=1);

use Domain\Contracting\Enums\ContractTypes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    dd(ContractTypes::from(1)->value);
//    return view('welcome');
});
