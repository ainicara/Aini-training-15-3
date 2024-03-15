<?php

use App\Http\Controllers\ServerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/user/{user}/subscribe/{plan}', [ServerController::class, 'subscribe']);
Route::post('/user/{user}/unsubscribe', [ServerController::class, 'unsubscribe']);
Route::post('/user/{user}/connect-server/{server}', [ServerController::class, 'connectServer']);
