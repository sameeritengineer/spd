<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartype extends Model
{

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}