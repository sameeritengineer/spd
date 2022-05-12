@extends('layouts.app')

@section('content')
<main>
        <!--? Hero Start -->
        <div class="container-fluid">
            <div class="slider-area2">
                <div class="slider-height2 hero-overly d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="hero-cap hero-cap2">
                                    <h2>Services</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Pricing Card Start -->
        <section class="pricing-card-area fix section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10">
                        <div class="section-tittle text-center mb-90">
                            <h2>We offer best Wash Deals to our customer</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                @foreach($deals as $deal) 
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                        <div class="single-card text-center mb-30">
                            <div class="card-top">
                                @if(!is_null($deal->image)) <img src="https://dev.theappkit.co.uk/Splash-and-drip/public/images/<?php echo $deal->image; ?>" style="width:100px;height:100px"> @endif
                                <h4>{{$deal->name}}</h4>
                                <p>{{$deal->description}}</p>
                            </div>
                            <div class="card-mid">
                                <h4>€{{$deal->price}}</h4>
                            </div>
                            <div class="card-bottom">
                                <ul>
                                @php

                                $service_ids = App\Dealservice::where('deal_id', $deal->id)->pluck('service_id')->toArray();
                                $services = App\Service::WhereIn('id', $service_ids)->pluck('name')->toArray();
                                
                                @endphp    
                                @foreach($services as $service)
                                    <?php echo '<li> '. $service .'</li>'; ?>
                                @endforeach
                                </ul>
                                <a href="#" class="borders-btn">Get Started</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
        </section>
        <!-- Pricing Card End -->
        <!--? Testimonial Area Start -->
        <section class="testimonial-area testimonial-padding fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="about-caption pb-bottom">
                            <!-- Testimonial Start -->
                            <div class="h1-testimonial-active dot-style">
                                <!-- Single Testimonial -->
                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="{{ asset('assets/img/icon/quotes-sign.svg') }}" alt="" class="quotes-sign">
                                        <p>"The automated process starts as soon as your clothe go into the machine. This site outcome is gleaming clothe to the placeholder text commonly</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="{{ asset('assets/img/icon/testimonial.svg') }}" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Testimonial -->
                                <div class="single-testimonial position-relative">
                                    <div class="testimonial-caption">
                                        <img src="{{ asset('assets/img/icon/quotes-sign.svg') }}" alt="" class="quotes-sign">
                                        <p>"The automated process starts as soon as your clothe go into the machine. This site outcome is gleaming clothe to the placeholder text commonly</p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center">
                                        <div class="founder-img">
                                            <img src="{{ asset('assets/img/icon/testimonial.svg') }}" alt="">
                                        </div>
                                        <div class="founder-text">
                                            <span>Robart Brown</span>
                                            <p>Creative designer at Colorlib</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Testimonial End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- testimonial-right img -->
            <div class="testimonial-right-img">
                <img src="{{ asset('assets/img/gallery/testimonial-right-img.png') }}" alt="">
            </div>
        </section>
        <!--? Testimonial Area End -->
        <!--? Services Area Start -->
        <section class="categories-area section-padding40">
            <div class="container">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-10 col-sm-11">
                        <div class="section-tittle mb-60">
                            <h2>Why take our services?</h2>
                            <p>Duis aute irure dolor inasfa reprehenderit in voluptate velit esse cillum reeut 
                            cupidatatfug nulla pariatur. Excepteur sintxsdfas occaecat.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/services1.svg') }}" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Car wash 100% without detergents</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/services2.svg') }}" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Efficient surface drying machines</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/services3.svg') }}" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>We have an application</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="cat-icon">
                                <img src="{{ asset('assets/img/icon/services4.svg') }}" alt="">
                            </div>
                            <div class="cat-cap">
                                <h5>Safe lacquer protection</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--? Services Area End -->
    </main>
@endsection
