@extends('layouts.app')

@section('content')
<main>
      <section class="selectcartype-section settingssection">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">FAQ’s</h2></div>
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
                <a href="{{route('saved-cards')}}"><button class="tablinks" >My Cards</button></a>
                <a href="{{route('upcoming-bookings')}}"><button class="tablinks" >My Bookings</button></a>
                <a href="{{route('faq')}}"><button class="tablinks active">FAQ’s</button></a>
                <a href="{{route('contact')}}"><button class="tablinks">Contact Us</button></a>
                <a href="{{route('home')}}"><button class="tablinks">Change Password</button></a>
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

                    <div id="tabtwo" class="tabcustomcontent">
                     <div class="row ">
                        <div class="col-md-12 faqcol">
                           <h3 class="cardeltitle mb-2"><b>FAQ’s</b></h3>
                           <div id="accordion" class="accordion customeaccordion">
                            <div class="card customecard">
                              @foreach($faqs as $faq)
                                <div class="card-header collapsed" data-toggle="collapse" href="#collapse_{{$faq->id}}">
                                    <a class="card-title">
                                      {{$faq->question}}
                                    </a>
                                </div>
                                <div id="collapse_{{$faq->id}}" class="card-body collapse" data-parent="#accordion" >
                                    <p>{{$faq->answer}}
                                    </p>
                                </div>

                              @endforeach  
                               
                                
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
@endsection
