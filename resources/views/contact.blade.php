@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')
    <main>
      <section class="selectcartype-section settingssection">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Contact Us</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="contact_inner">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="contact_form_inner">
                                    <div class="contact_field">
                                        <h3>Contatc Us</h3>
                                        <p>Feel Free to contact us any time. We will get back to you as soon as we can!.</p>
                                        <input type="text" class="form-control form-group" placeholder="Name" />
                                        <input type="text" class="form-control form-group" placeholder="Email" />
                                        <textarea class="form-control form-group" placeholder="Message"></textarea>
                                        <button class="contact_form_submit">Send</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="right_conatct_social_icon d-flex align-items-end">
                                   <div class="socil_item_inner d-flex">
                                      <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact_info_sec">
                            <h4>Contact Info</h4>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-headset"></i>
                                <span>+91 8009 054294</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>info@flightmantra.com</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-map-marked-alt"></i>
                                <span>1000+ Travel partners and 65+ Service city across India, USA, Canada & UAE</span>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--       <section class="map_sec">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="map_inner">
                        <h4>Find Us on Google Map</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quo beatae quasi assumenda, expedita aliquam minima tenetur maiores neque incidunt repellat aut voluptas hic dolorem sequi ab porro, quia error.</p>
                        <div class="map_bind">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471220.5631094339!2d88.04952462217592!3d22.6757520733225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1596988408134!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    </main>
<!-- <section class="page-title bg-1">
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
      </div> -->
@endsection
