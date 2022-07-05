@extends('layouts.app')

@section('content')
 <main>
      <section class="selectcartype-section">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <h2 class="pagetitlemain ct-cars">Select Your Type Of Car</h2>
                <h2 class="pagetitlemain ct-deals">Select Your Package</h2>
                <h2 class="pagetitlemain ct-work_time">Select Date And Time</h2>
                <h2 class="pagetitlemain ct-register">Create Account</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cartypecontainer-section">
         <div class="container">
          <form id="getplateForm">
          <div class="steponecontainer">
                <div class="row">
                  <div class="col-md-12">
                     <div class="input-groupmainlpn">
                     <div class="input-group">
                        <input type="text" name="licence_plate" id="getplateInput" class="form-control"
              placeholder="Enter Your License Plate" required="" aria-describedby="button-addon2" />
                        <button type="submit" id="getplate" class="btn btn-outline-primary">Search</button>
                      </div>
                      <p class="licence_error"></p>
                     </div>
                  </div>
               </div>
               </div>
            </form>   
            <div class="response_data"></div>
            <div class="row mt-3 mb-3">
               <div class="col-md-12">
                <a class="serviceincbtn pnone bk_postcode" href="{{route('getpostcode')}}"><span>Back</span></a>
                <a class="serviceincbtn pnone bk_cars" href="#"><span>Back</span></a>
                <a class="serviceincbtn pnone bk_deals" href="#"><span>Back</span></a>
                <a class="serviceincbtn pnone bk_worktime" href="#"><span>Back</span></a>
               </div>
            </div> 
            <form id="mainForm">
            <div class="steptwocontainer car_types">
               <div class="row daystatusbox justify-content-center">
                @foreach($cartypes as $cartype)
                  <div class="col-md-4">
                     <div class="radiobox cartype_radiobox">
                      <input type="radio" id="car_<?php echo $cartype->id; ?>" name="cartype" value="<?php echo $cartype->id; ?>">
                        <label for="car_<?php echo $cartype->id; ?>">
                          <div class="selectcartype">
                           <div class="bannerimgmain-box">
                            <!-- @if(!is_null($cartype->image))<img class="sd_cartype footerlogoimg w-100" src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $cartype->image; ?>" alt="image"> @endif -->
                            @if($cartype->id == 1)
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img1.png') }}" alt="image">
                            @elseif($cartype->id == 2)
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img2.png') }}" alt="image">
                            @elseif($cartype->id == 3)
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img3.png') }}" alt="image">
                            @elseif($cartype->id == 4)
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img4.png') }}" alt="image">
                            @else
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img5.png') }}" alt="image">
                            @endif
                           </div>
                           <h4>{{$cartype->name}}</h4>
                          </div>
                        </label>
                      </div>
                  </div>
                  @endforeach
               </div>
            </div>
            <input type="hidden" id="formvaluedata" name="formvaluedata" value="0">
            <input type="hidden" id="book_date" name="book_date" value="">
            <div class="stepthreecontainer car_deals">
               <div class="row daystatusbox servicesselect">
                @foreach($deals as $deal) 
                  <div class="col-md-6">
                     <div class="radiobox"><input type="radio" id="deal_<?php echo $deal->id; ?>" class="deal_id" name="dealtype" value="<?php echo $deal->id; ?>">
                        <label for="deal_<?php echo $deal->id; ?>">
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
                                 <h4>£ {{$deal->price}}</h4>
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
              <div class="col-lg-6"><div id="datepicker"></div></div>
              <div class="col-lg-6">
                  <div class="selector selector_worktime">
                      <!-- <div class="selecotr-item">
                          <input type="radio" id="radio1" name="selector" class="selector-item_radio">
                          <label for="radio1" class="selector-item_label">9 AM</label>
                      </div>-->
                  </div>
              </div>
              <div class="inner_selection_cartype">
              <p class="worktime_error"></p>
              </div>
             </div>
            <div class="stepcreateaccount">
               <div class="row">
                  <div class="col-md-12">
                     <div class="signleft">
                        <div class="row">
                           <div class="col-md-12">
                              <h3 class="cardeltitle mt-4 mb-2"><b>Basic Info</b></h3>
                              <p class="mainform_error"></p>
                           </div>
                           
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="labelinputtext">Full Name</label>
                                 <input type="text" name="name" id="name" class="form-control form-control-custom" placeholder="Enter Full Name" required="">
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="labelinputtext">Email address</label>
                                 <input type="email" name="email" id="email" class="form-control form-control-custom" placeholder="Enter email" required="" />
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="labelinputtext">Mobile Number</label>
                                 <input type="tel" name="mobile" pattern="^\d{11}$" class="form-control form-control-custom" placeholder="Enter 11 digit mobile number" required>
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="labelinputtext">Password</label>
                                 <input type="password" name="password" class="form-control form-control-custom" placeholder="Enter Password" required>
                               </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="signright">
                        <div class="row">
                           <div class="col-md-12">
                              <h3 class="cardeltitle mt-3 mb-2"><b>Address</b></h3>
                           </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="labelinputtext">Address Line 1</label>
                              <input type="text" name="address" id="addess1" class="form-control form-control-custom" placeholder="Enter Address Line 1" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="labelinputtext">Address Line 2</label>
                              <input type="text" name="address_line" id="address2" class="form-control form-control-custom" placeholder="Enter Address Line 2">
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="labelinputtext">City/Town</label>
                              <input type="text" name="city" id="city" class="form-control form-control-custom" placeholder="Enter City/Town" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="labelinputtext">Post Code</label>
                              <input type="text" name="postcode" id="postcode" class="form-control form-control-custom" placeholder="Enter Postcode" value="<?php echo $postcode; ?>" required="">
                            </div>
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
               <div class="row">
               <div class="col-md-12">
                <div class="inner_selection_cartype">     
                 <input type="hidden" id="value_car" name="value_car" value="">
                 <input type="hidden" id="licence_plate" name="licence_plate" value="">
                 <p class="cartype_error" style="text-align: center;"></p>
                 </div>
                  <button class="btn btnownstyle mt-4 mx-w300" type="button" id="next-1">Next</button>
                  <button class="btn btnownstyle mt-4 mx-w300" type="button" id="next-2">Next</button>
                  <button type="submit" class="btn btnownstyle mt-4 mx-w300 main_submitform" id="next-3">Submit</button>
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

