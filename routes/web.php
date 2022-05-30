<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MovieController;
use App\Http\Livewire\Index;
use App\Http\Livewire\Login;
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

Route::get('/', Index::class)->name('index');

Route::get('login', [GeneralController::class, 'login'])->name('login')->middleware('guest');

Route::resource('movies', MovieController::class)->only('create');

