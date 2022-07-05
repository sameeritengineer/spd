@extends('layouts.app')

@section('content')
<main>
      <section class="selectcartype-section settingssection">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">My Account</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cartypecontainer-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mt-4">
              <h3 class="cardeltitle"><b>Settings</b></h3>
            </div>
            <div class="col-md-12 mt-4">
              <div class="row">
                <div class="col-md-4">
                <div class="tabcustom">
                <a href="{{route('home')}}"><button class="tablinks active" >My Account</button></a>
                <a href="{{route('upcoming-bookings')}}"><button class="tablinks" >My Bookings</button></a>
                <a href="{{route('faq')}}"><button class="tablinks">FAQ’s</button></a>
                <a href="{{route('contact')}}"><button class="tablinks">Contact Us</button></a>
                <a href="{{route('change-password')}}"><button class="tablinks">Change Password</button></a>
                @auth
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <button>Logout</button>
                </a>
                @endauth
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
                </div>
                </div>
                <div class="col-md-8">
                  <div class="tabcontaninner">
                    <div id="tabone" class="tabcustomcontent">
                     <!-- Nav tabs -->
<ul class="nav nav-tabs navtabscustm">
   <li class="nav-item">
     <a class="nav-link active" data-toggle="tab" href="#home">Contact Information</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" data-toggle="tab" href="#menu1">Car Information</a>
   </li>
 </ul>
 <a class="editinfobtn" data-toggle="modal" data-target="#editprofile" href=""><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Info</a>
 
 <!-- Tab panes -->
 <div class="tab-content">
   <div class="tab-pane container active" id="home">
      <div class="row perstlrow no-gutters">
         <div class="col-md-5">
            <p>Email</p>
         </div>
         <div class="col-md-7">
            <h6>{{$user->email}}</h6>
         </div>
         <div class="col-md-5">
            <p>Mobile Number</p>
         </div>
         <div class="col-md-7">
            <h6>{{$user->mobile}}</h6>
         </div>
         <div class="col-md-5">
            <p>Address</p>
         </div>
         <div class="col-md-7">
            <h6>{{$user->user_information['address']}}<br>
                  {{$user->user_information['address_line']}}<br>
                  {{$user->user_information['city']}}<br>
                  {{$user->user_information['postcode']}}<br></h6>
         </div>
      </div>
   </div>
   <div class="tab-pane container fade" id="menu1">
      
      <div class="steptwocontainer">
               <div class="row daystatusbox justify-content-center selectday">

         @if($all_cars->isEmpty())  
          <br>
          <h1>No car found</h1>
          @else
          @foreach($all_cars as $cars)
           <div class="col-md-12">
                     <div class="radiobox">
                           <div class="cardetailbox">
                            @if($cars->mode == 0)
              <div data-carid="{{$cars->id}}" data-toggle="modal" data-target="#exampleModaldelete" class="del_car dn btn btn-sm btn-danger pull-right pull-down">
    <i class="fa fa-times" aria-hidden="true"></i>
  </div>
              @endif
                             <div class="row">
                             <div class="col-md-3">
                                <h4>Car Type</h4>
                              </div>
                              <div class="col-md-3">
                                <h4>Make</h4>
                              </div>
                              <div class="col-md-3">
                                 <h4>Model</h4>
                              </div>
                              <div class="col-md-3">
                                 <h4>Year</h4>
                              </div>
                             </div>
                            <div class="row">
                              <div class="col-md-3">
                                 <p>{{$cars->cartype}}</p>
                               </div>
                              <div class="col-md-3">
                                 <p>{{$cars->make}}</p>
                               </div>
                               <div class="col-md-3">
                                  <p>{{$cars->model}}</p>
                               </div>
                               <div class="col-md-3">
                                  <p>{{$cars->year}}</p>
                               </div>
                           </div>
                           </div>
                      </div>
                  </div>
           @endforeach        
          @endif
                  


               </div>
            </div>

   </div>
 </div>
                     
                    </div>
                    
                    


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
<!-- Modal -->
<div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this car?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('remove_car')}}" method="post" metod="post">
         @csrf   
        <input type="hidden" name="del_car" id="del_car" value="">
        <button type="submit" class="btn btn-secondary remove_car">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modalcustom" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header padcustom">
            <h5 class="modal-title" id="exampleModalLongTitle"><b>Edit Profile</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="mainform_error"></p>
               <form id="editProfileForm" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                 <div class="signleft">
                    <div class="row">
                       <div class="col-md-12">
                          <h3 class="cardeltitle mt-4 mb-2"><b>Basic Info</b></h3>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                             <label class="labelinputtext">Full Name</label>
                             <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control form-control-custom"
              placeholder="Enter Your Full Name" required="" />
                           </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                             <label class="labelinputtext">Mobile Number</label>
                             <input type="tel" name="mobile" value="{{$user->mobile}}" pattern="^\d{11}$" class="form-control form-control-custom"
              placeholder="Enter 11 digit mobile number" required >
                           </div>
                       </div>
                    </div>
                 </div>


              </div>
              <div class="col-md-12">
                 <div class="signright">
                    <div class="row">
                       <div class="col-md-12">
                          <h3 class="cardeltitle mt-3 mb-2"><b>Address</b></h3>
                       </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label class="labelinputtext">Address Line 1</label>
                          <input type="text" name="address" value="{{$user->user_information['address']}}" id="addess1" class="form-control form-control-custom"
              placeholder="Enter Address Line 1" required="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label class="labelinputtext">Address Line 2</label>
                          <input type="text" name="address_line" value="{{$user->user_information['address_line']}}" id="address2" class="form-control form-control-custom"
              placeholder="Enter Address Line 2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label class="labelinputtext">City/Town</label>
                          <input type="text" name="city" id="city" value="{{$user->user_information['city']}}" class="form-control form-control-custom"
              placeholder="Enter City/Town" required="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label class="labelinputtext">Post Code</label>
                          <input type="text" name="postcode" value="{{$user->user_information['postcode']}}" id="postcode" class="form-control form-control-custom"
              placeholder="Enter Postcode" required="" />
                        </div>
                    </div>
                 </div>
                 </div>
             
              </div>
           </div>
           <div class="row">
            <div class="col-md-12">
               <button type="submit" class="btn btnownstyle mt-4 mx-w300 btnbook">Update</button>
            </div>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
<!-- <section class="Banner_Inner">
         <div class="container-floud">
            <div class="row  justify-c">
               <div class="col-md-12 text-center">
                  <h2>SETTINGS</h2>
                 </div> 
            </div>
         </div>
      </section> 
<section class="section_cartype">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Settings') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="{{route('my-account')}}">My Account</a></li>
                        <li><a href="{{route('faq')}}">Faq</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="">Change Password</a></li>
                        @auth<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    Logout
</a>    </li>@endauth
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form></li>
                    </ul>

{{ __('You are logged in!') }} 
                </div>
            </div>
        </div>
    </div>
</div>
</section> -->
@endsection

