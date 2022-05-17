@extends('layouts.app')
@section('title', 'Home')

@section('content')
<section class="Banner">
         <div class="container-floud">
            <div class="row  justify-c">
               <div class="col-md-6">
                  <h2>Download Our App</h2>
                  <p>Originally released in 2015, the adidas CONFIRMED app helped fans of the Three Stripes get to the most exclusive 
                  </p>
                  <div class="appstoreboth">
                     <a href="#"><img class="appstore" src="{{ asset('myassets/images/app-store.png') }}" alt="image"></a>
                     <a href="#"><img class="appstore" src="{{ asset('myassets/images/google-play.png') }}" alt="image"></a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="right-app-img">
                     <img class="" src="{{ asset('myassets/images/0.gif') }}">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="aboutsectionhome">
         <img class="aftertop" src="{{ asset('myassets/images/after.png') }}" alt="image">
         <img class="screen1" src="{{ asset('myassets/images/mainimage.png') }}" alt="image">
         <img class="screen2" src="{{ asset('myassets/images/mainimage.png') }}" alt="image">
         <div class="container-floud">
            <div class="row">
               <div class="col-md-12">
                  <div class="welcomeleft" >
                     <h2>Mobile Car Wash & Detailing</h2>
                     <p>Originally released in 2015, the adidas CONFIRMED app helped fans of the Three Stripes get to the most exclusive releases at the touch of a button, keeping them well clear of the queues. As of today, CONFIRMED is back. And it is much more than a sneaker app. adidas’ Senior Director of Digital Strategy, Tareq Nazlawy explains, “We’re thrilled to release the new CONFIRMED app and share our best products and stories with a fidelity that we haven’t been able to before. There’s a whole extended family behind each creation and each partnership; with a dedicated app we can create experiences which celebrate that richness in new and exciting ways.”
                     </p>
                     <!-- <a href="https://wa.me/message/KJHGFFY5VTJ7A1" target="_blank" class="emergency_call">Emergency Call 24/7</a> -->
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
      <section class="welcomeapp-section">
         <div class="container-floud">
            <div class="row no-gutter justify-c">
               <div class="col-md-6">
                  <div class="welcometext-left" >
                     <h2>Mobile Diamond Cut & Alloy Wheel Refurbishment</h2>
                     <p>Originally released in 2015, the adidas CONFIRMED app helped fans of the Three Stripes get to the most exclusive releases at the touch of a button, keeping them well clear of the queues. As of today, CONFIRMED is back. And it is much more than a sneaker app.
                        adidas’ Senior Director of Digital Strategy, Tareq Nazlawy explains, 
                        CONFIRMED not only caters to the Three Stripes fanatics and sneakerheads with access to some of their most limited and premium drops but also takes a uniquely community-driven approach.
                     </p>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="bannerright">
                     <img class="sbrimg" src="{{ asset('myassets/images/mobile.png') }}" alt="image">
                     <img class="gifimage" src="{{ asset('myassets/images/video.gif') }}" alt="image">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="appscreens">
         <div class="container-floud">
            <div class="row no-gutter justify-c">
               <div class="col-md-6">
                  <div class="appframe">
                     <img class="cutoscreen" src="{{ asset('myassets/images/rightimg.png') }}" alt="image">
                  </div>
                  <!-- <h3 class="connect-us-ttl-one">CUT2YOU</h3> -->
               </div>
               <div class="col-md-6">
                  <div class="appscreendes" >
                     <h2>Book Faster</h2>
                     <p>Originally released in 2015, the adidas CONFIRMED app helped fans of the Three Stripes get to the most exclusive releases at the touch of a button, keeping them well clear of the queues. As of today, CONFIRMED is back. And it is much more than a sneaker app.
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="reviews-section">
         <div class="container-floud">
            <div class="row no-gutter">
               <div class="col-md-12">
                  <h2 class="Myreviews">Reviews</h2>
                  <div id="app-showcase" class="app-showcase-main owl-carousel ourworkslider">
                     <div class="slide-itm">
                        <div class="media mr-4">
                           <div class=" d-flex">
                              <img class="mr-3" src="{{ asset('myassets/images/profile_user.jpg') }}" alt="Generic placeholder image">
                              <div class="media-body">
                                 <h5 class="mt-0">Jos Butler</h5>
                                 <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                 </ul>
                              </div>
                           </div>
                           <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                        </div>
                     </div>
                     <div class="slide-itm">
                        <div class="media mr-4">
                           <div class=" d-flex">
                              <img class="mr-3" src="{{ asset('myassets/images/profile_user.jpg') }}" alt="Generic placeholder image">
                              <div class="media-body">
                                 <h5 class="mt-0">Jos Butler</h5>
                                 <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                 </ul>
                              </div>
                           </div>
                           <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                        </div>
                     </div>
                     <div class="slide-itm">
                        <div class="media mr-4">
                           <div class=" d-flex">
                              <img class="mr-3" src="{{ asset('myassets/images/profile_user.jpg') }}" alt="Generic placeholder image">
                              <div class="media-body">
                                 <h5 class="mt-0">Jos Butler</h5>
                                 <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                 </ul>
                              </div>
                           </div>
                           <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection
