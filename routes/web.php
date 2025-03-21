<?php

use App\Http\Controllers\SlugifierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('home');
    return view('services');

})->name('home');

// Route::get('/', function () {
//     return response()->json([
//         'message' => "Welcome to our API " . env("APP_VERSION", "")
//     ]);
//     return view('welcome');
// });

// Route::get('service')->name('services.index');

// Services

// Slugifier
Route::get('slugifier', [SlugifierController::class, 'index'])->name('slugifier.index');
Route::post('slugifier', [SlugifierController::class, 'create'])->name('slugifier.create');

// File uploader
Route::get('uploaded-files', [SlugifierController::class, 'index'])->name('file-uploader.index');
Route::get('upload-file', [SlugifierController::class, 'show'])->name('file-uploader.show');
Route::post('uploaded-files', [SlugifierController::class, 'index'])->name('file-uploader.store');