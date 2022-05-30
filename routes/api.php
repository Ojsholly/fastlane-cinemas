<?php

use App\Http\Controllers\API\FetchBranchesController;
use App\Http\Controllers\API\FetchSchedulesController;
use App\Http\Controllers\API\FetchUsersController;
use App\Http\Controllers\API\Movie\MovieController;
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

Route::get('schedules', FetchSchedulesController::class);

Route::apiResource('movies', MovieController::class)->only('index', 'show');

Route::get('branches', FetchBranchesController::class);

Route::post('login', FetchUsersController::class);
