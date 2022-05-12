<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
	protected $hidden = [
        'country_id', 'state_id','city_id','zipcode_id','created_at','updated_at',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
