@extends('layouts.app')

@section('content')
<main>
       <section class="section_cartype">
            <div class="container">
              <div>
                <a class="back_page bk_postcode" href="{{route('getpostcode')}}"><span>Back</span></a>
                <a class="back_page bk_cars" href="#"><span>Back</span></a>
                <a class="back_page bk_deals" href="#"><span>Back</span></a>
                <a class="back_page bk_worktime" href="#"><span>Back</span></a>
              </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title ct-cars">Select Your Type Of Car</h2>
                        <h2 class="contact-title ct-deals">Select Your Package</h2>
                        <h2 class="contact-title ct-work_time">Select Date And Time</h2>
                        <h2 class="contact-title ct-register">Create Account</h2>
                    </div>
                    <div class="col-lg-8">
                <form id="mainForm">
                       <div class="row car_types">
                @foreach($cartypes as $cartype)
                <div class="card col-md-2">
                  <div class="car_t_center">
                    @if(!is_null($cartype->image))<img class="sd_cartype" src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $cartype->image; ?>" alt=""> @endif
  
                    <div class="card-body">
                        <h3 class="card-title">{{$cartype->name}}</h3>
                        <input type="radio" id="cartype_id" name="cartype" value="<?php echo $cartype->id; ?>">
                    </div>
                  </div>
                </div>
                @endforeach
           <div class="inner_selection_cartype">     
           <input type="hidden" id="value_car" name="value_car" value="">
           <input type="hidden" id="licence_plate" name="licence_plate" value="">
           <p class="cartype_error"></p>
           <button type="button" id="next-1">Next</button>
           </div>
            </div>
            <div class="row car_deals">
              <div id="basic" class="tab-pane fade show active">
@foreach($deals as $deal) 
<div class="box shadow-sm mb-3 rounded bg-white ads-box">
<div class="p-3 border-bottom">
<h2 class="font-weight-bold ">{{$deal->name}}
<input type="radio" class="deal_id" name="dealtype" value="<?php echo $deal->id; ?>">
</h2>
<div class="thecontent">
<div class="image">
   @if(!is_null($deal->image)) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal->image; ?>" style="width:100px;height:100px"> @endif
</div>
<div class="body">
  <p class="mb-0 text-muted">{{$deal->description}}</p>
  <p><span>@if($deal->hour>0){{$deal->hour}}@endif @if($deal->hour==1)hour @elseif($deal->hour>1)hours @endif</span><span> @if($deal->minute>0){{$deal->minute}} minutes @endif</span>
  </p>
  <button type="button" class="btn btn-primary Si-deal" data-title="{{$deal->name}}"  data-did="{{$deal->id}}" data-toggle="modal" data-target="#exampleModal">
  Service Includes
  </button>
</div>
</div>
</div>
<div class="p-2">
£{{$deal->price}}
</div>
</div>
@endforeach

</div>
            </div>
<div class="row work_time">
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
<button type="button" id="next-2">Next</button>
</div>
</div>
<div class="row register_customer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-contact contact_form">
                          <p class="mainform_error"></p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control form-control-lg"
              placeholder="Enter Your Full Name" required="" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="email" name="email" id="email" class="form-control form-control-lg"
              placeholder="Enter Email Address" required="" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="tel" name="mobile" pattern="^\d{11}$" class="form-control form-control-lg"
              placeholder="Enter 11 digit mobile number" required >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <input type="password" name="password" class="form-control form-control-lg"
              placeholder="Enter Your Password" required >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="address" id="addess1" class="form-control form-control-lg"
              placeholder="Enter Address Line 1" required="" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="address_line" id="address2" class="form-control form-control-lg"
              placeholder="Enter Address Line 2" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" class="form-control form-control-lg"
              placeholder="Enter City/Town" required="" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="postcode" id="postcode" class="form-control form-control-lg"
              placeholder="Enter Postcode" value="<?php echo $postcode; ?>" required="" />
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>  
      
          
<div class="row">
                                <button type="submit" class="button button-contactForm boxed-btn main_submitform">Send</button>
                            </div>
          </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="form-outline mb-4 license_form_data">
            <h2>Enter License Plate</h2>
            <br>
            <form id="getplateForm">
            <input type="text" name="licence_plate" id="getplateInput" class="form-control form-control-lg"
              placeholder="Enter Your License Plate" required="" />
             <p class="licence_error"></p>
              <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" id="getplate" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Search</button>
            </form>
          </div>
          </div>
          <div class="response_data"></div> 
                    </div>
                </div>
            </div>
        </section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</main>

@endsection

