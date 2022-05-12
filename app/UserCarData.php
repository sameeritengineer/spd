<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCarData extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
