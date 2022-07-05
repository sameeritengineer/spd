<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChargeDetails extends Model
{
    protected $fillable = [
        'user_id', 'booking_id', 'charge_id'
    ];
}
