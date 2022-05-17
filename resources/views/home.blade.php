@extends('layouts.app')

@section('content')
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
                        <li><a href="">My Account</a></li>
                        <li><a href="{{route('faq')}}">Faq</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="">Change Password</a></li>
                    </ul>

                    <!-- {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
