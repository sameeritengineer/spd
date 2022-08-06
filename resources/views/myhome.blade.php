@extends('layouts.app')
@section('title', 'Home')

@section('content')
<main>
<section class="home-banner">
   <ul class="socils-icons topbannersocialicons">
            <li class=""><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> 
            <li class=""><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li class=""><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
         </ul>
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="homesliderimage" src="{{ asset('final_myassets/images/sliderimg1.jpg') }}"></div>
                <div class="slide-itm-inner">
                  <h2>Car Valeting, Detailing & Diamond Cut Alloy Service</h2>
                  <p>Download our Mobile App now and book your Car Valet, Detailing or Alloy Wheel Refurbishment</p>
                   @auth
                  <a class="emgcybtn" href="{{route('book')}}">Book Now</a>
                  @else
                  <a class="emgcybtn" href="{{route('getpostcode')}}">Book Now</a>
                 @endauth
                  
               </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="home-banner">
         <ul class="socils-icons topbannersocialicons">
            <li class=""><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> 
            <li class=""><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li class=""><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
         </ul>
         <div id="app-showcase" class="app-showcase-main owl-carousel ourworkslider">
            <div class="slide-itm">
               <div class="slide-itm"><img class="homesliderimage" src="{{ asset('final_myassets/images/sliderimg1.jpg') }}"></div>
               <div class="slide-itm-inner">
                  <h2 >We Care About Your Car.</h2>
                  <p>Here at splashanddrip we focus on getting your car clean from top to bottom in no time !</p>
                  <a class="emgcybtn" href="#">EMERGENCY CALL 24/7</a>
               </div>
            </div>
            <div class="slide-itm">
               <div class="slide-itm"><img class="homesliderimage" src="{{ asset('final_myassets/images/sliderimg1.jpg') }}"></div>
               <div class="slide-itm-inner">
                  <h2>We Care About Your Car.</h2>
                  <p>Here at splashanddrip we focus on getting your car clean from top to bottom in no time !</p>
                  <a class="emgcybtn" href="#">EMERGENCY CALL 24/7</a>
               </div>
            </div>
            <div class="slide-itm">
               <div class="slide-itm"><img class="homesliderimage" src="{{ asset('final_myassets/images/sliderimg1.jpg') }}"></div>
               <div class="slide-itm-inner">
                  <h2>We Care About Your Car.</h2>
                  <p>Here at splashanddrip we focus on getting your car clean from top to bottom in no time !</p>
                  <a class="emgcybtn" href="#">EMERGENCY CALL 24/7</a>
               </div>
            </div>
      </div>
      </section> -->
      <!-- <section class="proficnal-section">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-md-6">
                  <div class="proficnal-sectionleft">
                  <h2 class="main-home-sec-title">Car Valeting</h2>
                  <p>Why go somewhere and wait in a queue to get your car cleaned , when we can come to you and valet or detail your vehicle when it suits you and at your selected location wether it’s work, shopping or home. We will come and get the job done.</p>
                   <div class="btnprficnl">
                     @auth
                  <a class="btnstyle-home booknowcolor" href="{{route('book')}}">Book Now</a>
                  @else
                  <a class="btnstyle-home booknowcolor" href="{{route('getpostcode')}}">Book Now</a>
                 @endauth
                   </div>  
               </div>
            </div>
               <div class="col-md-6 ">
                  <div class="pro-img-right"><img class="homesliderimage" src="{{ asset('final_myassets/images/carwashimg.gif') }}"></div> 
               </div>
            </div>
         </div>
      </section> -->
      <section class="appdownload-section one">
         <div class="container">
            <div class="row">
              <div class="col-md-6">
                  <div class="appdownload-right">
                  <h2 class="main-home-sec-title">Car Valeting</h2>
                  <p>Why go somewhere and wait in a queue to get your car cleaned , when we can come to you and valet or detail your vehicle when it suits you and at your selected location wether it’s work, shopping or home. We will come and get the job done.</p> 
                  <div class="btnprficnl">
                     <!-- <a class="btnstyle-home numbercolor" href="#">07985125953</a> -->
                     @auth
                  <a class="btnstyle-home booknowcolor" href="{{route('book')}}">Book Now</a>
                  @else
                  <a class="btnstyle-home booknowcolor" href="{{route('getpostcode')}}">Book Now</a>
                 @endauth
                   </div>
                   <div class="btnprficnl">
                    <p class="ourapp_download">Download Our App Now</p>
                     <a class="" href="#"><img class="appdown-img apple" src="{{ asset('final_myassets/images/app-store.png') }}"></a>
                     <a class="" href="#"><img class="appdown-img" src="{{ asset('final_myassets/images/google-play.png') }}"></a>
                   </div>   
                  </div>  
               </div>
               <div class="col-md-6 ">
                  <div class="appdownload-img-left text-center"><img class="washGif" src="{{ asset('final_myassets/images/xy.jpg') }}"></div> 
               </div>
            </div>
         </div>
      </section>
      <section class="appdownload-section two">
         <div class="container">
            <div class="row">
               <div class="col-md-6 ">
                  <div class="appdownload-img-left"><img class="valeting" src="{{ asset('final_myassets/images/ally.jpg') }}"></div> 
               </div>
               <div class="col-md-6">
                  <div class=" appdownload-right">
                  <h2 class="main-home-sec-title">Alloy Wheel Refurbishment</h2>
                  <p>Mobile car valeting & detailing service now extending our services and doing mobile diamond cut and alloy wheel refurbishment, covering all of london and the surrounding areas.</p> 
                  <div class="btnprficnl">
                    <p class="ourapp_download">Download Our App Now</p>
                     <a class="" href="#"><img class="appdown-img apple" src="{{ asset('final_myassets/images/app-store.png') }}"></a>
                     <a class="" href="#"><img class="appdown-img" src="{{ asset('final_myassets/images/google-play.png') }}"></a>
                   </div>  
                  </div>  
               </div>
            </div>
         </div>
      </section>
      
      <section class="washservice-sec">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h2 class="main-home-sec-title p-0">Our Services</h2>
               </div>
               <div class="col-md-12">
                  <div id="service-wash" class="app-showcase-main owl-carousel ourworkslider">
                     <!-- <div class="slide-itm-ser-main">
                        <div class="slide-itm-ser-img"><img class="ser-icon-img" src="{{ asset('final_myassets/images/icon1.png') }}"></div>
                        <div class="ourinner">
                           <h2>Rain Repellent</h2>
                           <p>Vestibulum tortor risus, rutrum at congue sed ultricies finibus.</p>
                           <ul class="list-inline">
                              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                              <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                           </ul>
                        </div>
                     </div> -->
                     @foreach($deals as $deal) 
                     <div class="slide-itm-ser-main">
                        <div class="slide-itm-ser-img">@if(!is_null($deal->image)) <img class="serimg w-100" src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal->image; ?>"> @endif</div>
                        <div class="ourinner">
                           <h2>{{$deal->name}}</h2>
                           @php

                           $string = substr($deal->description,0,100);
                           $string = substr($string,0,strrpos($string," "));

                           @endphp
                           <p>{{$string}}</p>
                        </div>
                     </div>
                     @endforeach  
                     
               </div>
               </div>
                  </div>
               </div>
      </section>
      <section class="appdownload-section">
         <div class="container">
            <div class="row">
               <div class="col-md-6 ">
                  <div class="appdownload-img-left text-center"><img class="appimage" src="{{ asset('final_myassets/images/appimage.png') }}"></div> 
               </div>
               <div class="col-md-6">
                  <div class=" appdownload-right">
                    <h2 class="main-home-sec-title">Car Valeting, Detailing & Diamond Cut Alloy Service</h2>
                    <p>Download our Mobile App now and book your Car Valet, Detailing or Alloy Wheel Refurbishment.</p>
                  <div class="btnprficnl">
                     <!-- <a class="btnstyle-home numbercolor" href="#">07985125953</a> -->
                     @auth
                  <a class="btnstyle-home booknowcolor" href="{{route('book')}}">Book Now</a>
                  @else
                  <a class="btnstyle-home booknowcolor" href="{{route('getpostcode')}}">Book Now</a>
                 @endauth
                   </div> 
                   <div class="btnprficnl">
                    <p class="ourapp_download">Download Our App Now</p>
                     <a class="" href="#"><img class="appdown-img apple" src="{{ asset('final_myassets/images/app-store.png') }}"></a>
                     <a class="" href="#"><img class="appdown-img" src="{{ asset('final_myassets/images/google-play.png') }}"></a>
                   </div>  
                  </div>  
               </div>
            </div>
         </div>
      </section>
      <!-- <section class="cleaning-section">
         <div class="container-fluid p-0">
            <div class="row no-gutters">
               <div class="col-md-6">
                  <div class="cleaning-right">
                  <h2 class="main-home-sec-title">Dry Cleaning Any Dirt Inside The Car.</h2>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus 
                     mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                     <div class="btnprficnl">
                        <a class="btnstyle-home numbercolor" href="#">View More</a>
                      </div>  
                     </div>  
               </div>
               <div class="col-md-6">
                  <div class="appdownload-img-left"><img class="rightacleaning-img w-100" src="{{ asset('final_myassets/images/img23.png') }}"></div> 
               </div>
            </div>
         </div>
      </section> -->
      <!-- <section class="nature-section">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                 <div class="naturecol">
                  <div class="naturecol-img"><i class="fa fa-life-ring" aria-hidden="true"></i></div> 
                  <h4>Natural Cleaners</h4>
                  <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                 </div>
               </div>
               <div class="col-md-4">
                  <div class="naturecol">
                   <div class="naturecol-img"><i class="fa fa-life-ring" aria-hidden="true"></i></div> 
                   <h4>Natural Cleaners</h4>
                   <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="naturecol">
                   <div class="naturecol-img"><i class="fa fa-life-ring" aria-hidden="true"></i></div> 
                   <h4>Natural Cleaners</h4>
                   <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                  </div>
                </div>
            </div>
         </div>
      </section> -->
      <section class="testmonial-sec">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h2 class="main-home-sec-title">What our clients say</h2>
               </div>
               <div class="col-md-12">
                  <div id="testmonial-slider" class="app-showcase-main owl-carousel ourworkslider">
                     <div class="testmonial-slider-itm">
                        <div class="testmonial-slider-itm-inner">
                           <h2>It looked like a brand new car!</h2>
                           <p>They did an amazing job on my car. It looks better than when I first bought the car. The customer service was also amazing.</p>
                           <div class="media">
                              <div class="testmonial-slider-itm-img mr-3"><img class="ser-icon-img" src="{{ asset('final_myassets/images/rw1.jpg') }}"></div>
                              <div class="media-body">
                                <h5 class="mt-0">Brandon M</h5>
                                <!-- <p>12/10/13</p> -->
                              </div>
                            </div>
                        </div>
                     </div>
                     <div class="testmonial-slider-itm">
                        <div class="testmonial-slider-itm-inner">
                           <h2>Amazing & Very Professional</h2>
                           <p>Splash N Drip came to the house on time and ready to work. They did an amazing job!</p>
                           <div class="media">
                              <div class="testmonial-slider-itm-img mr-3"><img class="ser-icon-img" src="{{ asset('final_myassets/images/rw4.jpg') }}"></div>
                              <div class="media-body">
                                <h5 class="mt-0">Michael G</h5>
                              </div>
                            </div>
                        </div>
                     </div>
                     <div class="testmonial-slider-itm">
                        <div class="testmonial-slider-itm-inner">
                           <h2>Beautiful Job!!</h2>
                           <p>Absolutely best detail wash wax service ever.  Highly recommend their service and they were great people to deal with!</p>
                           <div class="media">
                              <div class="testmonial-slider-itm-img mr-3"><img class="ser-icon-img" src="{{ asset('final_myassets/images/rw2.jpg') }}"></div>
                              <div class="media-body">
                                <h5 class="mt-0">Diana T</h5>
                              </div>
                            </div>
                        </div>
                     </div>
                      <div class="testmonial-slider-itm">
                        <div class="testmonial-slider-itm-inner">
                           <h2>Superb Service</h2>
                           <p>Splash N Drip did a great job. Fast, friendly, efficient and my car look like it did when I bought it! What more can I ask . I would recommend them to anyone!</p>
                           <div class="media">
                              <div class="testmonial-slider-itm-img mr-3"><img class="ser-icon-img" src="{{ asset('final_myassets/images/rw3.jpg') }}"></div>
                              <div class="media-body">
                                <h5 class="mt-0">Tim M</h5>
                              </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
                  </div>
               </div>
      </section>
      <!-- <section class="contactus-section">
         <div class="container-fluid p-0">
            <div class="row no-gutters justify-content-center">
               <div class="col-md-6 ">
                  <div class="pro-img-left"><img class="homesliderimage w-100" src="{{ asset('final_myassets/images/img23.png') }}"></div> 
               </div>
               <div class="col-md-6 contactus-sectionright">
                  <div class="col-md-12">
                     <div class="signleft homecontactus">
                        <div class="row">
                           <div class="col-md-12">
                              <h3 class="cardeltitle mt-4 mb-2"><b>Contact Us</b></h3>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="labelinputtext">Full Name</label>
                                 <input type="text" class="form-control form-control-custom" placeholder="Enter Full Name">
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="labelinputtext">Phone No</label>
                                 <input type="number" class="form-control form-control-custom" placeholder="Enter Phone No">
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="labelinputtext">Phone No</label>
                                 <input type="email" class="form-control form-control-custom" placeholder="Enter Email">
                               </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="labelinputtext">Subject</label>
                                 <input type="text" class="form-control form-control-custom" placeholder="Enter Email">
                               </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="labelinputtext">Message</label>
                                 <textarea class="form-control form-control-custom" placeholder="Enter Message"></textarea>
                               </div>
                           </div>
                           <div class="col-md-12"><button class="btn btnownstyle mt-1 btnsendnew" type="submit">Send</button></div>
                           
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      </section> -->
   </main>
@endsection
