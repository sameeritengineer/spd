@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')

<section class="page-title bg-1">
         <div class="overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="block text-center">
                     <span class="text-white">Get in Touch</span>
                     <h1 class="text-capitalize mb-5 text-lg">Contact Us</h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- contact form start -->
      <section class="section contact-info pb-0">
         <img class="aftertop" src="{{ asset('myassets/images/after.png') }}" alt="image">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6 col-md-6">
                  <div class="contact-block">
                     <h5>Call Us</h5>
                     +823-4565-13456
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6 col-md-6">
                  <div class="contact-block">
                     <h5>Email Us</h5>
                     contact@mail.com
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6 col-md-6">
                  <div class="contact-block">
                     <h5>Location</h5>
                     North Main Street,Brooklyn Australia
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="contact-form-wrap section">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-6">
                  <div class="section-title text-center">
                     <h2 class="text-md mb-2">Contact us</h2>
                     <div class="divider mx-auto my-4"></div>
                     <p class="mb-5">Laboriosam exercitationem molestias beatae eos pariatur, similique, excepturi mollitia sit perferendis maiores ratione aliquam?</p>
                  </div>
               </div>
            </div>
            <div class="row">
                @if(Session::get('alert'))
                <div class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
                  <p>{{Session::get('message')}} </p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                @endif
               <div class="col-lg-12 col-md-12 col-sm-12">

                <form class="form-contact contact_form" action="{{route('contact_form')}}" method="post" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="comment" id="message" cols="30" rows="9" placeholder=" Enter Message" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" placeholder="Enter your name" required="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" placeholder="Email" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                             <button type="submit" class="btn btn-main btn-round-full">Send Messege</button>
                             </div>
                        </form>
               </div>
            </div>
         </div>
      </section>
      <div class="google-map ">
         <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/wearable-gps/">adventure gps</a></iframe></div>
      </div>
@endsection
