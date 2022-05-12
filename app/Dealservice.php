<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealservice extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Order');
    } 

    public function services()
    {
        return $this->hasMany('App\Service');
    }
}
