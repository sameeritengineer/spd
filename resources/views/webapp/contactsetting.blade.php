@extends('layouts.app')

@section('content')
<main>
      <section class="selectcartype-section settingssection">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Contact Us</h2></div>
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
                <a href="{{route('home')}}"><button class="tablinks" >My Account</button></a>
                <a href="{{route('faq')}}"><button class="tablinks">FAQ’s</button></a>
                <a href="{{route('contact')}}"><button class="tablinks active">Contact Us</button></a>
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

                    <div id="tabthree" class="tabcustomcontent" style="display: block;">
                    	            @if(Session::get('alert'))
            <div id="successMessage" class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
              <p>{{Session::get('message')}} 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </p>
              
            </div>
              @endif
                    	<form class="form-contact contact_form" action="{{route('contact_form')}}" method="post" id="contactForm">
                    	@csrf 
                      <div class="row perstlrow">
                                   <div class="col-md-12">
                                      <h3 class="cardeltitle mb-2"><b>Contact us</b></h3>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="labelinputtext">Full Name</label>
                                         <input type="text" class="form-control form-control-custom" placeholder="Enter Full Name" name="name" value="{{$user_data->name}}" required="">
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label class="labelinputtext">Email address</label>
                                         <input type="email" name="email" class="form-control form-control-custom" placeholder="Enter email" value="{{$user_data->email}}" required="">
                                       </div>
                                   </div>
                                   <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="labelinputtext"></label>Message
                                       <textarea name="comment" cols="30" rows="9" class="form-control form-control-custom" placeholder="Enter Message" required=""></textarea>
                                     </div>
                                    </div>
                                    <div class="col-md-12"><button class="btn btnownstyle mt-1 mx-w200 btnsendnew" type="submit">Send Messege</button></div>
                     </div>
                 </form>
                    
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
@endsection
