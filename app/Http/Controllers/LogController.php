<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Log;
use App\Models\LogType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = null;
        $log_type = null;
        $date = null;

        $log_types = LogType::latest()->get();

        $logs = Log::where('driver_id', 'like', '6%')->latest()->paginate(10);

        // $logs = DB::table('logs')->latest()->paginate();

        return view('pages/logs/index', [
            'logs' => $logs,
            'log_types' => $log_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($rfid, $log_type)
    {
        $driver = Driver::where('rfid', $rfid)->first();

        if (isset($driver)) {
            $log = Log::create([
                'driver_id' => $driver->id,
                'log_type_id' => $log_type,
                'time' => now()
            ]);

            return response()->json([
                'status' => 'Access granted'
            ]);
        } else {
            return response()->json([
                'status' => 'Access denied'
            ]);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
