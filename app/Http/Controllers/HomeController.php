<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserCarData;
use App\Cartype;
use App\BookingCount;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id(); 
        $user = User::whereHas('roles',function($q){ $q->where('role_name','user'); })->find($id,['id','name','email','mobile','image']);
      $user->user_information = $user->user_information;
      $user->carinfo = UserCarData::where('user_id', $user->id)->where('mode','1')->first(['licence_plate','make','model','year','cartype','mode']);
      if($user->carinfo)
      {
          $user->cartype = Cartype::find($user->carinfo['cartype']);
      }
      $booking_count =  BookingCount::where('user_id', $user->id)->first(['booking_count']);
      if($booking_count)
      {
        $user->booking_count = $booking_count['booking_count'];
      }
      else
      {
        $user->booking_count = 0;
      }

      $all_cars = UserCarData::where('user_id', $id)->get();
        $total = count($all_cars);
        for ($i=0; $i < $total; $i++) { 
            $cartype = Cartype::find($all_cars[$i]['cartype']);
            $all_cars[$i]['cartype'] = $cartype->name;
        }
      
        return view('home',compact('user','all_cars'));
        //return view('home');
    }
}
