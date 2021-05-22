<?php

namespace App\Http\Controllers;

use App\Models\DriverType;
use Illuminate\Http\Request;

class DriverTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver_types = DriverType::latest()->paginate(10);

        return view('pages/driver-types/index', [
            'driver_types' => $driver_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/driver-types/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DriverType::create($request->toArray());

        return redirect('/driver-types')->with('status', 'Driver type successfully added');
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
        $driver_type = DriverType::find($id);

        return view('pages/driver-types/form', [
            'driver_type' => $driver_type
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
        $driver_type = DriverType::find($id);

        $driver_type->update($request->toArray());

        return redirect('/driver-types')->with('status', 'Driver type successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver_type = DriverType::find($id);

        $driver_type->delete();

        return redirect('/driver-types')->with('status', 'Driver type successfully deleted');
    }
}
