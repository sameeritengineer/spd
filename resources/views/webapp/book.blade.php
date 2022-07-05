@extends('layouts.app')

@section('content')

   <main>
      <section class="selectcartype-section">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <h2 class="pagetitlemain ct-deals-inner">Select Your Package</h2>
                <h2 class="pagetitlemain ct-work_time">Select Date And Time</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cartypecontainer-section">
         <div class="container">
            <div class="row mt-3 mb-3">
               <div class="col-md-12">
                <a class="serviceincbtn pnone bk_deals" href="#"><span>Back</span></a>
                <a class="serviceincbtn pnone bk_worktime" href="#"><span>Back</span></a>
               </div>
               <div class="car_option">
                <a href="{{route('add-car')}}"><button type="button" class="btn btnownstyle mt-4 mx-w300">Add Car</button></a>
                <a href="{{route('change-car')}}"><button type="button" class="btn btnownstyle mt-4 mx-w300">Change Car</button></a>
              </div>
            </div> 
            <form id="mainFormInner" class="innerbook">
            <input type="hidden" id="formvaluedata" name="formvaluedata" value="1">
            <input type="hidden" id="book_date" name="book_date" value="">
            <div class="stepthreecontainer car_deals">
               <div class="row daystatusbox servicesselect">
                @foreach($deals as $deal) 
                  <div class="col-md-6">
                     <div class="radiobox"><input type="radio" id="<?php echo $deal->id; ?>" class="deal_id" name="dealtype" value="<?php echo $deal->id; ?>">
                        <label for="<?php echo $deal->id; ?>">
                           <div class="selectservicetype"> 
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="bannerimgmain-box">
                                  @if(!is_null($deal->image)) <img class="serimg w-100" src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal->image; ?>"> @endif
                                </div>
                              </div>
                              <div class="col-md-8 text-left service-right">
                                 <h3>{{$deal->name}}</h3>
                                 <h6><span>@if($deal->hour>0){{$deal->hour}}@endif @if($deal->hour==1)hour @elseif($deal->hour>1)hours @endif</span><span> @if($deal->minute>0){{$deal->minute}} minutes @endif</span></h6>
                                 <p>{{$deal->description}}</p>
                                 @php 
                                  $discount = $deal->price*20/100;
                                  $new_discount_price = $deal->price-$discount;
                                 @endphp
                                 @if($user_booking_count == 4)
                                 <h4>£{{$deal->price}}</h4>
                                 <h4><s>£{{number_format((float)$new_discount_price, 2, '.', '')}}</s></h4>
                                 @else
                                 <h4>£{{$deal->price}}</h4>
                                 @endif
                                 <a class="serviceincbtn btn btn-primary Si-deal" data-title="{{$deal->name}}"  data-did="{{$deal->id}}" data-toggle="modal" data-target="#exampleModal">Service Includes</a>
                              </div>
                           </div>
                           </div>
                        </label>
                      </div>
                  </div>
                @endforeach  

               </div>
            </div>
            <div class="stepfourcontainer work_time">
            <div class="row">
              <div class="col-md-6"><div id="datepicker"></div></div>
              <div class="col-md-6">
                  <div class="selector selector_worktime">
                      <!-- <div class="selecotr-item">
                          <input type="radio" id="radio1" name="selector" class="selector-item_radio">
                          <label for="radio1" class="selector-item_label">9 AM</label>
                      </div>-->
                  </div>
              </div>
              </div>
              <div class="inner_selection_cartype">
              <p class="worktime_error"></p>
              </div>
             </div>
               <div class="row">
               <div class="col-md-12">
                <div class="inner_selection_cartype">     
                 <input type="hidden" id="value_car" name="value_car" value="">
                 <input type="hidden" id="licence_plate" name="licence_plate" value="">
                 <p class="cartype_error" style="text-align: center;"></p>
                 </div>
                  <button class="btn btnownstyle mt-4 mx-w300" type="button" id="next-2">Next</button>
                  <button type="submit" class="button button-contactForm boxed-btn main_submitform mainFormInnerSubmit">Send</button>
               </div>
               </div>
             </form>
            </div>
            </div>
         </section>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header padcustom">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       </div>
     </div>
   </div>
 </div>         
    </main>


@endsection
