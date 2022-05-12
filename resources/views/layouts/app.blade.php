<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Car wash</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/progressbar_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sp_style.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div id="app">
            <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a class="car_logo" href="#"><img src="{{ asset('assets/img/sd/logo.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li><a href="{{route('myhome')}}">Home</a></li>
                                                <li><a href="{{route('aboutus')}}">About</a></li>
                                                <li><a href="{{route('services')}}">services</a></li>
                                                <li><a href="{{route('contact')}}">Contact</a></li>
                                                @auth<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    Logout
</a>    </li>@endauth
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->
                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                        <a href="contact.html" class="btn header-btn"><img src="{{ asset('assets/img/sd/smartphone.svg') }}" alt=""> 10 (87) 256-2903</a>
                                    </div>
                                </div>
                            </div> 
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
        <main>
            @yield('content')
        </main>

         <footer>
        <div class="footer-wrapper section-bg2"  data-background="{{ asset('assets/img/gallery/footer-bg.png') }}">
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-35">
                                        <a href="index.html"><img src="{{ asset('assets/img/logo/logo2_footer.png') }}" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum reeut cupidatatfug.</p>
                                        </div>
                                        <ul class="mb-40">
                                            <li class="number"><a href="#">(80) 783 367-3904</a></li>
                                            <li class="number2"><a href="#">contact@carwash.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Opening hour</h4>
                                    <ul>
                                        <li><a href="#">Mon-Fri (9.00-19.00)</a></li>
                                        <li><a href="#">Sat (12.00-19.00)</a></li>
                                        <li><a href="#">Sun <span>(Closed)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Navigation</h4>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </div>
  </footer>
  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<!-- JS here -->

<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>

<!-- Date Picker -->
<script src="{{ asset('assets/js/gijgo.min.js') }}"></script>
<!-- Nice-select, sticky -->
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<!-- Progress -->
<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/hover-direction-snake.min.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->  
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script type="text/javascript">window.setTimeout("document.getElementById('successMessage').style.display='none';", 5000); </script>
<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
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
                        window.location.href = "{{ route('home')}}";
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
                        if(response.error == 1){
                         $(".licence_error").html('License Plate not Found');
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

   var date = $.datepicker.formatDate('yy-mm-dd', new Date());
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
  }else{
      $('.worktime_error').text('Please Select Your Cartype');
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

    </div>
</body>
</html>
