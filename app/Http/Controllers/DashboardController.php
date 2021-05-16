<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Driver;
use App\Models\DriverType;
use App\Models\Log;
use App\Models\LogType;
use App\Models\User;
use App\Models\UserType;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
        $user_roles = count(Role::all());
        $user_types = count(UserType::all());
        $drivers = count(Driver::all());
        $logs = count(Log::all());
        $driver_types = count(DriverType::all());
        $vehicle_types = count(VehicleType::all());
        $log_types = count(LogType::all());
        $courses = count(Course::all());

        return view('dashboard', [
            'users' => $users,
            'user_roles' => $user_roles,
            'user_types' => $user_types,
            'drivers' => $drivers,
            'logs' => $logs,
            'driver_types' => $driver_types,
            'vehicle_types' => $vehicle_types,
            'log_types' => $log_types,
            'courses' => $courses
        ]);
    }
}
