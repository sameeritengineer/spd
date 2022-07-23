@extends('layouts.app')

@section('content')


    <main>
      <section class="selectcartype-section summerywrepper">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <h2 class="pagetitlemain pagetitlemainsettings">Payment Summery</h2>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="summerypagedes">
         <div class="container">
            <div class="row">
               <div class="col-md-12 mainboxbooking">
                  <div class="row">
                     <div class="col-md-6 bookingidtop">
                      <h3>Booking Summery</h3>
                      <p>{{$data['dealtype']}}</p>
                     </div>
                     <div class="col-md-6">
                        <p class="bookingndt">{{$data['datetime']}}</p>
                     </div>
                  </div>
                  <div class="row carinfomain bxm">
                     <div class="col-md-12">
                        <h2><b>Car Information</b></h2>
                     </div>
                     <div class="col-md-4">
                      <p>Licence Plate</p>
                      <h5>{{$get_cardata->licence_plate}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Make</p>
                        <h5>{{$get_cardata->make}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Year</p>
                        <h5>{{$get_cardata->year}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Vehicle Type</p>
                        <h5><?php
          $cartype = App\Cartype::where('id',$get_cardata->cartype)->first();
          echo $cartype->name;
          ?></h5>
                     </div>
                     <div class="col-md-4">
                        <p>Model</p>
                        <h5>{{$get_cardata->model}}</h5>
                     </div>
                     <div class="col-md-4">
                        <div class="imgmainsm">
                           @if(!is_null($data['dealimage'])) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $data['dealimage']; ?>" class="wcm"> @endif
                        </div>
                     </div>
                  </div>
                  <div class="row addressboxmain bxm">
                     <div class="col-md-12">
                        <h2><b>Address</b></h2>
                     </div>
                     <div class="col-md-4">
                      <p>Address Line 1</p>
                      <h5>{{$get_address->address}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Address Line 2</p>
                        <h5>{{$get_address->address_line}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>City/Town</p>
                        <h5>{{$get_address->city}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Postcode</p>
                        <h5>{{$get_address->postcode}}</h5>
                     </div>
                  </div>
                  <div class="row addressboxmain bxm ">
                     <div class="col-md-12">
                        <h2>Booking Information</h2>
                     </div>
                     <div class="col-md-12 mt-2">
                        <h5>{{$data['dealtype']}}</h5>
                     </div>
                     <div class="col-md-4">
                      <p>Wash Price</p>
                      <h5>£{{$data['price']}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Service Fee</p>
                        <h5>£{{$data['s_price']}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Total </p>
                        <h5>£{{$data['t_price']}}</h5>
                     </div>
                  </div>
                  @if(!is_null($data['promo_name']))
                  <div class="row addressboxmain bxm">
                     <div class="col-md-12">
                        <h2>Promo code</h2>
                     </div>
                     <div class="col-md-4">
                      <p>Promocode Name</p>
                      <h5>{{$data['promo_name']}}</h5>
                     </div>
                     <div class="col-md-4">
                      <p>Discount</p>
                      <h5>{{$data['promo_discount']}}%</h5>
                     </div>
                  </div>
                  @endif
          @if(!is_null($data['promo_name']))
                  <div class="row addressboxmain bxm">
                     <div class="col-md-6">
                        <p>You Saved</p>
                     </div>
                     <div class="col-md-6">
                        <p class="savetextright">-@php
                               $foo = $data['t_price']*$data['promo_discount']/100;
                               $saved = number_format((float)$foo, 2, '.', '');
                              @endphp
                            £{{$saved}}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Grand Total</p>
                     </div>
                     <div class="col-md-6">
                        <h4 class="tbamunt">£{{$data['t_price']-$saved}}</h4>
                     </div>
                  </div>
            @endif   

                 <!--Example 1-->
      <div class="cell example example1" id="example-1">
        <form id="publishform" method="post" action="{{route('addpayment_method_data')}}">
          @csrf
          <fieldset>
            <div class="row">
              <div id="example1-card"></div>
            </div>
          </fieldset>
          <input type="hidden" name="stripe_id" class="token">
          <input type="hidden" name="make" value="{{$get_cardata->make}}">
          <input type="hidden" name="model" value="{{$get_cardata->model}}">
          <input type="hidden" name="year" value="{{$get_cardata->year}}">
          <input type="hidden" name="licence_plate" value="{{$get_cardata->licence_plate}}">
          <input type="hidden" name="booking_type" value="0">
          <input type="hidden" name="date" value="{{$data['date']}}">
          <input type="hidden" name="time" value="{{$data['time']}}">
          <input type="hidden" name="service_fee" value="{{$data['s_price']}}">
          <input type="hidden" name="cartype_id" value="{{$get_cardata->cartype}}"> 
          <input type="hidden" name="deal_id" value="{{$data['deal_id']}}">
          <input type="hidden" name="total" value="{{$data['t_price']}}">
          <input type="hidden" name="promo_id" value="{{$data['promo_id']}}">
           @if(!is_null($data['promo_name']))
          <input type="hidden" name="grand_total" value="{{$data['t_price']-$saved}}">
          <input type="hidden" name="discount_price" value="{{$saved}}">
          @endif


          <button type="submit" data-tid="elements_examples.form.pay_button">Pay</button>
          <div class="error" role="alert"><!-- <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
              <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
              <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
            </svg> -->
            <span class="message"></span></div>
        </form>
        <!-- <div class="success">
          <div class="icon">
            <svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
              <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
            </svg>
          </div>
          <h3 class="title" data-tid="elements_examples.success.title">Payment successful</h3>
          <p class="message"><span data-tid="elements_examples.success.message">Thanks for trying Stripe Elements. No money was charged, but we generated a token: </span><span class="token">tok_189gMN2eZvKYlo2CwTBv9KKh</span></p>
        </div> -->


      </div>
  
               </div>
            </div>
         </div>
         </div>
      </section>


    </main>

@endsection