<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getImageAttribute($value)
    {
        if ($value)
        {
            return asset('images/' . $value);
        }
        else
        {
            return asset('images/default.jpg');
        }
    }

    public function dealservice()
    {
        return $this->belongsTo('App\Dealservice');
    }
}
