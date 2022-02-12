<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'phone',
        'picture',
        'Dob',
        'address',
        'city',
        'country',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table = 'users';


    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function testimonial()
    {
        return $this->hasMany(Testimonial::class);
    }
    public function profile()
    {
        return $this->hasMany(Profile::class);
    }
    public function password()
    {
        return $this->hasOne(Password::class);
    }
    public function getPictureAttribute($value){
        if($value){
            return asset('images/usersprofilepic/'.$value);
        }else{
            return asset('images/usersprofilepic/no-image.png');
        }
    }
}
