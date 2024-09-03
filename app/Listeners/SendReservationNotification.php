<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ReservationCreated;
use App\Mail\ReservationConfirmed;
use Illuminate\Support\Facades\Mail;

class SendReservationNotification
{

    use InteractsWithQueue;


    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReservationCreated $event)
    {
        // Send email notification
        Mail::to($event->reservation->user->email)->send(new ReservationConfirmed($event->reservation));

    }
}
