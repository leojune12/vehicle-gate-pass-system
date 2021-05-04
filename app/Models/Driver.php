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
        'rfid_id',
        'name',
        'address',
        'contact_number',
        'vehicle_type_id'
    ];

    // public function vehicle_type()
    // {
    //     return $this->hasOne(VehicleType::class, 'id');
    // }

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class);
    }
}
