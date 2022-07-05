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
      <section class="cartypecontainer-section">
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
               <p><!-- <a class="btnapplypromo"  href="#">Apply Promo</a> -->
                 <button type="button" class="btnapplypromo" data-toggle="modal" data-target="#promoModal">Apply Promo</button>
               </p><br>
               <p style="float: left">@if($data['promo_status'] == 0)
                   <span style="color:red">Invalid Promo Code</span>
                 @endif
               </p>
            </div>
            @if(!is_null($data['promo_name']))
            <div class="col-md-6">
<!--               <p><a class="btnremovepromo" href="#">Remove Promo</a></p> -->
              <p><a href="{{route('summary')}}"><button type="button" class="btnremovepromo rm_promo">Remove Promo</button></a></p>
            </div>
            @endif
          </div>
          <a href="{{route('confirm-booking')}}"><button class="btn btnownstyle mt-4 mx-w300 btnbook">Book</button></a>
        </div>
       </div>

          </div>
      </section>
    </main>
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




@endsection