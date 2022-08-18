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
use App\BookingCount;
use App\Promo;
use App\Faq;
use App\Jobimages;
use URL;
use Auth;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\UserChargeDetails;
use App\PushNotification;
use App\Mail\BookingMail;
use App\ApplyPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function carwash()
    {
        return view('carwash');

    }
    public function alloy_wheel()
    {
        return view('alloy');

    }
    public function services()
    {
        $cartypes = Cartype::orderBy('id','asc')->get();
        $deals = Deal::orderBy('id','asc')->get();
        return view('services',compact('cartypes','deals'));

    }
    public function contact()
    {
        if (Auth::check())
        {
          $id = Auth::id();
          $user_data = User::where('id',$id)->first();
         return view('webapp.contactsetting',compact('user_data'));
        }else{
          return view('contact');  
        }
    }
    public function change_password(){
      return view('webapp.changepassword'); 
    }
    public function update_password(Request $request)
    {   
        $this->validate($request,['op'=>"required", 'up'=>"required|string|min:6"]);
        $id = Auth::user()->id;
        $user = User::find($id);
        if(\Hash::check($request->op, $user->password)) 
        { 
            $password = \Hash::make($request->up);
            $user->password = $password;
            if($user->save()):
                 return redirect()->route('change-password')->with(['alert'=>'success','message'=>'Your password has been changed successfully.']);
            else:
                 return redirect()->route('change-password')->with(['danger'=>'success','message'=>'Something went wrong.']);
            endif;
        } 
        else 
        {
          return redirect()->route('change-password')->with(['alert'=>'danger','message'=>'Old Password is wrong']); 
        }
    }
    public function loyalty(){
      $id = Auth::id();
      $booking =  BookingCount::where('user_id', $id)->first(['booking_count']);
      if($booking)
      {
        $booking_count = $booking['booking_count'];
      }
      else
      {
        $booking_count = 0;
      }
      return view('webapp.loyalty',compact('booking_count')); 
    }
    public function upcoming_bookings(){
      $id = Auth::id();
      try 
        {
            $bookings = Order::with('deal:id,name')->where('user_id',$id)->where('status', '<=', '1')->orderBy('booking_datetime','asc')->get();
            if(count($bookings)>0):
                $message = 1; 
            else:
                $message = 'No upcoming jobs found.'; 
            endif;
        }
        catch (Exception $e)
        {       
              $message = $e->getMessage(); 
        } 
        return view('webapp.upbookings',compact('bookings','message')); 
    }
    public function completed_bookings(){
      $id = Auth::id();
      try 
        {
            $bookings = Order::with('deal:id,name')->where('user_id', $id)->where('status','2')->orderBy('booking_datetime','asc')->get();
            if(count($bookings)>0):
                $message = 1; 
            else:
                $message = 'No completed jobs found.'; 
            endif;
        }
        catch (Exception $e)
        {       
              $message = $e->getMessage(); 
        } 
        return view('webapp.combookings',compact('bookings','message')); 
    }
    public function booking_detail($booking_id)
    {
        try 
            {
                $booking = Order::with('deal:id,name','cartype:id,name','apply_promo:id,promo_id,user_id,total,grand_total,discount_price')->find($booking_id,['cartype_id','deal_id','payment_recipt','licence_plate','make','model','year','date','time','order_no','apply_promo_id','vat','service_fee','total','apply_promo_id','status','id']);

                if(!is_null($booking)):
                    if(!is_null($booking['apply_promo']))
                    {
                       $booking['promo_details'] = Promo::find($booking['apply_promo']['promo_id']);
                    }

                    $job_done_image = Jobimages::where('order_id', $booking_id)->get(['type','image']);
                    if(!is_null($job_done_image)):
                          $total = count($job_done_image);
                          for ($i=0; $i < $total; $i++){ 
                            $job_done_image[$i]['image'] = URL::to('/').'/'.$job_done_image[$i]['image'];
                          }
                          $booking['booking_images'] = $job_done_image;
                     endif;

                    //return response()->json(['status'=>true,'message'=>'Booking full Details.','payload'=>$booking]);
                     $message = 1; 
                else:
                    //return response()->json(['status'=>false,'message'=>'Booking not found.']);
                  $message = 'Booking not found.'; 
                endif;
            }
            catch (Exception $e)
            {
              //return response()->json(['status' => false,'message' => $e->getMessage()]);
              $message = $e->getMessage();
            }
            //dd($booking);
            return view('webapp.bookingdetail',compact('booking','message'));  
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
                return redirect()->route('get-cartypes')->with(['alert'=>'success','message'=>'Thanks.']);
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
    { //hEDw3kw9AeKdUwFn
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
                   $data .= '<div class="selecotr-item"><input type="radio" id="radio'.$i.'" value="'.$start.'" name="selector" class="selector-item_radio"><label for="radio'.$i.'" class="selector-item_label">'.$finaltime.'</label></div>';
                }
                
                //$time[$i]['end'] = $end;
            }
        }
        return $data;
    }

     public function main_form(Request $request)
    {
      if($request->formvaluedata == 1){
        session()->put('session_time', time());
        session()->put('dealtype', $request->dealtype);
        session()->put('book_date', $request->book_date);
        session()->put('book_time', $request->selector);
        return response()->json(['status'=>true,'message'=>'Thanks for registering with Splash And Drips']);
      }else{
        session()->put('session_time', time());
        session()->put('dealtype', $request->dealtype);
        session()->put('book_date', $request->book_date);
        session()->put('book_time', $request->book_time);
        $rules = [
            'name'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6',
            'mobile'=>'required|unique:users',
            'address'=> 'required',
            'postcode'=>'required',
            'city'=>'required',
            'licence_plate'=>'required|unique:user_car_data',
            /*'make'=>'required',
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
              /*$user_car_data->licence_plate = $user->id;
              $user_car_data->make = "sss";
              $user_car_data->model = "volks";
              $user_car_data->year = 2009;*/
              
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
      
    }

    public function summary(Request $request){
        $time = Session::get('session_time');
        if (time() - $time < 1500) { // 300 seconds = 5 minutes
    // they're within the 5 minutes so save the details to the database
         $data = [];
         $dealtype = Session::get('dealtype');
         $deal_data = Deal::find($dealtype);
         $data['dealtype'] = $deal_data->name;
         $data['dealimage'] = $deal_data->image;
         $data['price'] = $deal_data->price;
         $data['s_price'] = 2.99;
         $data['t_price'] = $data['price']+2.99;
         $combined_date_and_time = Session::get('book_date') . ' ' . Session::get('book_time');
         $past_date = strtotime($combined_date_and_time);
         $data['datetime'] = date("F d, Y h:i A", $past_date);

         if(isset($request->apply_promo) && !empty($request->apply_promo)){
           $check_promo = Promo::where('promo_code',$request->apply_promo)->first();
           if($check_promo){
            $data['promo_id'] = $check_promo->promo_id;
            $data['promo_name'] = $check_promo->promo_code;
            $data['promo_discount'] = $check_promo->discount;
            $data['promo_status'] = 1;
            session()->put('promo_id', $check_promo->id);
            }else{
            $data['promo_id'] = null;  
            $data['promo_name'] = null;
            $data['promo_discount'] = null;
            $data['promo_status'] = 0;
            } 
         }else{
           $data['promo_id'] = null;  
           $data['promo_name'] = null;
           $data['promo_status'] = 1;
           Session::forget('promo_id');
         }


        $id = Auth::id();
        $get_address = UserInformation::where('user_id',$id)->first();
        $get_cardata = UserCarData::where('user_id',$id)->where('mode','1')->first();
        return view('webapp.summary',compact('get_address','get_cardata','data'));
      }else {
          // sorry, you're out of time
         Session::forget('dealtype'); // and unset any other session vars for this task
         Session::forget('book_date');
         Session::forget('book_time');
         Session::forget('promo_id');
         return redirect()->route('book');
      }
        
        
    }
    public function confirm_booking(){
      $time = Session::get('session_time');
        if (time() - $time < 1500) { // 300 seconds = 5 minutes
    // they're within the 5 minutes so save the details to the database
         $data = [];
         $dealtype = Session::get('dealtype');
         $deal_data = Deal::find($dealtype);
         $data['dealtype'] = $deal_data->name;
         $data['dealimage'] = $deal_data->image;
         $deal_data = Deal::find($dealtype);
         $data['deal_id'] = $dealtype;
         $data['price'] = $deal_data->price;
         $data['s_price'] = 2.99;
         $data['t_price'] = $data['price']+2.99;
         $combined_date_and_time = Session::get('book_date') . ' ' . Session::get('book_time');
         $past_date = strtotime($combined_date_and_time);
         $data['datetime'] = date("F d, Y h:i A", $past_date);
         $data['date'] = Session::get('book_date');
         $data['time'] = Session::get('book_time');
         $data['promo_id'] = Session::get('promo_id');

         if(isset($data['promo_id']) && !empty($data['promo_id'])){
           $check_promo = Promo::where('id',$data['promo_id'])->first();
           if($check_promo){
            $data['promo_name'] = $check_promo->promo_code;
            $data['promo_discount'] = $check_promo->discount;
            $data['promo_status'] = 1;
            session()->put('promo_id', $check_promo->id);
            }else{
            $data['promo_name'] = null;
            $data['promo_discount'] = null;
            $data['promo_status'] = 0;
            } 
         }else{
           $data['promo_name'] = null;
           $data['promo_status'] = 1;
         }
         
        $id = Auth::id();
        $get_address = UserInformation::where('user_id',$id)->first();
        $get_cardata = UserCarData::where('user_id',$id)->where('mode','1')->first();

        Stripe::setApiKey(config('stripe.stripe_secret'));
         $user = \App\User::whereHas('roles',function($q){ $q->where('role_name','user'); })->find($id);
         //dd($user);
        if(!is_null($user->stripe_customer)):
                $cards = Customer::allSources($user->stripe_customer);
                //dd($cards);
        else:
        $cards = 0;       
        endif;
        return view('webapp.payment',compact('get_address','get_cardata','data','cards'));
      }else {
          // sorry, you're out of time
         Session::forget('dealtype'); // and unset any other session vars for this task
         Session::forget('book_date');
         Session::forget('book_time');
         Session::forget('promo_id');
         return redirect()->route('book');
      }
    }

    public function faq(){
        $faqs = Faq::orderBy('id','asc')->get();
        return view('webapp.faq',compact('faqs'));
    }

    public function account(Request $request){
        $user = User::whereHas('roles',function($q){ $q->where('role_name','user'); })->find($request->user()->id,['id','name','email','mobile','image']);
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

      $all_cars = UserCarData::where('user_id', $request->user()->id)->get();
        $total = count($all_cars);
        for ($i=0; $i < $total; $i++) { 
            $cartype = Cartype::find($all_cars[$i]['cartype']);
            $all_cars[$i]['cartype'] = $cartype->name;
        }
      
        return view('webapp.account',compact('user','all_cars'));
    }

    public function edit_profile(Request $request)
    {
        //return $request->all();
      $rules = [
        'name'=>'required',
        'mobile'=>'required|unique:users,mobile,'.$request->user()->id,
        'address'=>"required",
        'postcode'=>'required', 
        'city'=>'required'
      ];
  
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()) 
      {
        return response()->json(['status' => false,'message' => $validator->errors()->first()]);
      }
      else
      {
        $user = User::whereHas('roles',function($q){ $q->where('role_name','user'); })->find($request->user()->id);
        if(!is_null($user)):
          $user->name = $request->name;
          $user->mobile = $request->mobile;
          $image = $request->file('image');
            if ($image){
                $name = time() . '.' . $image->getClientOriginalExtension(); 
                $image_full_name = 'img_' . $name;
                $filePath = '/splashdrip/users/' . $image_full_name;
                Storage::disk('s3')->put($filePath, file_get_contents($image));
                $url = config('services.base_url')."/splashdrip/users/" . $image_full_name;
                $user->image = $url;   
            }
          if($user->save())
          {
            $info = $user->user_information ?? new UserInformation;
            $info->user_id = $user->id;
            $info->address = $request->address;
            $info->address_line = $request->address_line ?? null;
            $info->city = $request->city;
            $info->postcode = $request->postcode;
            $info->save();
            $user->user_information = $info;
            return response()->json(['status'=>true,'message'=>'Your profile has been updated.','payload'=>$user]);
          }
          else
          {
            return response()->json(['status'=>false,'message'=>'Something error while updating your profile! Try after some time.']);
          }
        else:
          return response()->json(['status'=>false,'message'=>'No user found.']);
        endif;
      }
    }
    public function remove_car(Request $request)
    {
        $car = UserCarData::find($request->del_car);
            if($car):
                 $car->delete(); 
                return redirect()->route('home')->with(['alert'=>'success','message'=>'Car removed successfully']);
            else:
                return redirect()->route('home')->with(['alert'=>'danger','message'=>'Something went wrong.']);
            endif;
    }
    public function book(){
        $id = Auth::id();
        $booking_count =  BookingCount::where('user_id', $id)->first(['booking_count']);
        if($booking_count)
        {
          $user_booking_count = $booking_count['booking_count'];
        }
        else
        {
          $user_booking_count = 0;
        }
        $deals = Deal::orderBy('id','asc')->get();
        return view('webapp.book',compact('deals','user_booking_count'));
    }
    public function book_date_time(){
         return view('webapp.bookdatetime');
    }
    public function add_car(){
        $cartypes = Cartype::orderBy('id','asc')->get();
        return view('webapp.addcar',compact('cartypes'));
    }
    public function add_newcar(Request $request)
    {
        $rules = ['cartype'=>'required','licence_plate'=>'required|unique:user_car_data','make'=>'required','model'=>'required','year'=>'required'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return response()->json(['status' => false,'message' => $validator->errors()->first()]);
        }
        else
        {
            $customer_id = $request->user()->id;
            $user_car_data = new UserCarData;
            $user_car_data->user_id = $customer_id;
            $user_car_data->licence_plate = $request->licence_plate;
            $user_car_data->make = $request->make;
            $user_car_data->model = $request->model;
            $user_car_data->year = $request->year;
            $user_car_data->cartype = $request->cartype;
            if($user_car_data->save()):
            return response()->json(['status'=>true,'message'=>'Car added successfully']);
            else:
                return response()->json(['status'=>false,'message'=>'Something went wrong.']);
            endif;
        }
    }
    public function change_car(){
        //$cartypes = Cartype::orderBy('id','asc')->get();
        $id = Auth::id();
        $all_cars = UserCarData::where('user_id', $id)->get();
        return view('webapp.changecar',compact('all_cars'));
    }
    public function change_newcar(Request $request)
    {
      //dd($request->all());
      $id = Auth::id();
      $update = UserCarData::where('user_id', $id)->update(['mode'=> '0']);
      $set_default = UserCarData::where([['user_id', '=', $id],['id', '=', $request->id]])
            ->update(['mode'=> '1']);
       if($set_default):
            return redirect()->route('change-car')->with(['alert'=>'success','message'=>'Customer default car updated']);
       else:
           return redirect()->route('change-car')->with(['alert'=>'danger','message'=>'Something went wrong.']);
       endif;     
    }
    

    public function addpayment_method_data(Request $request)
    {

      //dd($request->all());

        $rules = [
            'cartype_id'=>'required',
            'deal_id'=>'required',
            'date'=>'required',
            'time'=>'required',
            /*'vat'=>'required',*/
            'service_fee'=>'required',
            'total'=>'required',
            'licence_plate'=>'required',
            'make'=>'required',
            'model'=>'required',
            'year'=>'required',
            'booking_type' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return response()->json(['status' => false,'message' => $validator->errors()->first()]);
        }
        else
        {
            $stripe = Stripe::setApiKey(config('stripe.stripe_secret'));
            $user = User::whereHas('roles',function($q){ $q->where('role_name','user'); })->find($request->user()->id);
            if(!is_null($user))
            {
                $booking_datetime = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));
                if($request->booking_type == 0 || $request->booking_type == 2)
                {
                    if(empty($request->card_id)){
                       $rules = ['stripe_id' => 'required'];
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) 
                    {
                        return response()->json(['status' => false,'message' => $validator->errors()->first()]);
                    }
                    }
                    
                    
                    $results = Shop::first();
                    try
                    { 
                        $user_stripe_customer = $user->stripe_customer;
                        if(empty($user_stripe_customer)){
                         $customer = Customer::create(array(
                            "name" =>$user->name,
                            "email" => $user->email,
                            "phone" => $user->mobile,
                            "address" => ["city" => $user->user_information->city, "country" => "GB", "line1" =>  $user->user_information->address, "postal_code" => $user->user_information->postcode],
                            "source" => $request->stripe_id,
                            'description' => $user->name,
                        )); 
                        $user_stripe_customer = $customer->id;
                        User::where('id',$user->id)->update(['stripe_customer'=> $user_stripe_customer]);  
                     }else{
                        $user_stripe_customer = $user->stripe_customer;     
                     }
                          if(empty($request->card_id)){
                          $create_card = Customer::createSource($user_stripe_customer,['source' => $request->stripe_id]);
                          $customer = Customer::retrieve($user_stripe_customer);
                          $customer->default_source = $create_card->id;
                          $customer->save();
                      }
                        
                    }
                    catch(\Stripe\Exception\CardException $e)
                    {
                     $payload = array("status"=>$e->getHttpStatus(),"type"=>$e->getError()->type,"code"=>$e->getError()->code,"param"=>$e->getError()->param,"message"=>$e->getError()->message);
                      return response()->json(['status'=>false,"payload"=>$payload,"message"=>$e->getError()->message]);
                    } 
                    catch (\Stripe\Exception\RateLimitException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    }catch (\Stripe\Exception\InvalidRequestException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    } catch (\Stripe\Exception\AuthenticationException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    } catch (\Stripe\Exception\ApiConnectionException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    } catch (\Stripe\Exception\ApiErrorException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    }
                    catch (Exception $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    }   
                    try
                    {
                        if(!empty($request->promo_id) && isset($request->promo_id)):
                            $amount = $request->grand_total;
                        else:
                            $amount = $request->total;
                        endif;
                        $amount = number_format($amount);
                        if(empty($request->card_id)){
                        $charge = Charge::create(array(
                            'customer' => $user_stripe_customer,
                            'amount'   =>  $amount * 100,
                            'currency' => $results->currency,
                            'description' => "Booking for Splash N Drip",
                            'receipt_email'=> $user->email
                        ));
                       }else{
                        $charge = Charge::create(array(
                            'customer' => $user_stripe_customer,
                            'amount'   =>  $amount * 100,
                            'currency' => $results->currency,
                            'source' => $request->card_id,
                            'description' => "Booking for Splash N Drip",
                            'receipt_email'=> $user->email
                        ));
                        $request->stripe_id = $request->card_id;
                       }

                        $status = $charge['status'];
                        if($status == "succeeded")
                        {  
                            if($request->booking_type == 0)
                            {
                                if(!empty($request->promo_id) && isset($request->promo_id)):
                                    $apply_promo = new ApplyPromo;
                                    $apply_promo->user_id = $user->id;
                                    $apply_promo->promo_id = $request->promo_id;
                                    $apply_promo->total = $request->total;
                                    $apply_promo->discount_price = $request->discount_price;
                                    $apply_promo->grand_total = $request->grand_total;
                                    $apply_promo->save();
                                endif;
                            }
                            $latestOrder = new Order;
                            $latestOrder->user_id = $request->user()->id;
                            $latestOrder->stripe_id = $request->stripe_id;
                            $latestOrder->cartype_id = $request->cartype_id;
                            $latestOrder->deal_id = $request->deal_id;
                            $latestOrder->date = $request->date;
                            $latestOrder->time = $request->time;
                            /*$latestOrder->vat = $request->vat;*/
                            $latestOrder->service_fee = $request->service_fee;
                            $latestOrder->total = $amount;
                            $latestOrder->licence_plate = $request->licence_plate;
                            $latestOrder->make = $request->make;
                            $latestOrder->model = $request->model;
                            $latestOrder->year = $request->year;
                            $latestOrder->booking_datetime = $booking_datetime;
                            $latestOrder->payment_recipt = $charge['receipt_url'];
                            $latestOrder->booking_type = $request->booking_type;
                            if($latestOrder->save()):

                                $user_charge = new UserChargeDetails;
                                $user_charge->user_id = $user->id;
                                $user_charge->charge_id = $charge->id;
                                $user_charge->booking_id = $latestOrder->id;
                                $user_charge->save();

                                $order = Order::find($latestOrder->id);
                                if($request->booking_type == 0)
                                {
                                    if(isset($apply_promo) && !is_null($apply_promo)):
                                      $order->apply_promo_id = $apply_promo->id;
                                    endif;
                                }
                                if($request->booking_type == 2)
                                {
                                    BookingCount::where('user_id', $order->user_id)->delete();
                                }
                                $order->order_no = '#'.str_pad($latestOrder->id + 1, 3, "0", STR_PAD_LEFT);
                                if($order->save()):
                                    //$this->admin_employee_tokens($order->id,$order->order_no);

                                    $booking_data['date'] = $request->date;
                                    $booking_data['time'] = $request->time;
                                    $booking_data['name'] = $user->name;
                                    $booking_data['address'] = $user->user_information->city.' '.$user->user_information->address.' '.$user->user_information->postcode;
                                    $booking_data['email'] = $user->email;
                                    $booking_data['mobile'] = $user->mobile;
                                    $deal = Deal::find($request->deal_id);
                                    if(!is_null($deal)){
                                    $booking_data['wash_type'] = $deal->name;
                                    }

                                    Mail::to('sameer.ece564@gmail.com')->send(new BookingMail($booking_data));

                                    return redirect()->route('booking-success')->with(['alert'=>'success','message'=>'booking added successfully.','payload'=>$order->order_no]);

                                    return response()->json(['status'=>true,'message'=>'booking added successfully.','payload'=>$order->order_no]);
                                else:
                                    return response()->json(['status'=>false,'message'=>'Something went wrong.']);
                                endif;
                            else:
                                return response()->json(['status'=>false,'message'=>'Something went wrong.']);
                            endif;
                        }
                        elseif ($status == "pending")
                        {
                            return response()->json(['status'=>false,'message'=>'Sorry, the payment cannot be completed now. Please try again later.']);
                        }
                        else
                        {
                            return response()->json(['status'=>false,'message'=>'Sorry, the payment cannot be completed now. Please try again later.']);
                        }
                    } 
                    catch(\Stripe\Exception\CardException $e)
                    {
                      $payload = array("status"=>$e->getHttpStatus(),"type"=>$e->getError()->type,"code"=>$e->getError()->code,"param"=>$e->getError()->param,"message"=>$e->getError()->message);
                      return response()->json(['status'=>false,"payload"=>$payload,"message"=>$e->getError()->message]);
                    } catch (\Stripe\Exception\RateLimitException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    } catch (\Stripe\Exception\InvalidRequestException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    } catch (\Stripe\Exception\AuthenticationException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    } catch (\Stripe\Exception\ApiConnectionException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    } catch (\Stripe\Exception\ApiErrorException $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    }
                    catch (Exception $e)
                    {
                      return response()->json(['status'=>false,'message'=>$e->getMessage()]);
                    }  
                }
                elseif ($request->booking_type == 1)
                {
                    $latestOrder = new Order;
                    $latestOrder->user_id = $request->user()->id;
                    $latestOrder->stripe_id = "FREE";
                    $latestOrder->cartype_id = $request->cartype_id;
                    $latestOrder->deal_id = $request->deal_id;
                    $latestOrder->date = $request->date;
                    $latestOrder->time = $request->time;
                    $latestOrder->vat = $request->vat;
                    $latestOrder->service_fee = $request->service_fee;
                    $latestOrder->total = $request->total;
                    $latestOrder->licence_plate = $request->licence_plate;
                    $latestOrder->make = $request->make;
                    $latestOrder->model = $request->model;
                    $latestOrder->year = $request->year;
                    $latestOrder->booking_datetime = $booking_datetime;
                    $latestOrder->payment_recipt = "FREE";
                    $latestOrder->booking_type = $request->booking_type;
                    if($latestOrder->save()):
                        $order = Order::find($latestOrder->id);
                        BookingCount::where('user_id', $order->user_id)->delete();
                        $order->order_no = '#'.str_pad($latestOrder->id + 1, 3, "0", STR_PAD_LEFT);
                        if($order->save()):
                            //$this->admin_employee_tokens($order->id,$order->order_no);
                            
                            $booking_data['date'] = $request->date;
                            $booking_data['time'] = $request->time;
                            $booking_data['name'] = $user->name;
                            $booking_data['address'] = $user->user_information->city.' '.$user->user_information->address.' '.$user->user_information->postcode;
                            $booking_data['email'] = $user->email;
                            $booking_data['mobile'] = $user->mobile;

                            $deal = Deal::find($request->deal_id);

                            if(!is_null($deal)){
                            $booking_data['wash_type'] = $deal->name;
                            }

                            Mail::to('sameer.ece564@gmail.com')->send(new BookingMail($booking_data));
                            return response()->json(['status'=>true,'message'=>'Booking added successfully.','payload'=>$order->order_no]);
                        else:
                            return response()->json(['status'=>false,'message'=>'Something went wrong.']);
                        endif;
                    else:
                        return response()->json(['status'=>false,'message'=>'Something went wrong.']);
                    endif;
                }
            }
            else
            {
                return response()->json(['status'=>false,'message'=>'User not found.']);
            }
        }

      
    }
    public function admin_employee_tokens($order_id, $order_no)
    {
        $users_id = DB::table('role_user')->where('role_id','1')->orWhere('role_id','3')->pluck('user_id')->toArray();
        $tokens = User::whereIn('id', $users_id)->get(['id','firebase_token']);
        foreach ($tokens as $value)
        {
            if(!is_null($value->firebase_token))
            {
              $message = [ 
                "to" => $value->firebase_token,
                "priority" => 'high',
                "sound" => 'default', 
                "badge" => '1',
                "notification" =>
                    [
                        "title" => "New Booking",
                        "body" => "You have new booking to confirm",
                    ],
                "data" => 
                        [ 
                           "order_id" => $order_id,
                           "order_no"=> $order_no
                        ]
                    ];
               PushNotification::send($message);
            }
        }  
    }

    public function generate_token()
    { 
        //return config('stripe.stripe_key');
        Stripe::setApiKey(config('stripe.stripe_secret'));
        $connectionToken = \Stripe\Token::create(['card' => [
            'number' => '4242424242424242',
            'exp_month' => 06,
            'exp_year' => 25,
            'cvc' => '314',
        ],]);
        return $connectionToken;
    }

    public function booking_success()
    { 
         //return view('webapp.bookingsuccess',compact('value','messageji'));
        $value = Session::get('alert');
        $message = Session::get('message');
        if($value == null){
            return redirect()->route('upcoming-bookings');
        }else{
         return view('webapp.bookingsuccess',compact('value','message'));
        }
    }

    public function get_cartypes_new()
    {
        $postcode = Session::get('success_postcode');
        if(is_null($postcode)){
          return redirect()->route('getpostcode')->with(['alert'=>'danger','message'=>'Please Enter Postcode First']);
        }elseif(Auth::check()){
         return redirect()->route('book');
        }else{
            $cartypes = Cartype::orderBy('id','asc')->get();
            $deals = Deal::orderBy('id','asc')->get();
            return view('webapp.steps.step1',compact('cartypes','deals','postcode'));
        }
        
    }
    public function get_deals_new()
    {
        $postcode = Session::get('success_postcode');
        if(is_null($postcode)){
          return redirect()->route('getpostcode')->with(['alert'=>'danger','message'=>'Please Enter Postcode First']);
        }elseif(Auth::check()){
         return redirect()->route('book');
        }else{
            $deals = Deal::orderBy('id','asc')->get();
            return view('webapp.steps.step2',compact('deals','postcode'));
        }
        
    }
    public function get_time_new()
    {
        $postcode = Session::get('success_postcode');
        if(is_null($postcode)){
          return redirect()->route('getpostcode')->with(['alert'=>'danger','message'=>'Please Enter Postcode First']);
        }elseif(Auth::check()){
         return redirect()->route('book');
        }else{
            return view('webapp.steps.step3');
        }
        
    }
    public function create_account()
    {
        $postcode = Session::get('success_postcode');
        if(is_null($postcode)){
          return redirect()->route('getpostcode')->with(['alert'=>'danger','message'=>'Please Enter Postcode First']);
        }elseif(Auth::check()){
         return redirect()->route('book');
        }else{
            return view('webapp.steps.step4',compact('postcode'));
        }
        
    }
    public function saved_cards()
    {
        $id = Auth::id();
        Stripe::setApiKey(config('stripe.stripe_secret'));
         $user = \App\User::whereHas('roles',function($q){ $q->where('role_name','user'); })->find($id);
        if(!is_null($user)):
                $cards = Customer::allSources($user->stripe_customer);
                //dd($cards);
        endif;
      return view('webapp.cards',compact('cards'));
    }
    public function delete_card(Request $request){

    //dd($request->all());
    $user = User::find($request->user()->id);
    $stripe_customer = $user->stripe_customer;
    Stripe::setApiKey(config('stripe.stripe_secret'));

   $delete = Customer::deleteSource(
      $stripe_customer,
      $request->card_id,
      []
    );
   if($delete->deleted == true){
    return redirect()->route('saved-cards')->with(['alert'=>'success','message'=>'Your card has been deleted successfully.']);
   }else{
    return redirect()->route('saved-cards')->with(['danger'=>'success','message'=>'Something went wrong.']);
   }

  }  

  public function add_card(Request $request){
    $user = User::find($request->user()->id);
    $stripe_customer = $user->stripe_customer;
    Stripe::setApiKey(config('stripe.stripe_secret'));

    
    $current_card = \Stripe\Token::retrieve(
      $request->stripe_id,
      []
    );
    /* get current card that we want to add */
    $current_card_fingerprint = $current_card->card->fingerprint;
    $current_card_exp_month  = $current_card->card->exp_month;
    $current_card_exp_year = $current_card->card->exp_year;
    
    $card_exist = 0;

    /* get all cards */
    $cards = Customer::allSources($stripe_customer);
    foreach($cards->data as $data){
        $fingerprint = $data->fingerprint;
        $exp_month   = $data->exp_month;
        $exp_year    = $data->exp_year;
        if($fingerprint == $current_card_fingerprint && $exp_month == $current_card_exp_month && $current_card_exp_year == $exp_year){
          $card_exist = 1;
        }
    }
    //return $card_exist;

    if($card_exist == 0){
       
    $create_card = Customer::createSource($stripe_customer,['source' => $request->stripe_id]);
        if($create_card->id){
        return redirect()->route('saved-cards')->with(['alert'=>'success','message'=>'Your card has been added successfully.']);
        }else{
        return redirect()->route('saved-cards')->with(['alert'=>'success','message'=>'Something went wrong.']);
        }

    }else{
       return redirect()->route('saved-cards')->with(['alert'=>'danger','message'=>'Card already exist. No need to add it again']);
    }

    

  }
  public function add_review_order(Request $request)  
    {
        $rules = [ 'order_id'=>'required', 'rateing'=>'required', 'comment'=>'required' ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return response()->json(['status' => false,'message' => $validator->errors()->first()]);
        }
        else
        {
            $have_review = \App\OrderReview::where('user_id', $request->user()->id)->where('order_id', $request->order_id)->first();
            if($have_review){
                $have_review->rateing =  $request->rateing;
                $have_review->comment = $request->comment;
            }
            else
            {
                $have_review = new \App\OrderReview;
                $have_review->user_id = $request->user()->id;
                $have_review->order_id = $request->order_id;
                $have_review->rateing =  $request->rateing;
                $have_review->comment = $request->comment;
            }
            $have_review->save();
            if($have_review->save()):
                return redirect()->route('booking-detail',$request->order_id)->with(['alert'=>'success','message'=>'Review added successfully']);
            else:
                return redirect()->route('booking-detail',$request->order_id)->with(['alert'=>'success','message'=>'Something went wrong.']);
            endif;

        }
    }

    
    
}
