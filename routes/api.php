<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\StressController;
use Illuminate\Http\Request;
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

Route::post('/stress', [StressController::class, 'stressMethod']);

Route::post('/media', [MediaController::class, 'saveMedia']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
