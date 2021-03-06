@extends('layouts.app')
@section('title', 'About Us')

@section('content')
<section class="page-title bg-1">
         <div class="overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="block text-center">
                     <h1 class="text-capitalize mb-5 text-lg">About Company</h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- contact form start -->
      <section class="section abtsection">
        <img class="aftertop" src="{{ asset('myassets/images/after.png') }}" alt="image">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-sm-12 col-md-12">
                  <div class="topabt">
                     <h2>Cleaning Cars Is What We Do !</h2>
                     <p>Since our founding in 2019, we’ve worked with numerous clients and influences throughout the country. Great service begins and ends with experienced and friendly professionals, which is why we put so much consideration into selecting only the best to join our team. We complete projects efficiently and on schedule, and go above and beyond to form lasting relationships with our clients. We have a small team and work very closely together to help undertake a task if need be and to get the job done. Our experience and reviews shows your in the right hands, book an appointment now!</p>
                     <div class="abtimg"> <img class="" src="{{ asset('myassets/images/abtimgone.jpg') }}" alt="image"></div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-4 col-md-4">
                  <div class="abtbt">
                     <h3>100<span>M</span></h3>
                     <h5>App downloads</h5>
                     <p>Lorem ipsum dolor sit amet consectetur adipiscing</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-4 col-md-4">
                  <div class="abtbt">
                     <h3>20<span>M</span></h3>
                     <h5>Active users</h5>
                     <p>Lorem ipsum dolor sit amet consectetur adipiscing</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-4 col-md-4">
                  <div class="abtbt">
                     <h3>35<span>+</span></h3>
                     <h5>Team members</h5>
                     <p>Lorem ipsum dolor sit amet consectetur adipiscing</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="abtimgtext">
         <div class="container">
         <div class="row justify-c">
            <div class="col-lg-6">
               <div class="abtimgtext-rightimg">
                  <img class="" src="{{ asset('myassets/images/abtimg.jpg') }}" alt="image">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="abtimgtext-left">
                  <h2 class="text-md mb-2">The story and mission behind our company</h2>
                  <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipiscing elit vel consectetur fusce lorem elit maecenas et faucibus nulla arcu sem. In semper ipsum eget pellentesque. A feugiat vitae id felis rhoncus tristique. Suscipit diam mi massa et ut euismod nibh quis pretium, ut enim proin lobortis turpis sagittis.</p>
               </div>
            </div>
         </div>
      </section>
@endsection