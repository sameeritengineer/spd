<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $hidden=['created_at','updated_at','status'];
}
