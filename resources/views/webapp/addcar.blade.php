@extends('layouts.app')

@section('content')  
<main>
	<section class="Banner_Inner">
         <div class="container-floud">
            <div class="row  justify-c">
               <div class="col-md-12 text-center">
                  <h2>ADD CAR</h2>
                 </div> 
            </div>
         </div>
      </section>  
       <section class="section_cartype">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                <form id="mainForm">
                       <div class="row car_types">
                @foreach($cartypes as $cartype)
                <div class="card col-md-2">
                  <div class="car_t_center">
                    @if(!is_null($cartype->image))<img class="sd_cartype" src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $cartype->image; ?>" alt=""> @endif
  
                    <div class="card-body">
                        <h3 class="card-title">{{$cartype->name}}</h3>
                        <input type="radio" id="cartype_id" name="cartype" value="<?php echo $cartype->id; ?>">
                    </div>
                  </div>
                </div>
                @endforeach
           <div class="inner_selection_cartype">     
           <input type="hidden" id="value_car" name="value_car" value="">
           <input type="hidden" id="licence_plate" name="licence_plate" value="">
           <p class="cartype_error"></p>
           <p class="cartype_success"></p>
           <button type="button" id="add_car">Add car</button>
           </div>
            </div>
           

 
      
          
<div class="row">
                                <button type="submit" class="button button-contactForm boxed-btn main_submitform">Send</button>
                            </div>
          </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="form-outline mb-4 license_form_data">
            <h2>Enter License Plate</h2>
            <br>
            <form id="getplateForm">
            <input type="text" name="licence_plate" id="getplateInput" class="form-control form-control-lg"
              placeholder="Enter Your License Plate" required="" />
             <p class="licence_error"></p>
              <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" id="getplate" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Search</button>
            </form>
          </div>
          </div>
          <div class="response_data"></div> 
                    </div>
                </div>
            </div>
        </section>


</main>

@endsection
