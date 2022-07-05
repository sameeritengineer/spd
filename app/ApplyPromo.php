<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyPromo extends Model
{
    protected $fillable=['user_id','promo_id','total','discount_price'];
    public function promo()
    {
    	return $this->belongsTo('App\Promo');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function order()
    {
    	return $this->hasOne('App\ApplyPromo');
    }
}
