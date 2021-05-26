<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverTypeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LogTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\VehicleTypeController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('make-hash/{password}', function ($password) {
    return Hash::make($password);
});

Route::middleware(['auth', 'role:admin|guest'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('drivers', DriverController::class);

    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers');

    Route::get('/logs', [LogController::class, 'index'])->name('logs');

    Route::get('/logs/filter', [LogController::class, 'filter'])->name('logs-filter');

    Route::get('/logs/export', [LogController::class, 'export'])->name('logs-export');

    Route::get('/drivers/show-logs/{driver}', [DriverController::class, 'show']);

    Route::get('/drivers/show-driver/{id}', [DriverController::class, 'show_driver']);

    Route::resource('change-password', ChangePasswordController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('users/reset-password/{user}', [UserController::class, 'reset_password'])->name('password.reset');

    Route::post('users/reset-password/{user}', [UserController::class, 'save_new_password'])->name('password.update');

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

    Route::resource('user-types', UserTypeController::class);

    Route::get('/user-types', [UserTypeController::class, 'index'])->name('user-types');

    Route::post('delete-user-photo/{id}', [UserController::class, 'delete_photo']);

    Route::post('delete-driver-photo/{id}', [DriverController::class, 'delete_photo']);
});

require __DIR__ . '/auth.php';
