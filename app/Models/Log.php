<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'driver_id',
        'log_type_id',
        'time'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function log_type()
    {
        return $this->belongsTo(LogType::class);
    }
}
