<?php
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ReservationConfirmedNotification extends Notification
{
    use Queueable;

    protected $reservation;

    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // You can add 'broadcast' if you want real-time notification
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Your reservation has been confirmed.')
                    ->line('Reservation Details:')
                    ->line('Date: ' . $this->reservation->date)
                    ->line('Time: ' . $this->reservation->time)
                    ->line('Guests: ' . $this->reservation->guest_count)
                    ->action('View Reservation', url('/reservations/' . $this->reservation->id))
                    ->line('Thank you for choosing ABC Restaurant!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'reservation_id' => $this->reservation->id,
            'date' => $this->reservation->date,
            'time' => $this->reservation->time,
            'guest_count' => $this->reservation->guests,
            'status' => $this->reservation->status,
        ];
    }
}
