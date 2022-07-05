<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['shop_name','shop_descrption','shop_image','shop_location','shop_lat','shop_long','currency','currency_symbol','status','user_id'];

	public function getShopImageAttribute($value)
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

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
