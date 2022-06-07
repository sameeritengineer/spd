@extends('layouts.app')

@section('content')
<section class="Banner_Inner">
         <div class="container-floud">
            <div class="row  justify-c">
               <div class="col-md-12 text-center">
                  <h2>Summary</h2>
                 </div> 
            </div>
         </div>
      </section> 
   <section class="section_cartype">



      <div class="container">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 summary_image">
                        @if(!is_null($data['dealimage'])) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $data['dealimage']; ?>" style="width:400px;"> @endif
                    </div>
                    <div class="row m-0 bg-light">
                      <h3 class="title-profile-order bgcolor5">Address</h3>
                        <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                            <p class="text-muted">Address Line 1</p>
                            <p class="h5">{{$get_address->address}}</p>
                        </div>
                        <div class="col-md-4 col-6  ps-30 my-4">
                            <p class="text-muted">Address Line 2</p>
                            <p class="h5 m-0">{{$get_address->address_line}}</p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Town/City</p>
                            <p class="h5 m-0">{{$get_address->city}}</p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Postcode</p>
                            <p class="h5 m-0">{{$get_address->postcode}}</p>
                        </div>
                    </div>


                       
                    






                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">

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
                    

                    <div class="row m-0 bg-light">
                      <h3 class="title-profile-order bgcolor5">Booking Information</h3>

                        
                              
                        <div class="col-12 px-4">
                          <div class="d-flex justify-content-between mb-2 pr_mrg">
                            <p class="textmuted"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#promoModal">Apply Promo</button></p>
                            <p class="fs-14 fw-bold">@if($data['promo_status'] == 0)
                                <span style="color:red">Invalid Promo Code</span>
                              @endif
                              @if(!is_null($data['promo_name']))
                              <a href="{{route('summary')}}"><button type="button" class="btn btn-primary rm_promo">Remove Promo</button></a>
                              @endif</p>
                        </div>
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
                        @if(!is_null($data['promo_name']))
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
                            <div class="col-12  mb-4 padd-0">
                                <a href="{{route('confirm-booking')}}"><div class="btn btn-primary book_cnf">Book
                                </div></a>
                            </div>
                </div>
            </div>
        </div>
    </div>
          <!-- Modal -->
<div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="promoModalLabel">Enter Your Promo Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('summary')}}">
          @csrf
        <input type="text" name="apply_promo" id="apply_promo" required="">
        <input type="submit" name="Apply">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>   
   </section>


@endsection