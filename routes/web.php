<?php

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
use App\Http\Controllers\GamesController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/steamLogin', function () {
    return view('steamLogin');
});

Route::get('/games', [GamesController::class, 'list']);

Route::get('auth/steam', [AuthController::class, 'redirectToSteam']);
Route::get('auth/steam/handle', [AuthController::class, 'handle']);

Route::get('logout', [AuthController::class, 'logout']);