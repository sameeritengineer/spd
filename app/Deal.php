<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
