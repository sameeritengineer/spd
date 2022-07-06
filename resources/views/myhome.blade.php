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
      </section>
      <section class="proficnal-section">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-md-6">
                  <div class="proficnal-sectionleft">
                  <h2 class="main-home-sec-title">Professional Washing And Cleaning.</h2>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus 
                     mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                   <div class="btnprficnl">
                     <a class="btnstyle-home numbercolor" href="#">07985125953</a>
                     <a class="btnstyle-home booknowcolor"  href="#">Book Now</a>
                   </div>  
               </div>
            </div>
               <div class="col-md-6 ">
                  <div class="pro-img-right"><img class="homesliderimage" src="{{ asset('final_myassets/images/carwashimg.gif') }}"></div> 
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
                  <h2 class="main-home-sec-title">Professional Washing And Cleaning.</h2>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur r</p>
                   <div class="btnprficnl">
                     <a class="" href="#"><img class="appdown-img" src="{{ asset('final_myassets/images/app-store.png') }}"></a>
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
                  <h2 class="main-home-sec-title p-0">Our Washing Services</h2>
               </div>
               <div class="col-md-12">
                  <div id="service-wash" class="app-showcase-main owl-carousel ourworkslider">
                     <div class="slide-itm-ser-main">
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
                     </div>
                     <div class="slide-itm-ser-main">
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
                     </div>
                     <div class="slide-itm-ser-main">
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
                     </div>
                     <div class="slide-itm-ser-main">
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
                     </div>
               </div>
               </div>
                  </div>
               </div>
      </section>
      <section class="cleaning-section">
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
      </section>
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
                           <h2>Incredible Experience</h2>
                           <p>We had an incredible experience working with Landify and were impressed they made such a big difference in only three weeks. Our team is so grateful for the wonderful improvements they made and their ability to get familiar with the concept so quickly. It acted as a catalyst to take our design to the next level and get more eyes on our product.</p>
                           <div class="media">
                              <div class="testmonial-slider-itm-img mr-3"><img class="ser-icon-img" src="{{ asset('final_myassets/images/userimg.png') }}"></div>
                              <div class="media-body">
                                <h5 class="mt-0">Esther Howard</h5>
                                <p>12/10/13</p>
                              </div>
                            </div>
                        </div>
                     </div>
                     <div class="testmonial-slider-itm">
                        <div class="testmonial-slider-itm-inner">
                           <h2>Incredible Experience</h2>
                           <p>We had an incredible experience working with Landify and were impressed they made such a big difference in only three weeks. Our team is so grateful for the wonderful improvements they made and their ability to get familiar with the concept so quickly. It acted as a catalyst to take our design to the next level and get more eyes on our product.</p>
                           <div class="media">
                              <div class="testmonial-slider-itm-img mr-3"><img class="ser-icon-img" src="{{ asset('final_myassets/images/userimg.png') }}"></div>
                              <div class="media-body">
                                <h5 class="mt-0">Esther Howard</h5>
                                <p>12/10/13</p>
                              </div>
                            </div>
                        </div>
                     </div>
                     <div class="testmonial-slider-itm">
                        <div class="testmonial-slider-itm-inner">
                           <h2>Incredible Experience</h2>
                           <p>We had an incredible experience working with Landify and were impressed they made such a big difference in only three weeks. Our team is so grateful for the wonderful improvements they made and their ability to get familiar with the concept so quickly. It acted as a catalyst to take our design to the next level and get more eyes on our product.</p>
                           <div class="media">
                              <div class="testmonial-slider-itm-img mr-3"><img class="ser-icon-img" src="{{ asset('final_myassets/images/userimg.png') }}"></div>
                              <div class="media-body">
                                <h5 class="mt-0">Esther Howard</h5>
                                <p>12/10/13</p>
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
