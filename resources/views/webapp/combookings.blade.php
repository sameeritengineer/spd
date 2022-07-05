@extends('layouts.app')

@section('content')
   <main>
      <section class="selectcartype-section summerywrepper">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Completed Bookings</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="cartypecontainer-section">
        <div class="container">
       <div class="row">
        <div class="col-md-12">
          <div class="row secmain">
            <div class="col-md-12 p-0">
              <h3 class="cardeltitle ml-2 mb-4"><b>Bookings</b></h3>
             
              <ul class="nav nav-tabs navtabscustm">
               <li class="nav-item">
                 <a class="nav-link" href="{{route('upcoming-bookings')}}">Upcoming</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link active" href="{{route('completed-bookings')}}">Completed</a>
               </li>
             </ul>
             <div class="tab-content">
               <div class="tab-pane  active" id="home">
                  <div class="row no-gutters">

                  	@if($message == 1)
                  	@foreach($bookings as $booking)
                     <div class="col-md-6 ">
                        <div class="row booking-row">
                           <div class="col-md-12 bidcl">
                           	<h2>Booking ID: {{$booking->order_no}}</h2>
                           	@if($booking->status == 0)
                           	<span class="jobstatus pending">Pending</span>
                            @elseif($booking->status == 1)
                            <span class="jobstatus confirmed">Confirmed</span>
                           	@endif
                           	
                           </div>
                           <div class="col-md-3 bkl">
                              <div class="leftbooking">
                              	@php
                              	$combined_date_and_time = $booking->date . ' ' . $booking->time;
                              	$past_date = strtotime($combined_date_and_time);
                                $date = date("d M", $past_date);
                                $day  = date("D", $past_date);
                                $time  = date("h:i A", $past_date);
                                $deal_data = App\Deal::find($booking->deal_id);
                              	@endphp
                                 <h4>{{$date}}</h4>
                                 <p>{{$day}}</p>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="mdlbooking">
                                 <h6>{{$deal_data->name}}</h6>
                                 <h3>£{{$booking->total}}</h3>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="rightbooking">
                                 <h6>{{$time }}</h6>
                                 <p><a class="btnapplypromo" href="{{route('booking-detail',$booking->id)}}">View</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @else
                     <div class="row booking-row"><h4>{{$message}}</h4></div>
                     @endif

                    
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