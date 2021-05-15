<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverTypeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LogTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', 'role:admin|guest'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('drivers', DriverController::class);

    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers');

    Route::resource('logs', LogController::class);

    Route::get('/logs', [LogController::class, 'index'])->name('logs');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('users', UserController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::resource('driver-types', DriverTypeController::class);

    Route::get('/driver-types', [DriverTypeController::class, 'index'])->name('driver-types');

    Route::resource('vehicle-types', VehicleTypeController::class);

    Route::get('/vehicle-types', [VehicleTypeController::class, 'index'])->name('vehicle-types');

    Route::resource('log-types', LogTypeController::class);

    Route::get('/log-types', [LogTypeController::class, 'index'])->name('log-types');

    Route::resource('courses', CourseController::class);

    Route::get('/courses', [CourseController::class, 'index'])->name('courses');

    Route::resource('user-roles', RoleController::class);

    Route::get('/user-roles', [RoleController::class, 'index'])->name('user-roles');
});

require __DIR__ . '/auth.php';
