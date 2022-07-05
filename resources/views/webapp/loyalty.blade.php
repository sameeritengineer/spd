@extends('layouts.app')

@section('content')
   <main>
      <section class="selectcartype-section summerywrepper">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Loyalty</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cartypecontainer-section">
        <div class="container">
         <div class="row mt-3 justify-content-center">
            <div class="col-md-6">
              <div class="textimg-box"><img class="textimg w-100" src="{{ asset('final_myassets/images/textimg.png') }}" alt="image"></div>
            </div>
         </div>
       <div class="row justify-content-center">
        <div class="col-md-12 ">
          <h3 class="wasthcompleted text-center"><b>{{$booking_count}} Washes completed out of 5</b></h3>
        </div>
        
        <div class="col-md-3">
         <div class=" perstlrow secmain">
          <div class="textimg-box"><img class="textimg w-100" src="{{ asset('final_myassets/images/imglolty1.png') }}" alt="image"></div>
         </div>
        </div>
        <div class="col-md-3">
          <div class=" perstlrow secmain">
           <div class="textimg-box"><img class="textimg w-100" src="{{ asset('final_myassets/images/imglolty2.png') }}" alt="image"></div>
          </div>
         </div>
         <div class="col-md-3">
          <div class=" perstlrow secmain">
           <div class="textimg-box"><img class="textimg w-100" src="{{ asset('final_myassets/images/imglolty3.png') }}" alt="image"></div>
          </div>
         </div>
         <div class="col-md-3">
          <div class=" perstlrow secmain">
           <div class="textimg-box"><img class="textimg w-100" src="{{ asset('final_myassets/images/imglolty4.png') }}" alt="image"></div>
          </div>
         </div>
         <div class="col-md-5">
          <div class=" perstlrow secmain">
           <div class="textimg-box"><img class="textimg w-100" src="{{ asset('final_myassets/images/discount.png') }}" alt="image"></div>
          </div>
         </div>
        </div>
       </div>

          </div>
      </section>
    </main>
@endsection