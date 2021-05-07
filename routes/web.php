<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverTypeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LogTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::resource('drivers', DriverController::class);

    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers');

    Route::resource('driver-types', DriverTypeController::class);

    Route::get('/driver-types', [DriverTypeController::class, 'index'])->name('driver-types');

    Route::resource('vehicle-types', VehicleTypeController::class);

    Route::get('/vehicle-types', [VehicleTypeController::class, 'index'])->name('vehicle-types');

    Route::resource('logs', LogController::class);

    Route::get('/logs', [LogController::class, 'index'])->name('logs');

    Route::resource('log-types', LogTypeController::class);

    Route::get('/log-types', [LogTypeController::class, 'index'])->name('log-types');
});

require __DIR__ . '/auth.php';
