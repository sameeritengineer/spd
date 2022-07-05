@extends('layouts.app')
@section('title', 'About Us')

@section('content')
  <main>
      <section class="ownimg-section">
        <div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5">
         <div class="payment">
            <div class="payment_header">
               <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
            </div>
            <div class="content">
               @if($value == 'success')
               <h1 class="alert {{$value}}">Payment Success !</h1>
               @else
               <h1 class="alert {{$value}}">Payment Issue !</h1>
               @endif
               <p>{{$message}}</p>
               <a href="{{route('upcoming-bookings')}}">See Booking</a>
            </div>
            
         </div>
      </div>
   </div>
</div>
     </section>
    </main>
@endsection