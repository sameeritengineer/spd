@extends('layouts.app')

@section('content')
<section class="Banner_Inner">
         <div class="container-floud">
            <div class="row  justify-c">
               <div class="col-md-12 text-center">
                  <h2>Payment</h2>
                 </div> 
            </div>
         </div>
</section> 
   <section class="container-lg">
<div class="container">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 summary_image">
                        @if(!is_null($data['dealimage'])) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $data['dealimage']; ?>" style="width:400px;"> @endif
                    </div>
                    <div class="row m-0 bg-light">
                      <h3 class="title-profile-order bgcolor5">Car Information</h3>
                        <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                            <p class="text-muted">Licence Plate :</p>
                            <p class="h5">{{$get_cardata->licence_plate}}</p>
                        </div>
                        <div class="col-md-4 col-6  ps-30 my-4">
                            <p class="text-muted">Make</p>
                            <p class="h5 m-0">{{$get_cardata->make}}</p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Model</p>
                            <p class="h5 m-0">{{$get_cardata->model}}</p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Year</p>
                            <p class="h5 m-0">{{$get_cardata->year}}</p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">CarType</p>
                            <p class="h5 m-0"><?php
          $cartype = App\Cartype::where('id',$get_cardata->cartype)->first();
          echo $cartype->name;
          ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    
                    <div class="row m-0 bg-light">
                      <h3 class="title-profile-order bgcolor5">Booking Information</h3>

                        
                              
                        <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h4 m-0"><span class="pe-1">{{$data['dealtype']}}</span></p>

                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Date & Time</p>
                            <p class="fs-14 fw-bold">{{$data['datetime']}}</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Washprice</p>
                            <p class="fs-14 fw-bold"><span class="fas fa-dollar-sign pe-1"></span>£{{$data['price']}}</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Service fee</p>
                            <p class="fs-14 fw-bold">£{{$data['s_price']}}</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted fw-bold">Total</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4">£{{$data['t_price']}}</span>
                            </div>
                        </div>
                        @if(!is_null($data['promo_id']))
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Promo code</p>
                            <p class="fs-14 fw-bold">{{$data['promo_name']}}</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Discount</p>
                            <p class="fs-14 fw-bold">{{$data['promo_discount']}}%</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">You Saved</p>
                            <p class="fs-14 fw-bold">-<span class="fas fa-dollar-sign px-1"></span>@php
                               $foo = $data['t_price']*$data['promo_discount']/100;
                               $saved = number_format((float)$foo, 2, '.', '');
                              @endphp
                            £{{$saved}}</p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Grand Total</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4">£{{$data['t_price']-$saved}}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                    </div>

                    <div class="col-12 px-0">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                                <p class="fw-bold">Payment detail</p>
                            </div>
                            <div class="col-12 px-4">
                                <!-- <div class="d-flex  mb-4">
                                    <span class="">
                                        <p class="text-muted">Card number</p>
                                        <input class="form-control" type="text" value="4485 6888 2359 1498"
                                            placeholder="1234 5678 9012 3456">
                                    </span>
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Expires</p>
                                        <input class="form-control2" type="text" value="01/2020" placeholder="MM/YYYY">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5">
                                        <p class="text-muted">Cardholder name</p>
                                        <input class="form-control" type="text" value="David J.Frias"
                                            placeholder="Name">
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">CVC</p>
                                        <input class="form-control3" type="text" value="630" placeholder="XXX">
                                    </div>
                                </div> -->

                                @if(Session::get('alert'))
				<div id="successMessage" class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
				  <p>{{Session::get('message')}} 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </p>
				  
				</div>
		@endif

      <!--Example 2-->
      <div class="cell example example2" id="example-2">
        <form id="publishform" method="post" action="{{route('addpayment_method_data')}}">
          @csrf
         <!--  <input type="text" name="make" value="{{$get_cardata->make}}">
          <input type="text" name="model" value="{{$get_cardata->model}}">
          <input type="text" name="year" value="{{$get_cardata->year}}">
          <input type="text" name="licence_plate" value="{{$get_cardata->licence_plate}}">
          <input type="text" name="booking_type" value="0">
          <input type="text" name="date" value="{{$data['date']}}">
          <input type="text" name="time" value="{{$data['time']}}">
          <input type="text" name="service_fee" value="{{$data['s_price']}}">
          <input type="text" name="cartype_id" value="{{$get_cardata->cartype}}"> 
          <input type="text" name="deal_id" value="{{$data['deal_id']}}">-->
          <div class="row">
            <div class="field">
              <div id="example2-card-number" class="input empty"></div>
              <label for="example2-card-number" data-tid="elements_examples.form.card_number_label">Card number</label>
              <div class="baseline"></div>
            </div>
          </div>
          <div class="row">
            <div class="field half-width">
              <div id="example2-card-expiry" class="input empty"></div>
              <label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label">Expiration</label>
              <div class="baseline"></div>
            </div>
            <div class="field half-width">
              <div id="example2-card-cvc" class="input empty"></div>
              <label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label">CVC</label>
              <div class="baseline"></div>
            </div>
          </div>
          <input type="hidden" name="mytoken" class="token">
          <button type="submit" data-tid="elements_examples.form.pay_button" class="btn btn-primary book_cnf">Pay</button>
          <div class="error" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
              <path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
              <path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
            </svg>
            <span class="message"></span></div>
        </form>


      </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


      	


    </section>

@endsection