@extends('layouts.app')

@section('content')
<main>
<section class="vh-100">
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

          <!-- Email input -->
          <div class="form-outline mb-4">
          	<h2>BRINGING BACK THAT NEW CAR FEELING</h2>
          	<br>
            <input type="text" name="postcode" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid postcode" required="" />
            <label class="form-label" for="form3Example3">Search Location</label>
          </div>
          @if(Session::get('alert'))
				<div id="successMessage" class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
				  <p>{{Session::get('message')}} </p>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
		@endif

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Search</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a class="search_location" href="#!" >Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
</main>

@endsection