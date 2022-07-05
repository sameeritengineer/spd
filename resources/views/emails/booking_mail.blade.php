@component('mail::message')
Hi Splash & Drip,<br>

You have a new booking <br> 

Date - {{ $booking_data['date'] }}<br>

Time - {{ $booking_data['time'] }}<br>

Address - {{ $booking_data['address'] }}<br>

Customer Name - {{ $booking_data['name'] }}<br>

Customer Number - {{ $booking_data['mobile'] }}<br>

Customer Email - {{ $booking_data['email'] }}<br>

Wash Type - {{ $booking_data['wash_type'] }}<br>

{{ config('app.name') }}
@endcomponent
