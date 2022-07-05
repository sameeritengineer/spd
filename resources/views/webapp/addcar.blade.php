@extends('layouts.app')

@section('content') 

   <main>
      <section class="selectcartype-section">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <h2 class="pagetitlemain">ADD CAR</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cartypecontainer-section">
         <div class="container">
          <form id="getplateForm">
          <div class="steponecontainer">
                <div class="row">
                  <div class="col-md-12">
                     <div class="input-groupmainlpn">
                     <div class="input-group">
                        <input type="text" name="licence_plate" id="getplateInput" class="form-control"
              placeholder="Enter Your License Plate" required="" aria-describedby="button-addon2" />
                        <button type="submit" id="getplate" class="btn btn-outline-primary">Search</button>
                      </div>
                      <p class="licence_error"></p>
                     </div>
                  </div>
               </div>
               </div>
            </form>   
            <div class="response_data"></div>
            <form id="mainForm">
            <div class="steptwocontainer car_types">
               <div class="row daystatusbox justify-content-center">
                @foreach($cartypes as $cartype)
                  <div class="col-md-4">
                     <div class="radiobox cartype_radiobox">
                      <input type="radio" id="<?php echo $cartype->id; ?>" name="cartype" value="<?php echo $cartype->id; ?>">
                        <label for="<?php echo $cartype->id; ?>">
                          <div class="selectcartype">
                           <div class="bannerimgmain-box">
                            <!-- @if(!is_null($cartype->image))<img class="sd_cartype footerlogoimg w-100" src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $cartype->image; ?>" alt="image"> @endif -->
                            @if($cartype->id == 1)
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img1.png') }}" alt="image">
                            @elseif($cartype->id == 2)
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img2.png') }}" alt="image">
                            @elseif($cartype->id == 3)
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img3.png') }}" alt="image">
                            @elseif($cartype->id == 4)
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img4.png') }}" alt="image">
                            @else
                            <img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/img5.png') }}" alt="image">
                            @endif
                           </div>
                           <h4>{{$cartype->name}}</h4>
                          </div>
                        </label>
                      </div>
                  </div>
                  @endforeach
               </div>
            </div>



               <div class="row">
               <div class="col-md-12">
                <div class="inner_selection_cartype">     
                 <input type="hidden" id="value_car" name="value_car" value="">
                 <input type="hidden" id="licence_plate" name="licence_plate" value="">
                 <p class="cartype_error" style="text-align: center;"></p>
                 <p class="cartype_success"></p>
                 </div>
                  <button class="btn btnownstyle mt-4 mx-w300" type="button" id="add_car">Add car</button>
               </div>
               </div>
             </form>
            </div>
            </div>
         </section>


         
    </main>

@endsection
