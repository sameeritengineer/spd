@extends('layouts.app')

@section('content')
    <main>
      <section class="selectcartype-section summerywrepper">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Booking Detail</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
@if($message == 1)
      <section class="summerypagedes">
         <div class="container">
          @php
            $combined_date_and_time = $booking->date . ' ' . $booking->time;
            $past_date = strtotime($combined_date_and_time);
            $date = date("d M", $past_date);
            $day  = date("D", $past_date);
            $time  = date("h:i A", $past_date);
            $deal_data = App\Deal::find($booking->deal_id);
            $cartypes = App\Cartype::find($booking->cartype_id);
            @endphp
            <div class="row">
               <div class="col-md-12 mainboxbooking">
                  <div class="row">
                     <div class="col-md-6 bidcl"><h2>Booking ID: {{$booking->order_no}}</h2></div>
                     <div class="col-md-6">
                        <p class="bookingndt">{{$day}} {{$date}} {{$time}}</p>
                     </div>
                  </div>
                  <div class="row carinfomain bxm">
                     <div class="col-md-12">
                        <h2><b>Car Information</b></h2>
                     </div>
                     <div class="col-md-4">
                      <p>Licence Plate</p>
                      <h5>{{$booking->licence_plate}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Make</p>
                        <h5>{{$booking->model}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Year</p>
                        <h5>{{$booking->year}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Vehicle Type</p>
                        <h5>{{$cartypes->name}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Model</p>
                        <h5>{{$booking->model}}</h5>
                     </div>
                     <div class="col-md-4">
                        <div class="imgmainsm">
                           @if(!is_null($deal_data->s_image)) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal_data->s_image; ?>" class="wcm"> @endif
                        </div>
                     </div>
                  </div>
                  <div class="row addressboxmain bxm ">
                     <div class="col-md-12">
                        <h2><b>Booking Information</b></h2>
                     </div>
                     <div class="col-md-12 mt-2">
                        <h5>{{$deal_data->name}}</h5>
                     </div>
                     <div class="col-md-4">
                      <p>Wash Price</p>
                      <h5>£{{$deal_data->price}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Service Fee</p>
                        <h5>£{{$booking->service_fee}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Total </p>
                        <h5>£{{$booking->total}}</h5>
                     </div>
                  </div>
                  <div class="row addressboxmain bxm ">
                     <div class="col-md-12">
                        <h2><b>Job Detail</b></h2>
                     </div>
                     <div class="col-md-4">
                      <p>Date</p>
                      <h5>{{$day}} {{$date}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Time</p>
                        <h5>{{$time}}</h5>
                     </div>
                     <div class="col-md-4">
                        <p>Payment Receipt </p>
                        <p><a class="btnapplypromo" href="{{$booking->payment_recipt}}">View</a></p>
                     </div>
                  </div>
                  <div class="row perstlrow no-gutters">
            <div class="col-md-12 p-0">
              <!-- <h3 class="cardeltitle"><b>Car Images</b></h3> -->
              @php
              $value =$booking->booking_images;
              @endphp
           </div>
           @foreach($value as $val)
             @if($val->type == 'before')
             <div class="col-md-12">
               <h5 class="cardeltitlen"><b>Before Washing</b></h5>
               <p class="totalprice">
                <img class="carimgwash" src="{{$val->image}}" alt="image">
               </p>
            </div>
             @else
             <div class="col-md-12">
               <h5 class="cardeltitlen"><b>After Washing</b></h5>
               <h6 class="totalprice">
                <img class="carimgwash" src="{{$val->image}}" alt="image">
               </h6>
            </div>
             @endif
           @endforeach
           @if($booking->status == 2)
           @php
            $review = \App\OrderReview::where('order_id', $booking->id)->first();
           @endphp
           @if($review->id)
          <section class='rating-widget'>
        <div class='rating-stars text-center'>
          <ul id=''>
            <?php 
    $select=$review->rateing;
    $a=5-$select;
    $j=1;

    for ($i=1; $i<=$select; $i++) 
    { 
        echo "<li class='star selected' title='Poor' data-value='1'>
              <i class='fa fa-star fa-fw'></i>
            </li>"; 
        if($i==$select){
            for ($j=1; $j<=$a; $j++){
                echo "<li class='star'>
              <i class='fa fa-star fa-fw'></i>
            </li>";
            }
        }
    }
?>
          </ul>
        </div>
  <p>{{$review->comment}}</p>
</section>
           @else
           <div class="col-md-12 ">
               <p><a data-toggle="modal" data-target="#washrating" class="btnapplypromo" href="#">Rate Order</a></p>
             </div>
           @endif
           @endif  
         </div>


                  

    
               </div>
            </div>
         </div>
         </div>
      </section>
      @else
      <div class="row booking-row"><h4>{{$message}}</h4></div>
      @endif      
 
    </main>
     <div class="modal fade modalcustom mdlrating" id="washrating" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header padcustom">
            <h5 class="modal-title" id="exampleModalLongTitle"><b>Rate Your Expirence</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="logopop"><a href="#"><img class="headerlogo" src="{{ asset('myassets/images/logo.png') }}" alt="image"></a></div>
            


<section class='rating-widget'>
  <p class="rate_error"></p>
  <!-- Rating Stars Box -->
  <div class='rating-stars text-center'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
    </ul>
  </div>
  
</section>



            <form id="ratingForm" method="post" action="{{route('add-order-review')}}">
              @csrf
            <div class="form-group">
              <input type="hidden" id="rateing" name="rateing" value="0">
              <input type="hidden" name="order_id" value="{{$booking->id}}">
               <label class="labelinputtext"></label>Comment
               <textarea id="rate_comment" name="comment" class="form-control form-control-custom" placeholder="Leave a Comment...." ></textarea>
             </div>
             <button id="rateform" class="btn btnownstyle mt-1 w-100 btnsendnew" type="button">Submit</button>
           </form>
          </div>
        </div>
      </div>
    </div> 
<script type="text/javascript">
  $(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
    /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    $("#rateing").val(ratingValue);
    //alert(ratingValue);
  });
  $('#rateform').on('click', function(){
   var rate = $("#rateing").val();
   if(rate == 0){
     $('.rate_error').text("Please rate us");
   }else if(!$("#rate_comment").val()){
     $('.rate_error').text("Please Enter Comment");
   }else{
    $("#ratingForm").submit();
   }
  });

  
});
</script>      
@endsection