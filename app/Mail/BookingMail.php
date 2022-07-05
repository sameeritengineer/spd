<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking_data= array();

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking_data) 
    {
        $this->booking_data = $booking_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($address = 'support@theappkit.co.uk', $name = 'Splash-and-drip')->subject('New Booking')->markdown('emails.booking_mail');
    }
}
