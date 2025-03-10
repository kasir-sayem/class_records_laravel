<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataRetrievalController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Student routes
Route::resource('students', StudentController::class);

// Subject routes
Route::resource('subjects', SubjectController::class);

// Mark routes
Route::resource('marks', MarkController::class);

// Data retrieval form route
Route::get('/data-retrieval', [DataRetrievalController::class, 'index'])
    ->name('data-retrieval');
Route::post('/data-retrieval', [DataRetrievalController::class, 'retrieve'])
    ->name('data-retrieval.retrieve');

// Chart route
Route::get('/charts', [ChartController::class, 'index'])
    ->name('charts');

// Profile routes (from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';