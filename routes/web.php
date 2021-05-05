<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverTypeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LogTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleTypeController;
use App\Models\Driver;
use App\Models\DriverType;
use App\Models\Log;
use App\Models\LogType;
use App\Models\User;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    $users = count(User::all());
    $drivers = count(Driver::all());
    $logs = count(Log::all());
    $driver_types = count(DriverType::all());
    $vehicle_types = count(VehicleType::all());
    $log_types = count(LogType::all());

    return view('dashboard', [
        'users' => $users,
        'drivers' => $drivers,
        'logs' => $logs,
        'driver_types' => $driver_types,
        'vehicle_types' => $vehicle_types,
        'log_types' => $log_types
    ]);
})->middleware(['auth'])->name('dashboard');

Route::resource('vehicle-types', VehicleTypeController::class)->middleware(['auth']);

Route::resource('drivers', DriverController::class)->middleware(['auth']);

Route::resource('driver-types', DriverTypeController::class)->middleware(['auth']);

Route::resource('log-types', LogTypeController::class)->middleware(['auth']);

Route::resource('users', UserController::class)->middleware(['auth']);

Route::resource('logs', LogController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
