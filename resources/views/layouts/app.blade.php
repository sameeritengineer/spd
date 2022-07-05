<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
      <link rel="icon" href="{{ asset('final_myassets/images/moblogo.png') }}" type="image/png" sizes="16x16">
      <link href="{{ asset('final_myassets/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@0,900;1,700;1,900&family=Poppins:wght@200;400;500;600;700;800;900&display=swap" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="{{ asset('final_myassets/css/owl.carousel.min.css') }}" rel="stylesheet">
      <link href="{{ asset('final_myassets/css/owl.carousel.css') }}" rel="stylesheet">
      <link href="{{ asset('final_myassets/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('final_myassets/css/custom.css') }}" rel="stylesheet">
      <link href="{{ asset('final_myassets/css/responsive.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
      <script src="https://js.stripe.com/v3/"></script>
      <script src="{{ asset('final_myassets/js/index.js') }}"  data-rel-js></script>
      <!-- <link rel="stylesheet" type="text/css" href="{{ asset('final_myassets/css/base.css') }}" data-rel-css="" /> -->
      <link rel="stylesheet" type="text/css" href="{{ asset('final_myassets/css/example1.css') }}" data-rel-css="" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
        <header>
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
         <nav class="navbar navbar-expand-lg navbar-light navbarcustom">
            <!-- <a class="navbar-brand" href="#"> <img class="headerlogo" src="{{ asset('myassets/images/logo.png') }}" alt="image"></a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><img src="images/imge.png"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item ">
                     <a class="nav-link {{ (request()->routeIs('myhome')) ? 'active' : '' }}" href="{{route('myhome')}}">Home</a>
                  </li>
                  @auth
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('book')) ? 'active' : '' }}" href="{{route('book')}}">Book Now</a>
                  </li>
                  @else
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('getpostcode')) ? 'active' : '' }}" href="{{route('getpostcode')}}">Book Now</a>
                  </li>
                 @endauth
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('aboutus')) ? 'active' : '' }}" href="{{route('aboutus')}}">About</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="#">Alloy Wheel</a>
                       <a class="dropdown-item" href="#">Carwash</a>
                     </div>
                   </li>
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('contact')) ? 'active' : '' }}" href="{{route('contact')}}">Contact</a>
                  </li>
                  @auth
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('loyalty')) ? 'active' : '' }}" href="{{route('loyalty')}}">Loyalty</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('home')) ? 'active' : '' }}" href="{{route('home')}}">Settings</a>
                  </li>
                  @endauth
               </ul>
            </div>
          </nav>
         </div>
      </div>
      </div>
      </header>
<div class="container">
  <div id="overlay">
      <div class="loader"></div>
  </div>
