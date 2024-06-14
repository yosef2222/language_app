<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('videos', VideoController::class);

Route::middleware(['auth'])->group(function () {
    Route::post('/progress/{videoId}', [ProgressController::class, 'update'])->name('progress.update');
    Route::get('/progress/watched-time', [ProgressController::class, 'watchedTime'])->name('progress.watched-time');
});

require __DIR__.'/auth.php';
