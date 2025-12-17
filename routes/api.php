<?php

use App\Http\Controllers\ChunkUploadController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\StressController;
use App\Http\Controllers\UserController;
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

// Route::post('/stress', [StressController::class, 'stressMethod']);
// Route::get('/stress', [StressController::class, 'stressMethod']);
Route::match(['get','post'], '/stress', [StressController::class, 'stressMethod']);

Route::post('/media', [MediaController::class, 'saveMedia']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('upload')->group(function () {
    Route::post('init', [ChunkUploadController::class, 'initUpload']);
    Route::post('chunk', [ChunkUploadController::class, 'uploadChunk']);
    Route::get('status', [ChunkUploadController::class, 'checkStatus']);
    Route::post('merge', [ChunkUploadController::class, 'mergeChunks']);
});

// concrete class vs abstracted

// interface + binding (Repository Pattern)
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);


Route::prefix('experiments')->group(function () {

    // Route::get('/users', function () {
    //     // Matches The "/experiments/users" URL
    // });

    // Route::get('/users-lazy-loading', [UserExperiments::class, 'lazyLoading']);


    // Route::get('/users-lazy', [UserExperiments::class, 'lazyLoading']);
    // Route::get('/users-eager', [UserExperiments::class, 'eagerLoading']);
    // Route::get('/users-nplus1', [UserExperiments::class, 'nPlusOneProblem']);
    // Route::get('/users-no-nplus1', [UserExperiments::class, 'optimized']);


    // Mail
    Route::get('/demo-welcome-new-user-mail', [UserController::class, 'sendDemoWelcomeNewUserMail']);

});
