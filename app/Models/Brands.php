<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;

    protected $table = 'tblbrands';
    protected $primaryKey ='id';

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
