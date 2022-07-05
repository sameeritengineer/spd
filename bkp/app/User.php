<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','ipaddress','device_id','device_type','updated_at','status'
    ];
    
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function user_information()
    {
        return $this->hasOne('App\UserInformation');
    }

    public function shop()
    {
        return $this->hasOne('App\Shop');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
