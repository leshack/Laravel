<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

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
