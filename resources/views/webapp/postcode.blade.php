@extends('layouts.app')

@section('content')
      <main>
      <section class="login-section">
         <div class="container-fluid p-0">
            <div class="row justify-content-center no-gutters">
               <div class="col-md-6">
                  <div class="login-left" >
                     <h2>Bringing back that new vehicle feeling</h2>
                     <form action="{{route('checkpostcode')}}" method="post">
                      @csrf
                     <div class="form-group">
                        <label class="labelinputtext">Postcode</label>
                        <input type="text" name="postcode" id="form3Example3" class="form-control"
              placeholder="Enter a valid postcode" required="" />
                        @if(Session::get('alert'))
        <div id="successMessage" class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
          <p>{{Session::get('message')}} 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </p>
          
        </div>
    @endif
                      </div>
                      <div class="form-group mt-4">
                        <button class="btn btnownstyle" type="submit">Search Location</button>
                      </div>
                    </form>
                      <div class="form-group">
                        <p class="cerateaclink">Don’t have an account ?<a href="{{route('login')}}">Log In</a></p>
                      </div>
                      
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="loginright">
                     <img class="loginrightimg w-100" src="{{ asset('final_myassets/images/loginimgmain.png') }}" alt="image">
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>
<!-- <main>
<section class="section abtsection">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-4">
        <img src="{{ asset('assets/img/gallery/postwash.jpg') }}"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      	<br><br>
        <form action="{{route('checkpostcode')}}" method="post">
        	@csrf

          <div>
          	<h2>BRINGING BACK THAT NEW CAR FEELING</h2>
          	<br>
            <input type="text" name="postcode" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid postcode" required="" />
            <label class="form-label" for="form3Example3">Search Location</label>
          </div>
          @if(Session::get('alert'))
				<div id="successMessage" class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
				  <p>{{Session::get('message')}} 
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </p>
				  
				</div>
		@endif
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Search</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a class="search_location" href="{{route('login')}}" >Login</a></p>

        </form>
      </div>
    </div>
  </div>
</section>
</main> -->

@endsection