</div>      
<!--       <header>
         <nav class="navbar navbar-expand-lg navbar-light navbarcustom">
            <a class="navbar-brand" href="#"> <img class="headerlogo" src="{{ asset('myassets/images/logo.png') }}" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><img src="{{ asset('myassets/images/imge.png') }}"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav m-auto">
                  <li class="nav-item ">
                     <a class="nav-link {{ (request()->routeIs('myhome')) ? 'active' : '' }}" href="{{route('myhome')}}">Home</a>
                  </li>
                  @auth
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('book')) ? 'active' : '' }}" href="{{route('book')}}">Book</a>
                  </li>
                  </li>
                  @else
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('getpostcode')) ? 'active' : '' }}" href="{{route('getpostcode')}}">Book</a>
                  </li>
                 @endauth
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="#">Alloy Wheel</a>
                       <a class="dropdown-item" href="{{route('services')}}">Carwash</a>
                     </div>
                   </li>
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('aboutus')) ? 'active' : '' }}" href="{{route('aboutus')}}">About us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('contact')) ? 'active' : '' }}" href="{{route('contact')}}">Contact us</a>
                  </li>
                  @auth<li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('home')) ? 'active' : '' }}" href="{{route('home')}}">Settings</a>@endauth
                  </li>
               </ul>
            </div>
         </nav>
      </header>   -->  

        <main>
            @yield('content')
        </main>

      <section class="footer">
         <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="footerlogo">
                  <!-- <a href="#"><img class="footerlogoimg" src="{{ asset('myassets/images/logo.png') }}" alt="image"></a> -->
               </div>
               <p class="allrights">©2022  splashanddrip. All Rights Reserved</p>
            </div>
            <div class="col-md-4 footercol">
               <h3>Pages</h3>
               <ul>
                  <li class=""><a href="{{route('myhome')}}">Home</a></li>
                  <li class=""><a href="{{route('aboutus')}}">About</a></li>
                  <li class=""><a href="#">Services</a></li>
                  <li class=""><a href="{{route('contact')}}">Contact</a></li>
                  @auth
                  <li class=""><a href="{{route('book')}}">Book Now</a></li>
                  @else
                  <li class=""><a href="{{route('getpostcode')}}">Book Now</a></li>
                 @endauth
               </ul>
            </div>
            <div class="col-md-4 footercol">
               <h4><a href="#">07985125953</a></h4>
               <h5>splashanddrip@gmail.com</h5>
               <address>2972 Westheimer Rd. Santa Ana, Illinois 85486 </address>
               <h6 class="follow">Follow Us:</h5>
               <ul class="socils-icons">
                  <li class=""><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> 
                  <li class=""><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li class=""><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
               </ul>
            </div>
         </div>
      </section>

<!-- JS here -->
<script src="{{ asset('final_myassets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('final_myassets/js/example1.js') }}"></script>
     <script src="{{ asset('final_myassets/js/owl.carousel.js') }}"></script>
      <script src="{{ asset('final_myassets/js/owl.carousel.min.js') }}"></script>
      <script>
         $('#app-showcase').owlCarousel({
                 loop: true,
                 autoplay: 5000,
                   smartSpeed: 3000, // duration of change of 1 slide;
                 nav: true,
                 navigation: true,
                 responsiveClass: true,
                 responsive: {
                     0: {
                         items: 1,
                         nav: true
                     },
                     600: {
                         items: 1,
                         nav: false
                     },
                     1000: {
                         items: 1,
                         nav: true
                     },
                     1400: {
                         items: 1,
                         nav: true
                     }
                 }
             })
         </script>
         <script>
            $('#service-wash').owlCarousel({
                    loop: true,
                    margin:20,
                    autoplay: 5000,
                   smartSpeed: 3000, // duration of change of 1 slide;
                    nav: true,
                    navigation: true,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        600: {
                            items: 1,
                            nav: false
                        },
                        1000: {
                            items: 3,
                            nav: true
                        },
                        1400: {
                            items: 3,
                            nav: true
                        }
                    }
                })
            </script>
            <script>
               $('#testmonial-slider').owlCarousel({
                       loop: true,
                       margin:20,
                       autoplay: 5000,
                   smartSpeed: 3000, // duration of change of 1 slide;
                       nav: true,
                       navigation: true,
                       responsiveClass: true,
                       responsive: {
                           0: {
                               items: 1,
                               nav: true
                           },
                           600: {
                               items: 1,
                               nav: false
                           },
                           1000: {
                               items: 2,
                               nav: true
                           },
                           1400: {
                               items: 2,
                               nav: true
                           }
                       }
                   })
               </script>
<!-- JS here -->
<!-- <script type="text/javascript">window.setTimeout("document.getElementById('successMessage').style.display='none';", 5000); </script> -->
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
jQuery('.del_car').on('click', function (e) {
   var carid = $(this).attr('data-carid');
   $('#del_car').val(carid);
  });
