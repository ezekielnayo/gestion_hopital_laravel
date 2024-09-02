<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentStatusNotification extends Notification
{
    protected $appointment;
    protected $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($appointment, $status)
    {
        $this->appointment = $appointment;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

     public function toMail($notifiable)
     {
         return (new MailMessage)
                     ->line('Votre rendez-vous a été ' . $this->status)
                     ->line('Date et heure du rendez-vous : ' . $this->appointment->appointment_date)
                     ->line('Motif : ' . $this->appointment->motif)
                     ->action('Voir les détails', url('/appointments/' . $this->appointment->id))
                     ->line('Merci d\'utiliser notre application!');
     }
 

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {

        return [
            'appointment_id' => $this->appointment->id,
            'status' => $this->status,
        ];
    }

}
