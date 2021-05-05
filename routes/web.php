<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverTypeController;
use App\Http\Controllers\LogTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleTypeController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('vehicle-types', VehicleTypeController::class)->middleware(['auth']);

Route::resource('drivers', DriverController::class)->middleware(['auth']);

Route::resource('driver-types', DriverTypeController::class)->middleware(['auth']);

Route::resource('log-types', LogTypeController::class)->middleware(['auth']);

Route::resource('users', UserController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
