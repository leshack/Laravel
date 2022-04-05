<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
			'VehiclesTitle' ,
            'VehiclesBrands' ,
            'VehiclesOverview' ,
            'PricePerDay' ,
            'FuelType' ,
            'ModelYear' ,
            'SeatingCapacity',
            'Vimage1' ,
            'Vimage2' ,
            'Vimage3' ,
            'Vimage4' ,
            'Vimage5' ,
            'AirConditioner',
            'PowerDoorLocks',
            'AntiLockBrakingSystem',
            'BrakeAssit',
            'PowerSteering',
            'DriverAirbag',
            'PassegerAirbag',
            'PowerWindows',
            'CDPlayer',
            'CentralLocking',
            'CrashSensor',
            'LeatherSeats',

    ];

    protected $table = 'tblvehicles';
    protected $primaryKey ='id';



    public function brands()
    {
        return $this->hasMany(Brands::class);
    }
    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }


}
