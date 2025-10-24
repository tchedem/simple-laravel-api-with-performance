<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlgorithmsController;

Route::get('/dfs', [AlgorithmsController::class, 'getDfs']);
Route::post('/dfs', [AlgorithmsController::class, 'postDfs']);
