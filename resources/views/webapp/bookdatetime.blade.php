@extends('layouts.app')

@section('content')
 <main>
      <section class="selectcartype-section">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Select Date And Time</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
            <section class="cartypecontainer-section">
         <div class="container">
         <form id="mainFormInner" class="innerbook">
           <div class="stepfourcontainer">
            <div class="row">
              <div class="col-lg-6"><div id="datepicker"></div></div>
              <div class="col-lg-6">
                  <div class="selector selector_worktime">

                  </div>
              </div>
            </div>
              <div class="inner_selection_cartype">
              <p class="worktime_error"></p>
              </div>
              <div class="row">
               <div class="col-md-12">
                  <input type="hidden" id="formvaluedata" name="formvaluedata" value="1">
                  <input type="hidden" id="dealtype" name="dealtype" value="">
                  <input type="hidden" id="book_date" name="book_date" value="">
                  <button class="btn btnownstyle mt-4 mx-w300" type="button" id="next2">Next</button>
               </div>
               </div>
             </div>
         </form>

            </div>
         </section>                 
</main>

<script type="text/javascript">
$(document).ready(function(){
    var date = $.datepicker.formatDate('yy-mm-dd', new Date());
    $('#book_date').val(date);
    var token = $('meta[name="csrf-token"]').attr('content');
   $.ajax({
                     _token: token,
                     url: "{{ route('workingday_time') }}",
                     type: "POST",
                     data: {
                         "date": date,
                             },
                             success: function(response) {
                              if(response.status == true){
                                $('.selector_worktime').html(response.payload);
                            }else{
                                $('.selector_worktime').html(response.message);
                            }
                             },
                          });
});

$(document).on('click','#next2',function(){
    if($('input[name=selector]:checked').length > 0) {
     $('.worktime_error').text('');
     $("#mainFormInner").submit();
     //window.location.href = "{{ route('create-account')}}";
  }else{
      $('.worktime_error').text('Please Select Date and Time Slot');
    }

 });
$('#mainFormInner').on('submit', function (e) {
     e.preventDefault();
     var token = $('meta[name="csrf-token"]').attr('content');
     var form = $("#mainFormInner");
     
      $.ajax({
             _token: token,
             url: "{{ route('main_form') }}",
             type: "POST",
             data: form.serialize(),
                     success: function(response) {
                       console.log(response);
                       if(response.status == false){
                       $('.mainform_error').text(response.message);
                       }else{
                        window.location.href = "{{ route('summary')}}";
                       }
                     },
                  });
});
$(document).ready(function(){
   var step1 = localStorage.getItem("in_step2");
   if(step1 == 'completed'){
      //window.location.href = "{{ route('create-account')}}";
      var dealtype = localStorage.getItem("deal_id");
      $("#dealtype").val(dealtype);
    }else{
     window.location.href = "{{ route('book')}}";
    }
});
</script>
@endsection

