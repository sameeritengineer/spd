@extends('layouts.app')

@section('content')
<main>
<section class="Banner_Inner">
         <div class="container-floud">
            <div class="row  justify-c">
               <div class="col-md-12 text-center">
                  <h2>Book</h2>
                 </div> 
            </div>
         </div>
      </section>    
<!-- <section class="section_cartype">
<div>
	<a href="{{route('add-car')}}"><button type="button" class="btn btn-primary">Add Car</button></a>
	<a href="{{route('change-car')}}"><button type="button" class="btn btn-primary">Change Car</button></a>
</div>
</section> -->

 <section class="section_cartype">

<div class="container">
              <div>
                <a class="back_page bk_deals" href="#"><span>Back</span></a>
                <a class="back_page bk_worktime" href="#"><span>Back</span></a>
              </div>
                <div class="row">
                    <div class="col-12">
<div class="car_option">
  <a href="{{route('add-car')}}"><button type="button" class="btn btn-primary">Add Car</button></a>
  <a href="{{route('change-car')}}"><button type="button" class="btn btn-primary">Change Car</button></a>
</div>
                        <h2 class="contact-title ct-deals-inner">Select Your Package</h2>
                        <h2 class="contact-title ct-work_time">Select Date And Time</h2>
                    </div>
                    <div class="col-lg-8">
           <form id="mainFormInner" class="innerbook">
            <input type="hidden" id="formvaluedata" name="formvaluedata" value="1">
            <input type="hidden" id="book_date" name="book_date" value="">
            <div class="row car_deals">
              <div id="basic" class="tab-pane fade show active">
@foreach($deals as $deal) 
<div class="box shadow-sm mb-3 rounded bg-white ads-box">
<div class="p-3 border-bottom">
<h2 class="font-weight-bold ">{{$deal->name}}
<input type="radio" class="deal_id" name="dealtype" value="<?php echo $deal->id; ?>">
</h2>
<div class="thecontent">
<div class="image">
   @if(!is_null($deal->image)) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal->image; ?>" style="width:100px;height:100px"> @endif
</div>
<div class="body">
  <p class="mb-0 text-muted">{{$deal->description}}</p>
  <p><span>@if($deal->hour>0){{$deal->hour}}@endif @if($deal->hour==1)hour @elseif($deal->hour>1)hours @endif</span><span> @if($deal->minute>0){{$deal->minute}} minutes @endif</span>
  </p>
  <button type="button" class="btn btn-primary Si-deal" data-title="{{$deal->name}}"  data-did="{{$deal->id}}" data-toggle="modal" data-target="#exampleModal">
  Service Includes
  </button>
</div>
</div>
</div>
<div class="p-2">
£{{$deal->price}}
</div>
</div>
@endforeach

</div>
            </div>
<div class="row work_time">
<div class="col-lg-6"><div id="datepicker"></div></div>
<div class="col-lg-6">
    <div class="selector selector_worktime">
        <!-- <div class="selecotr-item">
            <input type="radio" id="radio1" name="selector" class="selector-item_radio">
            <label for="radio1" class="selector-item_label">9 AM</label>
        </div>-->
    </div>
</div>
<div class="inner_selection_cartype">
<p class="worktime_error"></p>
<button type="button" id="next-2">Next</button>
</div>
</div>

      
          
<div class="row">
                                <button type="submit" class="button button-contactForm boxed-btn main_submitform mainFormInnerSubmit">Send</button>
                            </div>
          </form>
                    </div>
                    
          <div class="response_data"></div> 
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</main>

@endsection
