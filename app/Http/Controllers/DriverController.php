<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Driver;
use App\Models\DriverType;
use App\Models\Log;
use App\Models\User;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::latest()->paginate(10);

        return view('pages/drivers/index', [
            'drivers' => $drivers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle_types = VehicleType::all();

        $driver_types = DriverType::all();

        $courses = Course::all();

        return view('pages/drivers/form', [
            'vehicle_types' => $vehicle_types,
            'driver_types' => $driver_types,
            'courses' => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'rfid' => [
                Rule::unique('drivers'),
            ],
            'photo' => [
                'nullable',
                'image',
                'max:2048'
            ]
        ])->validate();

        $photo_path = null;

        if (isset($request->photo)) {
            $photo_path = Storage::put('/media', $request['photo']);
        }

        $driver = Driver::create($request->except('photo'));

        $driver->forceFill([
            'photo' => $photo_path
        ])->save();

        return redirect('/drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        $logs = Log::where('driver_id', $driver->id)->latest()->paginate(10);

        return view('pages/drivers/show-logs', [
            'driver' => $driver,
            'logs' => $logs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle_types = VehicleType::all();

        $driver_types = DriverType::all();

        $courses = Course::all();

        $driver = Driver::find($id);

        return view('pages/drivers/form', [
            'vehicle_types' => $vehicle_types,
            'driver_types' => $driver_types,
            'courses' => $courses,
            'driver' => $driver
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'rfid' => [
                Rule::unique('drivers')->ignore($id)
            ],
            'photo' => [
                'nullable',
                'image',
                'max:2048'
            ]
        ])->validate();

        $driver = Driver::find($id);

        $photo_path = $driver->photo;

        if (isset($request->photo)) {
            if (isset($driver->photo)) {
                Storage::delete($driver->photo);
            }

            $photo_path = Storage::put('/media', $request['photo']);
        }

        $driver->update($request->except(['photo']));

        $driver->forceFill([
            'photo' => $photo_path
        ])->save();

        return redirect('/drivers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);

        Storage::delete($driver->photo);

        $driver->delete();

        return redirect('/drivers');
    }

    public function delete_photo($id)
    {
        $driver = Driver::find($id);

        Storage::delete($driver->photo);

        $driver->forceFill([
            'photo' => null
        ])->save();

        return back();
    }
}
