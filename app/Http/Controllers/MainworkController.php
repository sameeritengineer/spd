<?php

namespace App\Http\Controllers;
use App\Cartype;
use App\Deal;
use App\Service;
use App\Dealservice;
use Validator;
use App\ContactUs;
use Mail;
use App\Postcode;
use App\Shop;
use DB;
use Session;
use Redirect;
use Carbon\Carbon;
use App\Order;
use App\Workingday;
use DateTime;
use App\User;
use App\Role;
use App\UserInformation;
use App\UserCarData;
use Auth;
use Illuminate\Http\Request;

class MainworkController extends Controller
{
    public function index()
    {
        $cartypes = Cartype::orderBy('id','asc')->get();
        $deals = Deal::orderBy('id','asc')->get();
        return view('myhome',compact('cartypes','deals'));

    }
    public function aboutus()
    {
        return view('aboutus');

    }
    public function services()
    {
        $cartypes = Cartype::orderBy('id','asc')->get();
        $deals = Deal::orderBy('id','asc')->get();
        return view('services',compact('cartypes','deals'));

    }
    public function contact()
    {
        return view('contact');

    }

    public function contact_form(Request $request)
    {
        $rules = ['name'=>'required','email'=>'required','comment'=>'required'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            //return response()->json(['status' => false,'message' => $validator->errors()->first()]);
            return redirect()->route('contact')->with(['alert'=>'danger','message'=>$validator->errors()->first()]);
        }
        else
        {  
            try 
            {
                $contact_us = new ContactUs;
                $contact_us->name = $request->name;
                $contact_us->email = $request->email;
                $contact_us->message = $request->comment;
                if($contact_us->save())
                {
                   //return response()->json(['status'=>true,'message'=>'Thank you for contacting us – we will get back to you soon!']);
                    $details = [
                        'name' => $request->name
                    ];

                   \Mail::to('sameer.ece564@gmail.com')->send(new \App\Mail\ContactusMail($details));

                   return redirect()->route('contact')->with(['alert'=>'success','message'=>'Thank you for contacting us – we will get back to you soon!']);
                }
                else
                {
                   //return response()->json(['status'=>false,'message'=>'Something went wrong.']);
                    return redirect()->route('contact')->with(['alert'=>'danger','message'=>'Something went wrong.']);
                }
            }
            catch (Exception $e)
            {
              //return response()->json(['status' => false,'message' => $e->getMessage()]);
                return redirect()->route('contact')->with(['alert'=>'danger','message'=>$e->getMessage()]);
            } 
        }
    }
    public function getpostcode()
    {
        if (Auth::check())
        {
           return redirect()->route('home');
        }else{
           return view('webapp.postcode');  
        }
        

    }
    public function checkpostcode(Request $request)
    {
       $data = str_replace(' ', '', trim($request->postcode));
       $postcode =  strtoupper($data);
       if(strlen($postcode) == 6)
       {
            $first =  substr($postcode,0,3);
            $last = substr($postcode,3);
            $postcode_final = $first." ".$last;
       }
       else
       {
            $first =  substr($postcode,0,4);
            $last = substr($postcode,-3);
            $postcode_final = $postcode_final = $first." ".$last;
       }
       $post_Data =  Postcode::where('postcode',$postcode_final)->first();
       if($post_Data)
       {
            $results = Shop::select(['*', DB::raw('( 6371 * acos( cos( radians('.$post_Data->latitude.') ) * cos( radians( shop_lat ) ) * cos( radians( shop_long ) - radians('.$post_Data->longitude.') ) + sin( radians('.$post_Data->latitude.') ) * sin( radians(shop_lat) ) ) ) AS distance')])->first();

            if($results->distance <= 18){
                session(['success_postcode' => $request->postcode]);
                //return response()->json(['status'=>true,'data'=>$post_Data,'message'=>"Thanks for using Corner Shop App."]);
                return redirect()->route('cartypes')->with(['alert'=>'success','message'=>'Thanks.']);
            }
            else
            {
                //return response()->json(['status'=>false,'message'=>"Sorry,We can't deliver to this area."]);
                return redirect()->route('getpostcode')->with(['alert'=>'danger','message'=>"Sorry,We can't deliver to this area."]);
            }
        }
        else
        {
            //return response()->json(['status'=>false,'message'=>"Postcode is not correct"]); 
            return redirect()->route('getpostcode')->with(['alert'=>'danger','message'=>'Postcode is not correct']);
        }
    }
    public function cartypes()
    {
        $postcode = Session::get('success_postcode');
        if(is_null($postcode)){
          return redirect()->route('getpostcode')->with(['alert'=>'danger','message'=>'Please Enter Postcode First']);
        }else{
            $cartypes = Cartype::orderBy('id','asc')->get();
            $deals = Deal::orderBy('id','asc')->get();
            return view('webapp.cartypes',compact('cartypes','deals','postcode'));
        }
        
    }
    public function getlicense(Request $request)
    {
        $url = 'https://dvlasearch.appspot.com/DvlaSearch?apikey=hEDw3kw9AeKdUwFn&licencePlate='.$request->value;
        return $json = json_decode(file_get_contents($url), true);

    }
    public function dealservices(Request $request)
    {
        $service_ids = Dealservice::where('deal_id', $request->deal_id)->pluck('service_id')->toArray();
        $services = Service::WhereIn('id', $service_ids)->pluck('name')->toArray();
        $count = 1;
        $data = '<ul>';
        foreach($services as $service){

            $data .= '<li> '.$count.')'. $service .'</li>';

            $count++;

        }
        $data .= '</ul>';

        return $data;

    }

