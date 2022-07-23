@extends('layouts.app')

@section('content')
 <main>
      <section class="selectcartype-section">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Select Your Package</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
            <section class="cartypecontainer-section">
         <div class="container">
            <div class="stepthreecontainer">
               <div class="row daystatusbox servicesselect">
                @foreach($deals as $deal) 
                  <div class="col-md-6">
                     <div class="radiobox"><input type="radio" id="deal_<?php echo $deal->id; ?>" class="deal_id" name="dealtype" value="<?php echo $deal->id; ?>">
                        <label for="deal_<?php echo $deal->id; ?>">
                           <div class="selectservicetype"> 
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="bannerimgmain-box">
                                  @if(!is_null($deal->image)) <img class="serimg w-100" src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal->image; ?>"> @endif
                                </div>
                              </div>
                              <div class="col-md-8 text-left service-right">
                                 <h3>{{$deal->name}}</h3>
                                 <h6><span>@if($deal->hour>0){{$deal->hour}}@endif @if($deal->hour==1)hour @elseif($deal->hour>1)hours @endif</span><span> @if($deal->minute>0){{$deal->minute}} minutes @endif</span></h6>
                                 <p>{{$deal->description}}</p>
                                 <h4>£ {{$deal->price}}</h4>
                                 <a class="serviceincbtn btn btn-primary Si-deal" data-title="{{$deal->name}}"  data-did="{{$deal->id}}" data-toggle="modal" data-target="#exampleModal">Service Includes</a>
                              </div>
                           </div>
                           </div>
                        </label>
                      </div>
                  </div>
                @endforeach  

               </div>
            </div>

            </div>
         </section>  
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header padcustom">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       </div>
     </div>
   </div>
 </div>                
</main>

<script type="text/javascript">
$(document).on('click','.deal_id',function(){
   var id = $(this).val();
   localStorage.setItem("deal_id", id);
   localStorage.setItem("step2",'completed');
   window.location.href = "{{ route('get-time')}}";

  });
$(document).ready(function(){
   var step1 = localStorage.getItem("step1");
   if(step1 == 'completed'){
    var deal_id = localStorage.getItem("deal_id");
    $("#deal_"+deal_id).attr('checked','checked') 
   }else{
    window.location.href = "{{ route('get-cartypes')}}";
   }
});
</script>
@endsection

