<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReservationStatusChanged extends Notification implements ShouldQueue
{
    use Queueable;

    public $reservation;
    public $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reservation, $status)
    {
        $this->reservation = $reservation;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The status of your reservation has changed.')
                    ->line('Reservation ID: ' . $this->reservation->id)
                    ->line('New Status: ' . $this->status)
                    ->action('View Reservation', url('/reservations/' . $this->reservation->id))
                    ->line('Thank you for using our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'reservation_id' => $this->reservation->id,
            'status' => $this->status,
            'message' => 'Your reservation status has been updated to ' . $this->status,
        ];
    }
}
