@extends('layouts.app')
@section('title', 'Services')

@section('content')
<section class="page-title bg-1">
         <div class="overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="block text-center">
                     <h1 class="text-capitalize mb-5 text-lg">Services</h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- contact form start -->

  <section class="section abtsection">
        <img class="aftertop" src="{{ asset('myassets/images/after.png') }}" alt="image">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-sm-12 col-md-12">
                  <div class="topabt">
                     <h2>We offer best Wash Deals to our customer</h2>
                     <p>Lorem ipsum dolor sit amet consectetur adipiscing elit urna velit amet tempor egestas fringilla bibendum vel nisl sed.</p>
                     <div class="abtimg"> <img class="" src="{{ asset('myassets/images/abtimgone.jpg') }}" alt="image"></div>
                  </div>
               </div>
               @foreach($deals as $deal)
               <div class="col-lg-4 col-sm-4 col-md-4">
                  <div class="abtbt">
                     <div class="single-card text-center mb-30">
                            <div class="card-top">
                                @if(!is_null($deal->image)) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal->image; ?>" style="width:100px;height:100px"> @endif
                                <h4>{{$deal->name}}</h4>
                                <p>{{$deal->description}}</p>
                            </div>
                            <div class="card-mid">
                                <h5>€{{$deal->price}}</h5>
                            </div>
                            <div class="card-bottom">
                                <ul>
                                @php

                                $service_ids = App\Dealservice::where('deal_id', $deal->id)->pluck('service_id')->toArray();
                                $services = App\Service::WhereIn('id', $service_ids)->pluck('name')->toArray();
                                
                                @endphp    
                                @foreach($services as $service)
                                    <?php echo '<li> '. $service .'</li>'; ?>
                                @endforeach
                                </ul>
                                <a href="#" class="borders-btn">Get Started</a>
                            </div>
                        </div>
                  </div>
               </div>
               @endforeach
               
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
