@extends('layouts.app')

@section('content')

    <main>

      <section class="selectcartype-section summerywrepper">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <h2 class="pagetitlemain pagetitlemainsettings">Summery</h2>
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
                  <!-- <div class="row addressboxmain bxm p-0 border-0">
                       <a class="applypromobtnnew" href="#">Apply Promo</a>
                        <a class="removepromobtnnew" href="#">Remove Promo</a>
                  </div> -->
                  <div class="row btngroup no-gutters">
            <div class="col-md-3">
               <p><!-- <a class="btnapplypromo"  href="#">Apply Promo</a> -->
                 <button type="button" class="btnapplypromo" data-toggle="modal" data-target="#promoModal">Apply Promo</button>
               </p>
               @if(!is_null($data['promo_name']))
              <p><a href="{{route('summary')}}"><button type="button" class="btnremovepromo rm_promo">Remove Promo</button></a></p>
            @endif
            <p style="float: left">@if($data['promo_status'] == 0)
                   <span style="color:red">Invalid Promo Code</span>
                 @endif
               </p>
            </div>
            
          </div>
          <!-- <a href="{{route('confirm-booking')}}"><button class="btn btnownstyle mt-4 mx-w300 btnbook">Book</button></a> -->
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
            <a href="{{route('confirm-booking')}}"><button class="btn btnownstyle mt-4 mx-w300 btnbook">Book</button></a>   
               </div>
            </div>
         </div>
         </div>
      </section>





      <!--<section class="cartypecontainer-section">
        <div class="container">
       <div class="row">
        <div class="col-md-6">
          <div class="row perstlrow no-gutters secmain">
            <div class="col-md-12 p-0">
              <h3 class="cardeltitle"><b>Car Information</b></h3>
              @if(!is_null($data['dealimage'])) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $data['dealimage']; ?>" class="wcm"> @endif
           </div>
            <div class="col-md-5">
               <p>Licence Plate </p>
            </div>
            <div class="col-md-7">
               <h6>{{$get_cardata->licence_plate}}</h6>
            </div>
            <div class="col-md-5">
               <p>Make</p>
            </div>
            <div class="col-md-7">
               <h6>{{$get_cardata->make}}</h6>
            </div>
            <div class="col-md-5">
               <p>Year</p>
            </div>
            <div class="col-md-7">
               <h6>{{$get_cardata->year}}</h6>
            </div>
            <div class="col-md-5">
               <p>Vehicle Type</p>
            </div>
            <div class="col-md-7">
               <h6><?php
          $cartype = App\Cartype::where('id',$get_cardata->cartype)->first();
          echo $cartype->name;
          ?></h6>
            </div>
            <div class="col-md-5">
              <p>Model</p>
           </div>
           <div class="col-md-7">
              <h6>{{$get_cardata->model}}</h6>
           </div>
         </div>
         <div class="row perstlrow no-gutters secmain">

          <div class="col-md-12 p-0">
            <h3 class="cardeltitle"><b>Address</b></h3>
         </div>
          <div class="col-md-5">
             <p>Address Line 1</p>
          </div>
          <div class="col-md-7">
             <h6>{{$get_address->address}}</h6>
          </div>
          <div class="col-md-5">
             <p>Address Line 2</p>
          </div>
          <div class="col-md-7">
             <h6>{{$get_address->address_line}}</h6>
          </div>
          <div class="col-md-5">
             <p>City/Town</p>
          </div>
          <div class="col-md-7">
             <h6>{{$get_address->city}}</h6>
          </div>
          <div class="col-md-5">
             <p>Postcode</p>
          </div>
          <div class="col-md-7">
             <h6>{{$get_address->postcode}}</h6>
          </div>
       </div>
        </div>
        <div class="col-md-6">
          <div class="row perstlrow no-gutters secmain">
            <div class="col-md-12 p-0">
              <h3 class="cardeltitle"><b>Booking Information</b></h3>
              <h5 class="plnname">{{$data['dealtype']}}</h5>
           </div>
            <div class="col-md-5">
               <p>Date & Time</p>
            </div>
            <div class="col-md-7">
               <h6>{{$data['datetime']}}</h6>
            </div>
            <div class="col-md-5">
               <p>Washprice</p>
            </div>
            <div class="col-md-7">
               <h6>£{{$data['price']}}</h6>
            </div>
            <div class="col-md-5">
               <p>Service fee</p>
            </div>
            <div class="col-md-7">
               <h6>£{{$data['s_price']}}</h6>
            </div>
            <div class="col-md-5">
               <p class="totalprice">Total</p>
            </div>
            <div class="col-md-7">
               <h6 class="totalprice">£{{$data['t_price']}}</h6>
            </div>
         </div>

@if(!is_null($data['promo_name']))
         <div class="row perstlrow no-gutters secmain">
          <div class="col-md-12 p-0">
            <h3 class="cardeltitle"><b>Promo Code</b></h3>
         </div>
          <div class="col-md-5">
             <p>Promocode Name</p>
          </div>
          <div class="col-md-7">
             <h6>{{$data['promo_name']}}</h6>
          </div>
          <div class="col-md-5">
             <p>Discount</p>
          </div>
          <div class="col-md-7">
             <h6>{{$data['promo_discount']}}%</h6>
          </div>
          <div class="col-md-5">
             <p>You Saved</p>
          </div>
          <div class="col-md-7">
             <h6>-@php
                               $foo = $data['t_price']*$data['promo_discount']/100;
                               $saved = number_format((float)$foo, 2, '.', '');
                              @endphp
                            £{{$saved}}</h6>
          </div>
          <div class="col-md-5">
             <p class="totalprice">Grand Total</p>
          </div>
          <div class="col-md-7">
             <h6 class="totalprice">£{{$data['t_price']-$saved}}</h6>
          </div>
          </div>
@endif          






          <div class="row btngroup no-gutters">
            <div class="col-md-6">
            
                 <button type="button" class="btnapplypromo" data-toggle="modal" data-target="#promoModal">Apply Promo</button>
               </p><br>
               <p style="float: left">@if($data['promo_status'] == 0)
                   <span style="color:red">Invalid Promo Code</span>
                 @endif
               </p>
            </div>
            @if(!is_null($data['promo_name']))
            <div class="col-md-6">
              <p><a class="btnremovepromo" href="#">Remove Promo</a></p>
              <p><a href="{{route('summary')}}"><button type="button" class="btnremovepromo rm_promo">Remove Promo</button></a></p>
            </div>
            @endif
          </div>
          <a href="{{route('confirm-booking')}}"><button class="btn btnownstyle mt-4 mx-w300 btnbook">Book</button></a>
        </div>
       </div>

          </div>
      </section>
    </main> -->
          <!-- Modal -->
<div class="modal fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

<div class="modal-content">
       <div class="modal-header padcustom">
         <h5 class="modal-title" id="exampleModalLabel">Enter Your Promo Code</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
          <form method="post" action="{{route('summary')}}">
          @csrf
          <div class="col-md-12">
                          <div class="form-group">
                             <input type="text" name="apply_promo" id="apply_promo" class="form-control form-control-custom"
              placeholder="Enter Promo Code" required="" />
                           </div>
          </div>
          <div class="row">
            <div class="col-md-12">
               <input type="submit" class="btn btnownstyle mx-w300 btnbook" name="Apply" value="Apply">
            </div>
            </div>
           </form>

          </div>
        </div>
       </div>
     </div>

<!--     <div class="modal-content">
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
    </div> -->



  </div>
</div>
@if(Auth::check())
<script type="text/javascript">
  /*alert("login");*/
</script>
@else
<script type="text/javascript">
  $(document).ready(function(){
   localStorage.removeItem('licence_plate');
   localStorage.removeItem('car_values');
   localStorage.removeItem('type');
   localStorage.removeItem('deal_id');
   localStorage.removeItem('date');
   localStorage.removeItem('time');
   localStorage.removeItem('step1');
   localStorage.removeItem('step2');
   localStorage.removeItem('step3');
});
</script>
@endif



@endsection