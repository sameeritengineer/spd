@extends('layouts.app')

@section('content')
<main>
<section class="Banner_Inner">
         <div class="container-floud">
            <div class="row  justify-c">
               <div class="col-md-12 text-center">
                  <h2>MY ACCOUNT</h2>
                 </div> 
            </div>
         </div>
      </section>    
<section class="section_cartype">
<div id="user" class="container profile">
  <div class="row">
    <div class="col text-center mt-3">
    @if($user->image == null)
      <img src="{{ asset('myassets/images/default-user-profile-picture.jpg') }}" alt="picture" class="img-lg rounded-circle border shadow" />
    @else
    <?php $url = "https://theappkit.s3.us-east-2.amazonaws.com".$user->image; ?>
    <img src="{{$url}}" alt="picture" class="img-lg rounded-circle border shadow" />
    @endif  

      <h2 class="mt-3">{{$user->name}}</h2>
    </div>
  </div>

  <div class="row mt-2">
    <div class="col">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Contact Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Car Information</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <table class="table table-hover table-sm table-properties">
            <tr>
              <th>Email</th>
              <td>{{$user->email}}</td>
            </tr>
            <tr>
              <th>Mobile</th>
              <td>{{$user->mobile}}</td>
            </tr>
            <tr>
              <th>Address</th>
              <td>{{$user->user_information['address']}}<br>
                  {{$user->user_information['address_line']}}<br>
                  {{$user->user_information['city']}}<br>
                  {{$user->user_information['postcode']}}<br>
              </td>
            </tr>
          </table>

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit Profile</button>

        </div>

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          @if($all_cars->isEmpty())  
          <br>
          <h1>No car found</h1>
          @else
           <table class="table table-hover table-sm table-properties">
            @foreach($all_cars as $cars)
            <tr>
              <td>{{$cars->cartype}}</td>
              <td>{{$cars->make}}</td>
              <td>{{$cars->model}}</td>
              <td>{{$cars->year}}</td>
              @if($cars->mode == 0)
              <td data-carid="{{$cars->id}}" class="del_car" data-toggle="modal" data-target="#exampleModaldelete"><div class="dn btn btn-sm btn-danger pull-right pull-down">
    <i class="fa fa-times" aria-hidden="true"></i>
  </div></td>
              @endif
            </tr>
            @endforeach
          </table>
          @endif
        </div>




      </div>
    </div>
  </div>
</div>
</section>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-contact contact_form">
                          <p class="mainform_error"></p>
                          <form id="editProfileForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group">
                                    <label for="usr">User Image </label>
                                    <input class="form-control image" name="image" type="file" id="formFile" />
                                </div>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control form-control-lg"
              placeholder="Enter Your Full Name" required="" />
                                    </div>
                                    <div class="form-group">
                                      <input type="tel" name="mobile" value="{{$user->mobile}}" pattern="^\d{11}$" class="form-control form-control-lg"
              placeholder="Enter 11 digit mobile number" required >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" value="{{$user->user_information['address']}}" id="addess1" class="form-control form-control-lg"
              placeholder="Enter Address Line 1" required="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address_line" value="{{$user->user_information['address_line']}}" id="address2" class="form-control form-control-lg"
              placeholder="Enter Address Line 2" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="city" id="city" value="{{$user->user_information['city']}}" class="form-control form-control-lg"
              placeholder="Enter City/Town" required="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="postcode" value="{{$user->user_information['postcode']}}" id="postcode" class="form-control form-control-lg"
              placeholder="Enter Postcode" required="" />
                                    </div>
                                <button type="submit" class="btn btn-primary">Update</button>



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
</main>

@endsection
