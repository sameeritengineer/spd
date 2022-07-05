<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workingday extends Model
{
    protected $fillable=['day_id','day_name','start_time','end_time','status'];
   	protected $primaryKey = 'day_id';
   	protected $hidden=['created_at','updated_at'];
}
