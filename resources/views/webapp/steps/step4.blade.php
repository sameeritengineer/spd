@extends('layouts.app')

@section('content')
 <main>
      <section class="selectcartype-section">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Create Account</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cartypecontainer-section">
         <div class="container">
          <div class="stepcreateaccount">
          	 <form id="mainForm" autocomplete="off">
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
                                 <input autocomplete="false" type="email" name="email" id="email" class="form-control form-control-custom" placeholder="Enter email" required="" />
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
                                 <input autocomplete="new-password" type="password" name="password" class="form-control form-control-custom" placeholder="Enter Password" required>
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
               <div class="row">
               <div class="col-md-12">
               	  <input type="hidden" id="formvaluedata" name="formvaluedata" value="0">
                  <input type="hidden" id="licence_plate" name="licence_plate" value="">
                  <input type="hidden" id="cartype" name="cartype" value="">
                  <input type="hidden" id="value_car" name="value_car" value="">
                  <input type="hidden" id="dealtype" name="dealtype" value="">
                  <input type="hidden" id="book_date" name="book_date" value="">
                  <input type="hidden" id="book_time" name="book_time" value="">
                  <button type="submit" class="btn btnownstyle mt-4 mx-w300 main_submitform">Submit</button>
               </div>
               </div>
                </form>
            </div>
         </div>
      </section>                 
</main>
<script type="text/javascript">
$('#mainForm').on('submit', function (e) {
     e.preventDefault();
     var token = $('meta[name="csrf-token"]').attr('content');
     var form = $("#mainForm");
     
      $.ajax({
             _token: token,
             url: "{{ route('main_form') }}",
             type: "POST",
             data: form.serialize(),
                     success: function(response) {
                       console.log(response);
                       if(response.status == false){
                       $('.mainform_error').text(response.message);
                       }else{
                        window.location.href = "{{ route('summary')}}";
                       }
                     },
                  });

});
$(document).ready(function(){
   var step1 = localStorage.getItem("step1");
   var step2 = localStorage.getItem("step2");
   var step3 = localStorage.getItem("step3");
   if(step1 == 'completed' && step2 == 'completed' && step3 == 'completed'){
      //window.location.href = "{{ route('create-account')}}";
      var licence_plate = localStorage.getItem("licence_plate");
      var car_values = localStorage.getItem("car_values");
      var type = localStorage.getItem("type");
      var dealtype = localStorage.getItem("deal_id");
      var date = localStorage.getItem("date");
      var time = localStorage.getItem("time");
      $("#licence_plate").val(licence_plate);
      $("#value_car").val(car_values);
      $("#cartype").val(type);
      $("#dealtype").val(dealtype);
      $("#book_date").val(date);
      $("#book_time").val(time);
    }else{
     window.location.href = "{{ route('get-time')}}";
    }
});
</script>
@endsection

