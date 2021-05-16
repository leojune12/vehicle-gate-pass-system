<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rfid',
        'name',
        'address',
        'contact_number',
        'driver_type_id',
        'vehicle_type_id',
        'course_id',
        'plate_number',
        'photo'
    ];

    // public function vehicle_type()
    // {
    //     return $this->hasOne(VehicleType::class, 'id');
    // }

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function driver_type()
    {
        return $this->belongsTo(DriverType::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
