<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['UserEmail', 'Testimonial','user_id'];

    protected $table = 'tbltestimonial';
    protected $primaryKey ='id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
