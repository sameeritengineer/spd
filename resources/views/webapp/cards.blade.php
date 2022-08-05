@extends('layouts.app')

@section('content')


    <main>
      <section class="selectcartype-section summerywrepper">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Saved Cards</h2></div>
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
                <a href="{{route('saved-cards')}}"><button class="tablinks active" >My Cards</button></a>
                <a href="{{route('upcoming-bookings')}}"><button class="tablinks" >My Bookings</button></a>
                <a href="{{route('faq')}}"><button class="tablinks">FAQ’s</button></a>
                <a href="{{route('contact')}}"><button class="tablinks">Contact Us</button></a>
                <a href="{{route('change-password')}}"><button class="tablinks">Change Password</button></a>
                @auth
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <button>Logout</button>
                </a>
                @endauth

                </div>
                </div>
                <div class="col-md-8">
                  <div class="tabcontaninner">
                    <div id="tabone" class="tabcustomcontent">
                      @if(Session::get('alert'))
            <div id="successMessage" class="alert alert-{{Session::get('alert')}} alert-dismissible" role="alert">
              <p>{{Session::get('message')}} 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </p>
              
            </div>
              @endif


                 @if(!empty($cards->data))   
      <div class="row saved_cards_custmer">
        <div class="col-md-6">
        	<h3 class="cardeltitle mb-2"><b>My Saved Cards</b></h3>
        </div>
        <div class="col-md-6">
          <button data-toggle="modal" data-target="#exampleModaladdcard" class="addmycard">Add card</button>
        </div>
        @foreach($cards as $card)
         <div class="col-md-6">
        <div card-id="{{$card->id}}" class="credit-card mycards {{strtolower($card->brand)}} selectable">
        <div class="credit-card-last4">
            {{$card->last4}}
        </div>
        <div class="credit-card-expiry">
            {{$card->exp_month}}/{{$card->exp_year}}
        </div>
        <svg data-toggle="modal" data-target="#exampleModal" class="del-credit-card" card-id="{{$card->id}}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path  d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
       </div>
       </div>
       @endforeach
      </div>
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
      </section>      


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header padcustom">
         <h5 class="modal-title" id="exampleModalLabel">You want to remove Card?</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
           <form method="post" action="{{route('delete-card')}}">
            @csrf
           <input type="hidden" id="card_id" name="card_id" value="">
           <button type="submit" class="btn btnownstyle mt-4 mx-w300">Remove</button>
         </form>
       </div>
     </div>
   </div>
 </div>  

 <div class="modal fade" id="exampleModaladdcard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header padcustom">
         <h5 class="modal-title" id="exampleModalLabel">Please Add your Card Details</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
                   <div class="cell example example1" id="example-1">
        <form id="publishform" method="post" action="{{route('add-card')}}">
          @csrf
          <fieldset>
            <div class="row">
              <div id="example1-card"></div>
            </div>
          </fieldset>
          <input type="hidden" name="stripe_id" class="token">
          <button type="submit" data-tid="elements_examples.form.pay_button">Add card</button>
          <div class="error" role="alert">
            <span class="message"></span></div>
        </form>



      </div> 
       </div>
     </div>
   </div>
 </div>   
   
      </main>
<script type="text/javascript">
$(document).on('click','.del-credit-card',function(){
   var id = $(this).attr('card-id');
   $("#card_id").val(id);
   
  });
</script>      
@endsection      