<?php

use App\Http\Controllers\FileUploaderController;
use App\Http\Controllers\SlugifierController;
use App\Http\Controllers\TestSomeQueueFeatureController;
use App\Jobs\TestJob;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

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
Route::get('slugifier', [SlugifierController::class, 'create'])->name('slugifier.create');
Route::post('slugifier', [SlugifierController::class, 'store'])->name('slugifier.store');

Route::get('upload', [FileUploaderController::class, 'create'])->name('upload.create');

Route::get('test-upload', function () {
    return view('test-upload');
});

Route::get('test-tailwind', function () {
    // return view('test-tailwind-2');
    return view('test-tailwind');
});


Route::get('test-queue', [TestSomeQueueFeatureController::class, 'runQueueForSixtySeconds']);
