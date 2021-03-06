@extends('layouts.app')

@section('content')
    <main>
      <section class="selectcartype-section summerywrepper">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Booking Detail</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
@if($message == 1)
      <section class="summerypagedes">
         <div class="container">
          @php
            $combined_date_and_time = $booking->date . ' ' . $booking->time;
            $past_date = strtotime($combined_date_and_time);
            $date = date("d M", $past_date);
            $day  = date("D", $past_date);
            $time  = date("h:i A", $past_date);
            $deal_data = App\Deal::find($booking->deal_id);
            $cartypes = App\Cartype::find($booking->cartype_id);
            @endphp
            <div class="row">
               <div class="col-md-12 mainboxbooking">
                  <div class="row">
                     <div class="col-md-6 bidcl"><h2>Booking ID: {{$booking->order_no}}</h2></div>
                     <div class="col-md-6">
                        <p class="bookingndt">{{$day}} {{$date}} {{$time}}</p>
                     </div>
                  </div>
                  <div class="row carinfomain bxm">
                     <div class="col-md-12">
                        <h2><b>Car Information</b></h2>
                     </div>
                     <div class="col-md-4">
                      <p>Licence Plate</p>
                      <h5>{{$booking->licence_plate}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Make</p>
                        <h5>{{$booking->model}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Year</p>
                        <h5>{{$booking->year}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Vehicle Type</p>
                        <h5>{{$cartypes->name}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Model</p>
                        <h5>{{$booking->model}}</h5>
                     </div>
                     <div class="col-md-4">
                        <div class="imgmainsm">
                           @if(!is_null($deal_data->s_image)) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal_data->s_image; ?>" class="wcm"> @endif
                        </div>
                     </div>
                  </div>
                  <div class="row addressboxmain bxm ">
                     <div class="col-md-12">
                        <h2><b>Booking Information</b></h2>
                     </div>
                     <div class="col-md-12 mt-2">
                        <h5>{{$deal_data->name}}</h5>
                     </div>
                     <div class="col-md-4">
                      <p>Wash Price</p>
                      <h5>??{{$deal_data->price}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Service Fee</p>
                        <h5>??{{$booking->service_fee}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Total </p>
                        <h5>??{{$booking->total}}</h5>
                     </div>
                  </div>
                  <div class="row addressboxmain bxm ">
                     <div class="col-md-12">
                        <h2><b>Job Detail</b></h2>
                     </div>
                     <div class="col-md-4">
                      <p>Date</p>
                      <h5>{{$day}} {{$date}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Time</p>
                        <h5>{{$time}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Payment Receipt </p>
                        <p><a class="btnapplypromo" href="{{$booking->payment_recipt}}">View</a></p>
                     </div>
                  </div>
                  <div class="row perstlrow no-gutters">
            <div class="col-md-12 p-0">
              <!-- <h3 class="cardeltitle"><b>Car Images</b></h3> -->
              @php
              $value =$booking->booking_images;
              @endphp
           </div>
           @foreach($value as $val)
             @if($val->type == 'before')
             <div class="col-md-12">
               <h5 class="cardeltitlen"><b>Before Washing</b></h5>
               <p class="totalprice">
                <img class="carimgwash" src="{{$val->image}}" alt="image">
               </p>
            </div>
             @else
             <div class="col-md-12">
               <h5 class="cardeltitlen"><b>After Washing</b></h5>
               <h6 class="totalprice">
                <img class="carimgwash" src="{{$val->image}}" alt="image">
               </h6>
            </div>
             @endif
           @endforeach
            <!-- <div class="col-md-12 ">
               <p><a data-toggle="modal" data-target="#washrating" class="btnapplypromo" href="#">Rate Order</a></p>
             </div> -->
         </div>


                  

    
               </div>
            </div>
         </div>
         </div>
      </section>
      @else
      <div class="row booking-row"><h4>{{$message}}</h4></div>
      @endif      
 
    </main>
     <div class="modal fade modalcustom mdlrating" id="washrating" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header padcustom">
            <h5 class="modal-title" id="exampleModalLongTitle"><b>Rate Your Expirence</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="logopop"><a href="#"><img class="" src="images/logo.png" alt="image"></a></div>
            <ul class="servicelisting">
               <li><i class="fa fa-star" aria-hidden="true"></i></li>
               <li><i class="fa fa-star" aria-hidden="true"></i></li>
               <li><i class="fa fa-star" aria-hidden="true"></i></li>
               <li><i class="fa fa-star" aria-hidden="true"></i></li>
               <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
               
            </ul>
            <div class="form-group">
               <label class="labelinputtext"></label>Comment
               <textarea class="form-control form-control-custom" placeholder="Leave a Comment...."></textarea>
             </div>
             <button class="btn btnownstyle mt-1 w-100 btnsendnew" type="submit">Send</button>
          </div>
        </div>
      </div>
    </div>   
@endsection