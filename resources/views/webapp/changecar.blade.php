@extends('layouts.app')

@section('content')
    <main>
      <section class="selectcartype-section">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Change Your Car</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cartypecontainer-section">
         <div class="container">
            <form method="post" action="{{route('change_newcar')}}" >
               	@csrf
               <div class="cardetailmainwrapper mt-3">
               <div class="row">
                  <div class="col-md-12">
                     <h3 class="cardeltitle"><b>Select Car Detail</b></h3>
                  </div>
               </div>
            <div class="steptwocontainer">
               <div class="row daystatusbox justify-content-center selectday">
               	@if(Session::get('alert'))
		        <div id="successMessage" class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
		          <p>{{Session::get('message')}} 
		           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          </p>
		          
		        </div>
              @endif
                 @foreach($all_cars as $cars)
                  <div class="col-md-12">
                     <div class="radiobox">
                     	@if($cars->mode == 1)
                     	<input type="radio" id="{{$cars->id}}" name="id" value="{{$cars->id}}" checked="">
                     	@else
                     	<input type="radio" id="{{$cars->id}}" name="id" value="{{$cars->id}}">
                     	@endif
                     	
                        <label for="{{$cars->id}}">
                           <div class="row no-gutters cardetailbox">
                              <div class="col-md-4">
                                <h4>Make</h4>
                              </div>
                              <div class="col-md-4">
                                 <h4>Model</h4>
                              </div>
                              <div class="col-md-4">
                                 <h4>Year</h4>
                              </div>
                              <div class="col-md-4">
                                 <p>{{$cars->make}}</p>
                               </div>
                               <div class="col-md-4">
                                  <p>{{$cars->model}}</p>
                               </div>
                               <div class="col-md-4">
                                  <p>{{$cars->year}}</p>
                               </div>
                           </div>
                        </label>
                      </div>
                  </div>
                  @endforeach
                  
               </div>
            </div>
            <div class="row">
            <div class="col-md-12">
               <button class="btn btnownstyle mt-4 mx-w300" type="submit">Save</button>
            </div>
            </div>
             </form>
            </div>
            </div>
         </section>
    </main>
@endsection
