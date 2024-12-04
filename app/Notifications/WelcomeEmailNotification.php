<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmailNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Welcome to Smart-Ilm-Dalib!')
            ->greeting("Hello {$notifiable->name},")
            ->line('Thank you for joining Smart-Ilm-Dalib.')
            ->line('We are excited to have you as part of our learning community.')
            ->action('Start Learning', url('/home'))
            ->line('If you have any questions, feel free to reach out.')
            ->salutation('Warm regards, Smart-Ilm-Dalib Team');
    }

    public function toArray($notifiable)
    {
        return [];
    }
}
