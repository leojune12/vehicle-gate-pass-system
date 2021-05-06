<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\DriverType;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
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

        return view('pages/drivers/form', [
            'vehicle_types' => $vehicle_types,
            'driver_types' => $driver_types
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
        ])->validate();

        Driver::create($request->all());

        return redirect('/drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $driver = Driver::find($id);

        return view('pages/drivers/form', [
            'vehicle_types' => $vehicle_types,
            'driver_types' => $driver_types,
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
                Rule::unique('drivers')->ignore($request->id)
            ],
        ])->validate();

        $driver = Driver::find($id);

        $driver->update($request->all());

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

        $driver->delete();

        return redirect('/drivers');
    }
}
