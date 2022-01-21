<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = ['UserEmail', 'Bookings','user_id'];

    protected $table = 'tblbookings';
    protected $primaryKey ='id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function brands()
    {
        return $this->hasMany(Brands::class);
    }
}