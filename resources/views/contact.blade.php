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
                                        <h3>Contact Us</h3>
                                        <p>Please fill out the form below and a member of the team will get back to you.</p>
                                        <form class="form-contact contact_form" action="{{route('contact_form')}}" method="post" id="contactForm">
                                          @csrf
                                        <input type="text" class="form-control form-group" placeholder="Name" name="name" required="" />
                                        <input type="email" class="form-control form-group" placeholder="Email" name="email" required="" />
                                        <textarea name="comment" class="form-control form-group" placeholder="Message" required=""></textarea>
                                        <button class="contact_form_submit" type="submit">Send</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="right_conatct_social_icon d-flex align-items-end">
                                   <div class="socil_item_inner d-flex">
                                      <li class="contact"><a target="_blank" href="https://www.facebook.com/splashanddrip"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> 
            <li class="contact"><a target="_blank" href="https://www.instagram.com/splashanddrip/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li class="contact"><a href="https://www.tiktok.com/@splashanddrip" class="googleplus contact" target="_blank"><i class="fa fa-tiktok"></i></a></li>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact_info_sec">
                            <h4>Contact Info</h4>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-headset"></i>
                                <span>+44 7985 125953</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>Info@splashanddrip.co.uk</span>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-map-marked-alt"></i>
                                <span>Feel free to get in contact and one of our dedicated team members will be happy to help</span>
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
