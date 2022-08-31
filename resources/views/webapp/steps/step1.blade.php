@extends('layouts.app')

@section('content')
 <main>
      <section class="selectcartype-section">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Step 1</h2></div>
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
            <!-- <div class="row mt-3 mb-3">
               <div class="col-md-12">
                <a class="serviceincbtn pnone bk_postcode" href="{{route('getpostcode')}}"><span>Back</span></a>
                <a class="serviceincbtn pnone bk_cars" href="#"><span>Back</span></a>
                <a class="serviceincbtn pnone bk_deals" href="#"><span>Back</span></a>
                <a class="serviceincbtn pnone bk_worktime" href="#"><span>Back</span></a>
               </div>
            </div> --> 
            <div class="row mt-3"><div class="col-md-12"><h3 class="cardeltitle"><b>Step 2</b></h3></div></div>
            <form id="mainForm">
            <div class="steptwocontainer">
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
                           @if($cartype->id == 1)
                           <span>smart car, Toyota yaris</span>
                           @elseif($cartype->id == 2)
                           <span>Mercedes class, Audi A3, bmw 3 series</span>
                           @elseif($cartype->id == 3)
                           <span>Mercedes s class, Audi A7, bmw 7 series</span>
                           @elseif($cartype->id == 4)
                           <span>vans</span>
                           @else
                           <span></span>
                           @endif

                          </div>
                        </label>
                      </div>
                  </div>
                  @endforeach
               </div>
            </div>
            <input type="hidden" id="formvaluedata" name="formvaluedata" value="0">
            <input type="hidden" id="book_date" name="book_date" value="">

               <div class="row">
               <div class="col-md-12">
                <div class="inner_selection_cartype">     
                 <input type="hidden" id="value_car" name="value_car" value="">
                 <input type="hidden" id="licence_plate" name="licence_plate" value="">
                 <p class="cartype_error" style="text-align: center;"></p>
                 </div>
                  <button class="btn btnownstyle mt-4 mx-w300" type="button" id="next-1">Next</button>
               </div>
               </div>
             </form>
            </div>
            </div>
         </section>        
    </main>
  <script>
  	// search Plate
  	jQuery('#getplateForm').on('submit', function (e) {
    $('.licence_error').text('');
    $("#overlay").show();
    if (document.getElementById("getplateForm").checkValidity()) {
        e.preventDefault();
        var token = $('meta[name="csrf-token"]').attr('content');
            var value = $('#getplateInput').val();
            $('#licence_plate').val(value);

            $.ajax({
             _token: token,
             url: "{{ route('getlicense') }}",
             type: "POST",
             data: {
                 "value": value,
                     },
                     success: function(response) {
                        if(response.error == 0){
                         $(".licence_error").html('License Plate not Found');
                         $(".response_data").html("");
                         $("#overlay").hide();
                        }else if(response.error == 1){
                         $(".licence_error").html('License Plate not Valid');
                         $(".response_data").html("");
                         $("#overlay").hide();
                        }else{
                          $("#overlay").hide();
                          $("#value_car").val(JSON.stringify(response));
                          /*var table = "<table><tr><th>Make</th><th>Model</th><th>Year</th></tr><tr><td>"+response.make+"</td><td>"+response.model+"</td><td>"+response.yearOfManufacture+"</td></tr></table>";*/
                          var table = '<div class="cardetailmainwrapper mt-3"><div class="row"><div class="col-md-12"><h3 class="cardeltitle"><b>Car Detail</b></h3></div></div><div class="row no-gutters cardetailbox"><div class="col-md-4"><h4>Make</h4></div><div class="col-md-4"><h4>Model</h4></div><div class="col-md-4"><h4>Year</h4></div><div class="col-md-4"><p>'+response.make+'</p></div><div class="col-md-4"><p>'+response.model+'</p></div><div class="col-md-4"><p>'+response.yearOfManufacture+'</p></div></div></div>';
                            $(".response_data").html(table);
                            $(".response_data").show();
                        }
                      
                     },
                  });
        
    }
    return true;
});

//Step 1

  	$(document).on('click','#next-1',function(){
    if($('input[name=cartype]:checked').length > 0) {
     $('.cartype_error').text('');
     var value = $('#getplateInput').val();
     var carval = $('#value_car').val();
     if(value == ''){
        $('.licence_error').text('Please Seacrh your license Plate');
        scrollToElement('.selectcartype-section', 1000, -150);
     }else if(carval == ''){
        $('.licence_error').text('License Plate not Valid');
        scrollToElement('.selectcartype-section', 1000, -150);
     }else{
        $('.licence_error').text('');
        //$('.response_data').hide();
        var type = $('input[name=cartype]:checked').val();
        localStorage.setItem("licence_plate", value);
        localStorage.setItem("car_values", carval);
        localStorage.setItem("type", type);
        if(localStorage.getItem("licence_plate")!='' && localStorage.getItem("car_values")!='' && localStorage.getItem("type")!=''){
          localStorage.setItem("step1", "completed");
        }
        window.location.href = "{{ route('get-deals')}}";
     }
    }else{
      $('.cartype_error').text('Please Select Your Cartype');
    }
  });
$(document).ready(function(){
  var licence_plate = localStorage.getItem("licence_plate");
  var type = localStorage.getItem("type");
  var response = JSON.parse(localStorage.getItem("car_values"));
  //var response = JSON.stringify(car_values);
  //alert(response);
  if(licence_plate != '' && response!= ''){
    $('#getplateInput').val(licence_plate);
    $('#value_car').val(localStorage.getItem("car_values"));
    $("#car_"+type).attr('checked','checked');
    var table = '<div class="cardetailmainwrapper mt-3"><div class="row"><div class="col-md-12"><h3 class="cardeltitle"><b>Car Detail</b></h3></div></div><div class="row no-gutters cardetailbox"><div class="col-md-4"><h4>Make</h4></div><div class="col-md-4"><h4>Model</h4></div><div class="col-md-4"><h4>Year</h4></div><div class="col-md-4"><p>'+response.make+'</p></div><div class="col-md-4"><p>'+response.model+'</p></div><div class="col-md-4"><p>'+response.yearOfManufacture+'</p></div></div></div>';
      $(".response_data").html(table);
      $(".response_data").show();
  }

});
  </script>
@endsection

