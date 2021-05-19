<?php

namespace App\Exports;

use App\Models\Driver;
use App\Models\Log;
use App\Models\LogType;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;

class LogsExport implements FromView
{
    // use Exportable;
    // /**
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function query()
    // {
    //     return Log::query();
    // }

    private $name, $date, $log_type_id;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setLogTypeId(string $log_type_id)
    {
        $this->log_type_id = $log_type_id;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function view(): View
    {
        $name = isset($this->name) ? $this->name : '';
        $log_type_id = isset($this->log_type_id) ? $this->log_type_id : '';
        $date = isset($this->date) ? $this->date : '';

        $ids = Driver::where('name', 'like', !empty($name) ? '%' . $name . '%' : '%%')->pluck('id');

        $logs = Log::whereIn('driver_id', $ids)->where('log_type_id', 'like', '%' . !empty($log_type_id) ? '%' . $log_type_id . '%' : '%%')->where('time', 'like', !empty($date) ? '%' . $date . '%' : '%%')->latest()->get();

        return view('pages.logs.export', [
            'logs' => $logs,
        ]);
    }
}
