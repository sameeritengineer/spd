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
      <section class="ownimg-section">
        <div class="container">
           <div class="row no-gutters">
            <div class="col-md-4">
              <div class="ownimg-img-left"><img class="ownimg" src="{{ asset('final_myassets/images/ownimg.png') }}"></div> 
              <div class="ceobox">
                <h6>Luka Lojk</h6>
                <p>FOUNDER & CEO</p>
              </div>
              
           </div>
              <div class="col-md-8 abouttop-right">
                 <h2 class="abouttop-sec-title">Who We Are?</h2>
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                 <p>Lorem Ipsum is simply dummy text of the printing .</p>
                </div>
              
           </div>
        </div>
     </section>
     <section class="welove-section pb-5">
      <div class="container">
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
    </main>
@endsection