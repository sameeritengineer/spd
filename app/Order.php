<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id','car_typeid','washdeal_id','date','time','total','status'];
    public function getOrderStatusAttribute()
    {
        if($this->status == "0")
        {
            return "New Booking";
        }
        if($this->status == "1")
        {
            return "Accept Booking";
        } 
        if($this->status == "2")
        {
            return "Start Job";
        } 
        if($this->status == "3")
        {
            return "Cancelled Job";
        }
        if($this->status == "4")
        {
            return " Completed Job";
        }
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cartype()
    {
    	return $this->belongsTo('App\Cartype');
    }

    public function deal()
    {
        return $this->belongsTo('App\Deal');
    }

    public function order_review()
    {
        return $this->hasOne('App\OrderReview');
    }

    public function apply_promo()
    {
        return $this->belongsTo('App\ApplyPromo');
    }
}
