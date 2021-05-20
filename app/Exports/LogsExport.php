<?php

namespace App\Exports;

use App\Models\Driver;
use App\Models\Log;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LogsExport implements FromView
{
    private $name, $start_date, $end_date, $log_type_id;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setLogTypeId(string $log_type_id)
    {
        $this->log_type_id = $log_type_id;
    }

    public function setStartDate(string $start_date)
    {
        $this->start_date = $start_date;
    }

    public function setEndDate(string $end_date)
    {
        $this->end_date = $end_date;
    }

    public function view(): View
    {
        $name = isset($this->name) ? $this->name : '';
        $log_type_id = isset($this->log_type_id) ? $this->log_type_id : '';
        $start_date = isset($this->start_date) ? $this->start_date : '';
        $end_date = isset($this->end_date) ? $this->end_date : '';

        $ids = Driver::where('name', 'like', !empty($name) ? '%' . $name . '%' : '%%')->pluck('id');

        $logs = Log::whereIn('driver_id', $ids)->where('log_type_id', 'like', '%' . !empty($log_type_id) ? '%' . $log_type_id . '%' : '%%')->where('time', '>', $start_date)->where('time', '<', !empty($end_date) ? $end_date : date('Y-m-d'))->latest()->get();

        return view('pages.logs.export', [
            'logs' => $logs,
        ]);
    }
}