jQuery('#editProfileForm').on('submit', function (e) {

  if (document.getElementById("editProfileForm").checkValidity()) {
     e.preventDefault();
     var token = $('meta[name="csrf-token"]').attr('content');
     var form = $("#editProfileForm");
     var formData = new FormData(this);
      $.ajax({
             _token: token,
             url: "{{ route('edit_profile') }}",
             type: "POST",
             data: formData,
             processData: false,
             contentType: false,
                     success: function(response) {
                       console.log(response);
                       if(response.status == false){
                       $('.mainform_error').text(response.message);
                       }else{
                        window.location.href = "{{ route('my-account')}}";
                       }
                     },
                  });
    }
    return true;

});
jQuery('#mainFormInner').on('submit', function (e) {
     e.preventDefault();
     var token = $('meta[name="csrf-token"]').attr('content');
     var form = $("#mainFormInner");
     
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
jQuery('#mainForm').on('submit', function (e) {
    if (document.getElementById("getplateForm").checkValidity()) {
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
    }
    return true;
});
$(document).on('click','.cartype_radiobox',function(){
  var cartype_id = $(this).find('#cartype_id').val();
  console.log(cartype_id);
  //$(this).find('#cartype_id').prop("checked", true);
});

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
                        }
                      
                     },
                  });
        
    }
    return true;
});
</script>
<script type="text/javascript">
  $(document).on('click','#add_car',function(){
    if($('input[name=cartype]:checked').length > 0) {
     $('.cartype_error').text('');
     var value = $('#getplateInput').val();
     var cartype = $('input[name=cartype]:checked').val();
     if(value == ''){
        $('.licence_error').text('Please Seacrh your license Plate');
        scrollToElement('.selectcartype-section', 1000, -150);
     }else if(carval == ''){
        $('.licence_error').text('License Plate not Valid');
        scrollToElement('.selectcartype-section', 1000, -150);
     }else{
        var carval = $('#value_car').val();
        var carvalues = JSON.parse(carval);
        var token = $('meta[name="csrf-token"]').attr('content');
       $.ajax({
                     _token: token,
                     url: "{{ route('add_newcar') }}",
                     type: "POST",
                     data: {
                         "cartype": cartype,
                         "licence_plate": value,
                         "make": carvalues.make,
                         "model": carvalues.model,
                         "year": carvalues.yearOfManufacture,
                             },
                             success: function(response) {
                              if(response.status == false){
                                $('.cartype_error').html(response.message);
                                }else{
                                    $('.cartype_success').html(response.message);
                                    setTimeout(function () {
                                     window.location.href = "{{ route('book')}}";
                                 }, 2500);
                                    
                                }
                             },
                          });
     }
    }else{
      $('.cartype_error').text('Please Select Your Cartype');
    }
  });
  /**  scroll to element function **/
