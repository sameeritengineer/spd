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
           <!-- <div class="row no-gutters">
            <div class="col-md-4">
              <div class="ownimg-img-left"><img class="ownimg" src="{{ asset('final_myassets/images/ownimg.png') }}"></div> 
              <div class="ceobox">
                <h6>Luka Lojk</h6>
                <p>FOUNDER & CEO</p>
              </div>
              
           </div> -->
              <div class="col-md-12 abgitouttop-right">
                 <h2 class="abouttop-sec-title" style="text-align: center">Who We Are?</h2>
                 <p style="text-align: center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
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
    </main>
@endsection