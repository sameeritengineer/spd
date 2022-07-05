<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
      <link rel="icon" href="{{ asset('myassets/images/moblogo.png') }}" type="image/png" sizes="16x16">
      <link href="{{ asset('myassets/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('myassets/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&display=swap" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="{{ asset('myassets/css/owl.carousel.min.css') }}" rel="stylesheet">
      <link href="{{ asset('myassets/css/owl.carousel.css') }}" rel="stylesheet">
      <script src="https://js.stripe.com/v3/"></script>
      <script src="{{ asset('myassets/js/index.js') }}"></script>
      <link href="{{ asset('myassets/css/responsive.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('myassets/css/base.css') }}" data-rel-css="" />
      <link rel="stylesheet" type="text/css" href="{{ asset('myassets/css/example2.css') }}" data-rel-css="" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>
<body>
      <header>
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
                  
                  <!-- <li class="nav-item">
                     <a class="nav-link {{ (request()->routeIs('services')) ? 'active' : '' }}" href="{{route('services')}}">Services</a>
                  </li> -->
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
      </header>    

        <main>
            @yield('content')
        </main>

<section class="footer">
         <img class="aftertop" src="{{ asset('myassets/images/footerimg.png') }}" alt="image">
         <img class="screen1" src="{{ asset('myassets/images/mainimage.png') }}" alt="image">
         <img class="screen2" src="{{ asset('myassets/images/mainimage.png') }}" alt="image">
         <div class="container-floud">
         <div class="row no-gutter">
            <div class="col-md-12">
               <div class="logoimage">
                  <img class="footerlogo" src="{{ asset('myassets/images/logo.png') }}" alt="image">
               </div>
               <h1>DOWNLOAD NOW</h1>
            </div>
            <div class="col-md-6">
               <div class="logoimage">
                  <a href="#"><img class="appstore" src="{{ asset('myassets/images/app-store.png') }}" alt="image"></a>
               </div>
            </div>
            <div class="col-md-6">
               <div class="logoimage">
                  <a href="#"><img class="appstore" src="{{ asset('myassets/images/google-play.png') }}" alt="image"></a>
               </div>
            </div>
         </div>
      </section>

<!-- JS here -->
<!-- JS here -->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="{{ asset('myassets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('myassets/js/owl.carousel.js') }}"></script>
      <script src="{{ asset('myassets/js/owl.carousel.min.js') }}"></script>
      <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
      <script src="{{ asset('myassets/js/example2.js') }}"></script>
      <script>
         $('#app-showcase').owlCarousel({
                  loop: true,
                  margin: 30,
                  autoplay:true,
                 autoplayTimeout:3000,
                 smartSpeed: 2000, // duration of change of 1 slide;
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
jQuery('#getplateForm').on('submit', function (e) {
    $('.licence_error').text('');
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
                        }else{
                          $("#value_car").val(JSON.stringify(response));
                          var table = "<table><tr><th>Make</th><th>Model</th><th>Year</th></tr><tr><td>"+response.make+"</td><td>"+response.model+"</td><td>"+response.yearOfManufacture+"</td></tr></table>";
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
     var carval = $('#value_car').val();
     var carvalues = JSON.parse(carval);
     var cartype = $('input[name=cartype]:checked').val();
     if(value == ''){
        $('.licence_error').text('Please Seacrh your license Plate');
     }else{
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
  $(document).on('click','#next-1',function(){
    if($('input[name=cartype]:checked').length > 0) {
     $('.cartype_error').text('');
     var value = $('#getplateInput').val();
     if(value == ''){
        $('.licence_error').text('Please Seacrh your license Plate');
     }else{
        $('.licence_error').text('');
        $('.row.car_types').hide();
        $('.row.car_deals').show();
        $('h2.contact-title.ct-cars').hide();
        $('h2.contact-title.ct-deals').show();
        $('.license_form_data').hide();
        $('.bk_postcode').hide();
        $('a.back_page.bk_cars').show();
     }
    }else{
      $('.cartype_error').text('Please Select Your Cartype');
    }
  });
  $(document).on('click','a.back_page.bk_cars',function(){
     $('.bk_postcode').show();
     $('a.back_page.bk_cars').hide();
     $('.row.car_types').show();
     $('.row.car_deals').hide();
     $('h2.contact-title.ct-deals').hide();
     $('h2.contact-title.ct-cars').show();
     $('.license_form_data').show();
  });
  $(document).on('click','.deal_id',function(){
   var id = $(this).val();
   $('a.back_page.bk_cars').hide();
   $('h2.contact-title.ct-deals').hide();
   $('.row.car_deals').hide();
   $('a.back_page.bk_deals').show();
   $(".row.work_time").css("display", "inline-flex");
   //$('.row.work_time').show();
   $('h2.contact-title.ct-work_time').show();
   $('.car_option').hide();
   $('h2.contact-title.ct-deals-inner').hide();

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
  $(document).on('click','a.back_page.bk_deals',function(){
     $('.row.car_deals').show();
     $('h2.contact-title.ct-deals').show();
     $('a.back_page.bk_cars').show();
     $('a.back_page.bk_deals').hide();
     $('.deal_id').prop('checked', false);
     $('h2.contact-title.ct-work_time').hide();
     $('.row.work_time').hide();
     $('.car_option').show();
     $('h2.contact-title.ct-deals-inner').show();
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
    if($('input[name=selector]:checked').length > 0) {
     $('.worktime_error').text('');
     $('.row.work_time').hide();
     $('.row.register_customer').show();
     $('a.back_page.bk_deals').hide();
     $('a.back_page.bk_worktime').show();
     $('h2.contact-title.ct-work_time').hide();
     $('h2.contact-title.ct-register').show();
     $('.main_submitform').show();
     $('.mainFormInnerSubmit').click();
  }else{
      $('.worktime_error').text('Please Select Date and Time Slot');
    }

 });
 $(document).on('click','a.back_page.bk_worktime',function(){
   $('h2.contact-title.ct-register').hide();
   $('.row.register_customer').hide();
   $('h2.contact-title.ct-work_time').show();
   $('a.back_page.bk_worktime').hide();
   $('a.back_page.bk_deals').show();
   $('.row.work_time').show();
   $('.main_submitform').hide();
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
