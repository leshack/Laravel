<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use  HasFactory, Notifiable;

    protected $fillable = [
        'Username',
        'password',
        'picture',
        'email',
        'skills',
    ];

    protected $hidden = [
        'password',
    ];

    protected $table = 'admins';
    protected $guarded = array();

    public function getPictureAttribute($value){
        if($value){
            return asset('images/adminprofilepic/'.$value);
        }else{
            return asset('images/adminprofilepic/no-image.png');
        }
    }


}
