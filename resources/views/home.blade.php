@extends('layouts.app')

@section('content')
<section class="Banner_Inner">
         <div class="container-floud">
            <div class="row  justify-c">
               <div class="col-md-12 text-center">
                  <h2>SETTINGS</h2>
                 </div> 
            </div>
         </div>
      </section> 
<section class="section_cartype">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Settings') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li><a href="{{route('my-account')}}">My Account</a></li>
                        <li><a href="{{route('faq')}}">Faq</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="">Change Password</a></li>
                        @auth<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
    Logout
</a>    </li>@endauth
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form></li>
                    </ul>

                    <!-- {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
