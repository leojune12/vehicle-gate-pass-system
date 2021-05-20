<?php

namespace App\Http\Controllers;

use App\Exports\LogsExport;
use App\Models\Driver;
use App\Models\Log;
use App\Models\LogType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = isset($request->name) ? $request->name : '';
        $log_type_id = isset($request->log_type_id) ? $request->log_type_id : '';
        $start_date = isset($request->start_date) ? $request->start_date : '';
        $end_date = isset($request->end_date) ? $request->end_date : '';

        $ids = Driver::where('name', 'like', !empty($name) ? '%' . $name . '%' : '%%')->pluck('id');

        $logs = Log::whereIn('driver_id', $ids)->where('log_type_id', 'like', '%' . !empty($log_type_id) ? '%' . $log_type_id . '%' : '%%')->where('time', 'like', !empty($date) ? '%' . $date . '%' : '%%')->latest()->paginate(10);

        $log_types = LogType::latest()->get();

        return view('pages/logs/index', [
            'logs' => $logs,
            'log_types' => $log_types,
            'name' => $name,
            'log_type_id' => $log_type_id,
            'start_date' => $start_date,
            'end_date' => $end_date
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

    public function filter(Request $request)
    {
        $name = !empty($request->name) ? '&name=' . $request->name : '';
        $log_type_id = !empty($request->log_type_id) ? '&log_type_id=' . $request->log_type_id : '';
        $date = !empty($request->date) ? '&date=' . $request->date : '';

        $meta = $name . $log_type_id . $date;

        $suffix = !empty($meta) ? '?' . $meta : '';

        return redirect('/logs' . $suffix);
    }

    public function export(Request $request)
    {
        $name = isset($request->name) ? $request->name : '';
        $log_type_id = isset($request->log_type_id) ? $request->log_type_id : '';
        $date = isset($request->date) ? $request->date : '';

        $export = new LogsExport();
        $export->setName($name);
        $export->setLogTypeId($log_type_id);
        $export->setDate($date);

        return Excel::download($export, 'logs-' . date('mdY-his') . '.xlsx');
    }
}
