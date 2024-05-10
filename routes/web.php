<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransporterController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/transporters', [TransporterController::class, 'index'])
        ->name('dashboard');
    Route::get('/transporters/create', [TransporterController::class, 'create'])
        ->name('transporters.create');
    Route::post('/transporters', [TransporterController::class, 'store'])
        ->name('transporters.store');
    Route::delete('/transporters/{transporter}', [TransporterController::class, 'destroy'])
        ->name('transporters.destroy');
    Route::get('/transporters/{transporter}/edit', [TransporterController::class, 'edit'])
        ->name('transporters.edit');
    Route::put('/transporters/{transporter}', [TransporterController::class, 'update'])
        ->name('transporters.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
