@extends('layouts.app')

@section('content')
   <section class="section_cartype">
     <div class="container">
      <div class="row">
        <div class="col-12">
           <h2 class="contact-title">Summary</h2>
         </div>
         <div class="col-lg-6 car_information">
         <h3 class="title-profile-order bgcolor5">Car Information</h3>
         <p class="addressp"><strong>Licence Plate : </strong> <span>{{$get_cardata->licence_plate}}</span></p>
         <p class="addressp"><strong>Make : </strong> <span>{{$get_cardata->make}}</span></p>
         <p class="addressp"><strong>Model : </strong> <span>{{$get_cardata->model}}</span></p>
         <p class="addressp"><strong>Year : </strong> <span>{{$get_cardata->year}}</span></p>  
         <p class="addressp"><strong>Car Type: </strong> <span><?php
          $cartype = App\Cartype::where('id',$get_cardata->cartype)->first();
          echo $cartype->name;
          ?></span></p>                                        
         </div>
         <div class="col-lg-6 car_information">
         <h3 class="title-profile-order bgcolor5">Address</h3>
         <p><i class="bi bi-pencil-square"></i></p>
         <p class="addressp"><strong>Address Line 1 : </strong> <span>{{$get_address->address}}</span></p>
         <p class="addressp"><strong>Address Line 2 : </strong> <span>{{$get_address->address_line}}</span></p>
         <p class="addressp"><strong>Town/City : </strong> <span>{{$get_address->city}}</span></p>
         <p class="addressp"><strong>Postcode : </strong> <span>{{$get_address->postcode}}</span></p>                                         
         </div>
         <div class="col-lg-12 car_information">
                           <div class="profile-container">
                              <h3 class="title-profile-order bgcolor5">Booking Information</h3>
                              <p class="addressp"><strong>Wash Type : </strong> <span>Entry Valet</span></p>
                              <p class="addressp"><strong>Date & Time : </strong> <span>Sunady 22 May, 10 AM</span></p>
                              <p class="addressp"><strong>Washprice : </strong> <span> £36.99</span></p>
                              <p class="addressp"><strong>Service fee : </strong> <span> £2.99</span></p>
                              <p class="addressp"><strong>Total : </strong> <span> £44.00</span></p>
                           </div>
                                                
                                                </div>  
       </div>  
     </div>
   </section>
@endsection