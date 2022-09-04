@extends('layouts.app')
@section('title', 'About Us')

@section('content')
  <main>
      <section class="selectcartype-section settingssection">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">About Us</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="ownimg-section aboutus-para">
        <div class="container">
           <div class="row no-gutters">
            <div class="col-md-5">
              <div class="ownimg-img-left"><img class="w-100 img-fluid" src="{{ asset('final_myassets/images/img64.png') }}" alt="image"></div> 
           </div>
              <div class="col-md-7 abgitouttop-right">
                 <h2 class="abouttop-sec-title">Who We Are?</h2>
                 <p>Founded in 2018, we work on all types of cars and vans including lease cars & luxurious vehicles so you can trust that the car looks as good as new when finished.</p>
                 <p>We take great pride in everything we do using not only the latest but best equipment and products to ensure the finest possible finish.</p>
                 <p>We do everything from car cleaning, sanitation services and valeting. To detailing & machine polishing.</p>
                 <p>Our standard in and out clean includes a thorough clean inside the car wiping everything down, removing dust and dirt and giving a def vacuum of the whole car. </p>
                 <p>We also offer diamond cut and alloy wheel refurbishment, returning your car back to OEM condition like nothing ever happened.</p>
                </div>
              
           </div>
        </div>
     </section>
     <section class="aboutus-para">
        <div class="container">
           <div class="row no-gutters">
            <div class="col-md-6">
             <h4 class="h4 mb-6 abt">Our Mission, Vision, Values.</h4>
             <div class="row">
                  <div class="col-12 col-sm-5 col-lg-12 col-xl-5">
                    <div class="imgWrap mb-4 mb-sm-0 mb-lg-4 mb-xl-0">
                      <img src="{{ asset('final_myassets/images/img65.png') }}" class="img-fluid" alt="image description">
                    </div>
                  </div>
                  <div class="col-12 col-sm-7 col-lg-12 col-xl-7">
                    <p>A first of its kind in the area by serving customers looking for high quality car wash and alloy refurbishment.</p>
                    <p>At a reasonable price, with a friendly nature of relationship.</p>
                    <ul class="list-unstyled pcFeaturesList pcfAlt pl-0 mb-0">
                      <li><strong class="fwMedium text-primary">Safety: </strong>Take action, considering all factors </li>
                      <li><strong class="fwMedium text-primary">Integrity: </strong>Stay honest and do what is right</li>
                      <li><strong class="fwMedium text-primary">Fun: </strong>Connect, compete and laugh</li>
                      <li><strong class="fwMedium text-primary">Teamwork: </strong>Help others before they ask and get the task complete.</li>
                    </ul>
                  </div>
                </div>
           </div>
            <div class="col-md-6">
               <h4 class="h4 mb-6 abt">Inspiring People to Shine</h4>
               <div class="row">
                  <div class="col-12 col-sm-5 col-lg-12 col-xl-5">
                    <div class="imgWrap mb-4 mb-sm-0 mb-lg-4 mb-xl-0">
                      <img src="{{ asset('final_myassets/images/img66.png') }}" class="img-fluid" alt="image description">
                    </div>
                  </div>
                  <div class="col-12 col-sm-7 col-lg-12 col-xl-7">
                    <p>Everyday we strive to create the best possible experience for both our new customers and our community of carwash / alloy members</p>
                    <p>It is not just part of our culture, it is our culture by listening to you and applying the principles.</p>
                    <ul class="pvList list-unstyled pl-0 mb-0">
                      <li>
                        <strong class="d-block mb-0 text-primary fwMedium">Our Purpose</strong>
                        <p>Create smiles & lifetime customers.</p>
                      </li>
                      <li>
                        <strong class="d-block mb-0 text-primary fwMedium">Our Vision</strong>
                        <p>To be a Service Industry Leader.</p>
                      </li>
                    </ul>
                  </div>
                </div>
           </div>
        </div>
     </section>
      <!-- <section class="ownimg-section">
        <div class="container">
           <div class="row no-gutters">
            <div class="col-md-4">
              <div class="ownimg-img-left"><img class="ownimg" src="{{ asset('final_myassets/images/ownimg.png') }}"></div> 
              <div class="ceobox">
                <h6>Luka Lojk</h6>
                <p>FOUNDER & CEO</p>
              </div>
              
           </div>
              <div class="col-md-12 abgitouttop-right">
                 <h2 class="abouttop-sec-title" style="text-align: center">Who We Are?</h2>
                 <p style="text-align: center">Founded in 2018, we work on all types of cars and vans including lease cars & luxurious vehicles so you can trust that the car looks as good as new when finished. We take great pride in everything we do using not only the latest but best equipment and products to ensure the finest possible finish.</p>
                </div>
              
           </div>
        </div>
     </section> -->
     <section class="welove-section pb-5">
      <!-- <div class="container">
         <div class="row no-gutters">
          <div class="col-md-5">
            <div class="welove-img-left"><img class="carimg w-100" src="{{ asset('final_myassets/images/carimg.png') }}"></div> 
         </div>
            <div class="col-md-7">
              <div class="welove-right">
               <h2 class="welove-sec-title">We love what we do. We are up to your ride</h2>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of </p>
              </div>
              <img class="abtrightimg" src="{{ asset('final_myassets/images/abtright.png') }}"> 
            </div>
         </div>
      </div> -->
   </section>
      


 <!--       <section class="washservice-sec">
         <div class="container">

          <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">

             <div class="col-lg-4 col-md-6 col-sm-12">
            
               <div class="slide-itm-ser-main">
                        <div class="slide-itm-ser-img"><img class="ser-icon-img" src="{{ asset('final_myassets/images/icon1.png') }}"></div>
                        <div class="ourinner">
                           <h2>Rain Repellent</h2>
                           <p>Lorem ipsum is simply free text a dolor sit amet, consectetur no tted adipisicing elit sed.</p>
                        </div>
                     </div>

             </div>

             <div class="col-lg-4 col-md-6 col-sm-12">
            
               <div class="slide-itm-ser-main">
                        <div class="slide-itm-ser-img"><img class="ser-icon-img" src="{{ asset('final_myassets/images/icon1.png') }}"></div>
                        <div class="ourinner">
                           <h2>Rain Repellent</h2>
                           <p>Lorem ipsum is simply free text a dolor sit amet, consectetur no tted adipisicing elit sed.</p>
                        </div>
                     </div>

             </div>

             <div class="col-lg-4 col-md-6 col-sm-12">
            
               <div class="slide-itm-ser-main">
                        <div class="slide-itm-ser-img"><img class="ser-icon-img" src="{{ asset('final_myassets/images/icon1.png') }}"></div>
                        <div class="ourinner">
                           <h2>Rain Repellent</h2>
                           <p>Lorem ipsum is simply free text a dolor sit amet, consectetur no tted adipisicing elit sed.</p>
                        </div>
                     </div>

             </div>

             <div class="col-lg-4 col-md-6 col-sm-12">
            
               <div class="slide-itm-ser-main">
                        <div class="slide-itm-ser-img"><img class="ser-icon-img" src="{{ asset('final_myassets/images/icon1.png') }}"></div>
                        <div class="ourinner">
                           <h2>Rain Repellent</h2>
                           <p>Lorem ipsum is simply free text a dolor sit amet, consectetur no tted adipisicing elit sed.</p>
                        </div>
                     </div>

             </div>

             <div class="col-lg-4 col-md-6 col-sm-12">
            
               <div class="slide-itm-ser-main">
                        <div class="slide-itm-ser-img"><img class="ser-icon-img" src="{{ asset('final_myassets/images/icon1.png') }}"></div>
                        <div class="ourinner">
                           <h2>Rain Repellent</h2>
                           <p>Lorem ipsum is simply free text a dolor sit amet, consectetur no tted adipisicing elit sed.</p>
                        </div>
                     </div>

             </div>

             <div class="col-lg-4 col-md-6 col-sm-12">
            
               <div class="slide-itm-ser-main">
                        <div class="slide-itm-ser-img"><img class="ser-icon-img" src="{{ asset('final_myassets/images/icon1.png') }}"></div>
                        <div class="ourinner">
                           <h2>Rain Repellent</h2>
                           <p>Lorem ipsum is simply free text a dolor sit amet, consectetur no tted adipisicing elit sed.</p>
                        </div>
                     </div>

             </div>

          </div>

     </div>
      </section> -->
    </main>
@endsection