    public function workingday_time(Request $request)
    {

        $rules = ['date'=>'required'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return response()->json(['status' => false,'message' => $validator->errors()->first()]);
        }
        else
        {
            $date = $request->date;
            $day = Carbon::parse($date)->format('l');
            $booked_slot= Order::where('date',$date)->where('status', '!=', 3)->where('status', '!=', 4)->get('time')->toArray();
            $booked_time=array();
            if($booked_slot){
                foreach($booked_slot as $key => $value){
                    array_push($booked_time, $value['time']);
                }
            }
            $blocked_slots = \App\BlockSlot::where('date',$date)->get('time')->toArray();
            if($blocked_slots){
                foreach($blocked_slots as $key => $value){
                    array_push($booked_time, $value['time']);
                }
            }
           //return $booked_time;
           $days_time = Workingday::where('day_name', $day)->get(['day_name','start_time','end_time','status'])->toArray();

           if($days_time[0]['status'] == 'inactive' || $days_time[0]['status'] == ''){
            return response()->json(['status'=>false,'message'=>'<h1>No Working day and time found</h1>']);
           }else{
            $slots = $this->getTimeSlot(60, $days_time[0]['start_time'], $days_time[0]['end_time'],$booked_time);
            return response()->json(['status'=>true,'message'=>'Working time and booked slots.','payload'=>$slots]);
           }


            // $days_time[0]['booked_slots'] = $booked_time;  
            // if(count($days_time)>0):
            //     return response()->json(['status'=>true,'message'=>'Working time and booked slots.','payload'=>$slots]);
            // else:
            //     return response()->json(['->status'=>false,'message'=>'No Working day and time found']);
            // endif;         
        }
        
    }

 function getTimeSlot($sometimeOut, $start, $end,$booked_time)
    {
        $start = new DateTime($start);
        $end = new DateTime($end);
        $BeginTimeStemp = $start->format('H:i:s'); // Get time Format in Hour and minutes
        $lastTimeStemp = $end->format('H:i:s');
        $i=0;
        $data = '';
        while(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)){
            $start = $BeginTimeStemp;
            $end = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
            $BeginTimeStemp = date('H:i:s',strtotime('+'.$sometimeOut.' minutes',strtotime($BeginTimeStemp)));
            $i++;
            if(strtotime($BeginTimeStemp) <= strtotime($lastTimeStemp)){
                if (!in_array($start, $booked_time)){
                 $time[$i]['start'] = $start;
                 $finaltime = date("g:i a", strtotime($start));;
                   $data .= '<div class="selecotr-item"><input type="radio" id="radio'.$i.'" name="selector" class="selector-item_radio"><label for="radio'.$i.'" class="selector-item_label">'.$finaltime.'</label></div>';
                }
                
                //$time[$i]['end'] = $end;
            }
        }
        return $data;
    }

     public function main_form(Request $request)
    {
        
      $rules = [
            'name'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6',
            'mobile'=>'required|unique:users',
            'address'=> 'required',
            'postcode'=>'required',
            'city'=>'required',
            /*'licence_plate'=>'required|unique:user_car_data',
            'make'=>'required',
            'model'=>'required',
            'year'=>'required',
            'cartype'=>'required'*/
        ];
         $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return response()->json(['status' => false,'message' => $validator->errors()->first()]);
        }
        else
        {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = \Hash::make($request->password);
            $user->mobile = $request->mobile;
            $user->status = 'active';
            $user->device_type = $request->device_type ?? null;
            $user->firebase_token = $request->firebase_token ?? null;
            if($user->save())
            {
                $role = Role::where('role_name','user')->first();
                $user->roles()->attach($role);
                $info = $user->user_information ?? new UserInformation;
                $info->user_id = $user->id;
                $info->address = $request->address;
                $info->address_line = $request->address_line ?? null;
                $info->city = $request->city;
                $info->postcode = $request->postcode;
                //$token = $user->createToken($user->email)->accessToken;
          if($info->save())
          {   
              $value_car = json_decode($request->value_car, true);  
              $user_car_data = new UserCarData;
              $user_car_data->user_id = $info->user_id;
              $user_car_data->licence_plate = $request->licence_plate;
              $user_car_data->make = $value_car['make'];
              $user_car_data->model = $value_car['model'];
              $user_car_data->year = $value_car['yearOfManufacture'];
              $user_car_data->cartype = $request->cartype;
              $user_car_data->mode = '1';
              $user_car_data->save();

              /*if(isset($request->device_id) && !empty($request->device_id)):
                $user_device_data = new \App\UserDeviceId;
                $user_device_data->user_id = $user->id;
                $user_device_data->device_id = $request->device_id ?? null;
                $user_device_data->firebase_token = $request->firebase_token ?? null;
                $user_device_data->device_type = $request->device_type ?? null;
                $user_device_data->save();
              endif;*/
              Auth::login($user);
              return response()->json(['status'=>true,'message'=>'Thanks for registering with Splash And Drips']);
              
              //return redirect()->route('home');
            }
            else
            {
              return response()->json(['status'=>false,'message'=>'Something error while registering! Try after some time!.']);
            }
            }
            else
            {
                return response()->json(['status'=>false,'message'=>'Something error while registering! Try after some time!.']);
            }
        }
    }

    public function summary(){
        return view('webapp.summary');
    }
    
}
