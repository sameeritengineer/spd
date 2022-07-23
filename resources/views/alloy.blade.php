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
                <div class="pagetitletopbanner"><h2 class="titletext">Alloy Wheels</h2></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="ownimg-section aboutus-para">
        <div class="container">
           <div class="row no-gutters">
           	<div class="col-md-7 abgitouttop-right">
                 <h2 class="abouttop-sec-title">Alloy Wheels</h2>
                 <p>If that isn’t enough for your vehicle then we can also do your alloys on the same day and bring them back to life, restoring them to OEM condition.</p>
                     <p>Whether you want diamond cut or standard alloy refurbs we are the people for you! With standard alloy refurbs we sand down the original paint on the alloys, refurb them and spray them to a a choice of silver or black.</p>
                     <p>Diamond cut alloys are done with our special machine for a sleek finish.</p>
                </div>
            <div class="col-md-5">
              <div class="ownimg-img-left"><img style="border-radius: 20px" class="w-100 img-fluid" src="{{ asset('final_myassets/images/alloy.jpg') }}" alt="image"></div> 
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
					<div class="row justify-content-center isoContentHolder mb-5 mb-lg-3">
						<div class="col-12 col-md-6 col-lg-4 isoCol washing interior">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img25.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">Sheet Cleaning</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Washing, Interior</strong>
									</h5>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img26.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">Interior Dusting</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Auto Detail</strong>
									</h5>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol exterior">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img27.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">Hand Polishing</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Exterior</strong>
									</h5>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol autoDetail">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img28.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">Wax With Carnauba</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Auto Detail</strong>
									</h5>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol washing">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img29.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">Machine Washing</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Washing</strong>
									</h5>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol interior">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img30.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">Dashboard Cleaning</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Interior</strong>
									</h5>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol washing interior">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img31.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">RMW Mini Cooper</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Washing, Interior</strong>
									</h5>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol washing repair">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img32.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="p#">Scratch Repairing</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Washing, Repair</strong>
									</h5>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4 isoCol exterior">
							<!-- gPhoColumn -->
							<article class="gPhoColumnGrid position-relative overflow-hidden mb-lg-4">
								<div class="imgWrap">
									<img src="{{ asset('final_myassets/images/work/img33.png') }}" class="img-fluid w-100" alt="image description">
								</div>
								<div class="gPhootCaptionWrap px-3 py-2 px-sm-5 py-sm-4">
									<h5 class="h5 text-center">
										<a href="#">Headlight Restoring</a>
										<strong class="pgCategory font-weight-normal text-uppercase d-block">Exterior</strong>
									</h5>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>
    
      



    </main>
@endsection