function scrollToElement(selector, time, verticalOffset) {
    time = typeof (time) != 'undefined' ? time : 500;
    verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = $(selector);
    offset = element.offset();
    offsetTop = offset.top + verticalOffset;
    $('html, body').animate({
        scrollTop: offsetTop
    }, time);
}
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
        $('.steptwocontainer.car_types').hide();
        $('.stepthreecontainer.car_deals').show();
        $('h2.pagetitlemain.ct-cars').hide();
        $('h2.pagetitlemain.ct-deals').show();
        $('.license_form_data').hide();
        $('.bk_postcode').hide();
        $('.bk_cars').show();
        $('.input-groupmainlpn').hide();
        $('.response_data').hide();
        $('#next-1').hide();
        scrollToElement('.selectcartype-section', 1000, -150);

     }
    }else{
      $('.cartype_error').text('Please Select Your Cartype');
    }
  });
  $(document).on('click','.bk_cars',function(){
     $('.bk_postcode').show();
     $('.bk_cars').hide();
     $('.steptwocontainer.car_types').show();
     $('.stepthreecontainer.car_deals').hide();
     $('h2.pagetitlemain.ct-cars').show();
     $('h2.pagetitlemain.ct-deals').hide();
     $('.license_form_data').show();
     $('.input-groupmainlpn').show();
     $('.response_data').show();
     $('#next-1').show();
  });
  $(document).on('click','.deal_id',function(){
   scrollToElement('.selectcartype-section', 1000, -150); 
   var id = $(this).val();
   $('.bk_cars').hide();
   $('h2.pagetitlemain.ct-deals').hide();
   $('.stepthreecontainer.car_deals').hide();
   $('.bk_deals').show();
   $(".stepfourcontainer.work_time").show();
   //$('.row.work_time').show();
   $('h2.pagetitlemain.ct-work_time').show();
   $('.car_option').hide();
   $('h2.pagetitlemain.ct-deals-inner').hide();
   $('#next-2').show();

   var date = $.datepicker.formatDate('yy-mm-dd', new Date());
   $('#book_date').val(date);
    var token = $('meta[name="csrf-token"]').attr('content');
   $.ajax({
                     _token: token,
                     url: "{{ route('workingday_time') }}",
                     type: "POST",
                     data: {
                         "date": date,
                             },
                             success: function(response) {
                              if(response.status == true){
                                $('.selector_worktime').html(response.payload);
                            }else{
                                $('.selector_worktime').html(response.message);
                            }
                             },
                          });


  });
  $(document).on('click','.bk_deals',function(){
     $('.stepthreecontainer.car_deals').show();
     $('h2.pagetitlemain.ct-deals').show();
     $('.bk_cars').show();
     $('.bk_deals').hide();
     $('.deal_id').prop('checked', false);
     $('h2.pagetitlemain.ct-work_time').hide();
     $('.stepfourcontainer.work_time').hide();
     $('.car_option').show();
     $('h2.pagetitlemain.ct-deals-inner').show();
     $('#next-2').hide();
  });
  $(document).on('click','.Si-deal',function(){
   var deal_id = $(this).attr('data-did');
   var deal_name = $(this).attr('data-title');
   $('#exampleModalLabel').text(deal_name);
   var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
             _token: token,
             url: "{{ route('dealservices') }}",
             type: "POST",
             data: {
                 "deal_id": deal_id,
                     },
                     success: function(response) {
                      $('.modal-body').html(response);
                     },
                  });
  });
 $(document).on('click','#next-2',function(){
    scrollToElement('.selectcartype-section', 1000, -150);
    if($('input[name=selector]:checked').length > 0) {
     $('.worktime_error').text('');
     $('.stepfourcontainer.work_time').hide();
     $('.stepcreateaccount').show();
     $('.bk_deals').hide();
     $('.bk_worktime').show();
     $('h2.pagetitlemain.ct-work_time').hide();
     $('h2.pagetitlemain.ct-register').show();
     $('.main_submitform').show();
     $('.mainFormInnerSubmit').click();
     $('#next-2').hide();
     $('#next-3').show();
  }else{
      $('.worktime_error').text('Please Select Date and Time Slot');
    }

 });
 $(document).on('click','.bk_worktime',function(){
   $('h2.pagetitlemain.ct-register').hide();
   $('.stepcreateaccount').hide();
   $('h2.pagetitlemain.ct-work_time').show();
   $('.bk_worktime').hide();
   $('.bk_deals').show();
   $('.stepfourcontainer.work_time').show();
   $('#next-2').show();
   $('#next-3').hide();
 });
  
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker(
            { 
                minDate: new Date(),
                dateFormat: 'yy-mm-dd',
                 onSelect: function() {
                    var date = this.value;
                    $('#book_date').val(date);
                    var token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                     _token: token,
                     url: "{{ route('workingday_time') }}",
                     type: "POST",
                     data: {
                         "date": date,
                             },
                             success: function(response) {
                                //console.log(response.payload[1]['start']);
                              //console.log(response.payload);
                              if(response.status == true){
                                $('.selector_worktime').html(response.payload);
                            }else{
                                $('.selector_worktime').html(response.message);
                            }
                              
                             },
                          });
                    }

            });
    } );
    </script>
</body>
</html>
