<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation, $status)
    {
        $this->reservation = $reservation;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reservation Status Updated')
                    ->view('emails.reservation_status')
                    ->with([
                        'reservationId' => $this->reservation->id,
                        'status' => $this->status,
                        'customerName' => $this->reservation->customer->name,
                    ]);
    }
}
