<?php

namespace App\Http\Controllers;

use App\Models\LogType;
use Illuminate\Http\Request;

class LogTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log_types = LogType::latest()->paginate(10);

        return view('pages/log-types/index', [
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
        return view('pages/log-types/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LogType::create($request->toArray());

        return redirect('/log-types')->with('status', 'Log type successfuly added');
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
        $lot_type = LogType::find($id);

        return view('pages/log-types/form', [
            'log_type' => $lot_type
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
        $log_type = LogType::find($id);

        $log_type->update($request->toArray());

        return redirect('/log-types')->with('status', 'Log type successfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log_type = LogType::find($id);

        $log_type->delete();

        return redirect('/log-types');
    }
}
