<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\DriverType;
use App\Models\Log;
use App\Models\LogType;
use App\Models\User;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    }
}
