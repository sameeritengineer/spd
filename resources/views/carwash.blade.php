@extends('layouts.app')
@section('title', 'Carwash')

@section('content')
  <main>
      <section class="selectcartype-section settingssection">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="bannerimgmain">
                <div class="bannerimgmain-box"><img class="footerlogoimg w-100" src="{{ asset('final_myassets/images/settings.jpg') }}" alt="image"></div>
                <div class="pagetitletopbanner"><h2 class="titletext">Car Wash</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="ownimg-section aboutus-para">
        <div class="container">
           <div class="row no-gutters">
           	<div class="col-md-7 abgitouttop-right">
           		<div class="appdownload-right-services">
                 <h2 class="abouttop-sec-title">Car Wash</h2>
                 <p>We do everything from car cleaning, sanitation services and valeting. To detailing & machine polishing.</p>
                     <p>Our standard in and out clean includes a thorough clean inside the car wiping everything down, removing dust and dirt and giving a deep vacuum of the whole car.</p>
                     <p>Our deeper valets include all of the above plus a deep upholstery shampoo of all the fabrics in the car removing any tough stains and odours.</p>
                     <p>Our more intense valets include all of the above plus a deep upholstery shampoo to the chairs and floors of the vehicle removing any tough stains and odours. If you have leather seats, not to worry as it will be the same process but with different tools to get the job done.</p>
                 </div>
                </div>
            <div class="col-md-5">
              <div class="ownimg-img-left"><img class="w-100 img-fluid" src="{{ asset('final_myassets/images/cars/carwas9.jpg') }}" alt="image"></div> 
           </div>
           </div>
        </div>
     </section>
     <section class="ItemfullBlock py-8 py-md-10 py-lg-14 py-xl-22">
				<div class="container">
					<div class="row align-items-center">
							<div class="col-12 col-sm-7 col-xl-6">
								<h2 class="fwSemi mb-5 mb-sm-0">We’re dedicated to providing best quality service</h2>
							</div>
							<div class="col-12 col-sm-5 col-xl-6 text-sm-right">
								@auth
                  <a class="btnThemeAlt" href="{{route('book')}}">Book Now</a>
                  @else
                  <a class="btnThemeAlt" href="{{route('getpostcode')}}">Book Now</a>
                 @endauth
							</div>
						</div>
					<div class="row justify-content-center isoContentHolder mb-5 mb-lg-3 carwash">
						<div class="col-12 col-md-6 col-lg-4 isoCol washing interior">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas1.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
								<!-- <div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">Sheet Cleaning</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Washing, Interior</strong>
									</h5>
								</div> -->
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas3.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas4.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas5.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas6.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas7.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas8.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas9.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/cars/carwas10.jpg') }}" class="img-fluid w-100" alt="image description">
								</div>
							</article>
						</div>
						
						
					</div>
				</div>
			</section>
    
      



    </main>
@endsection