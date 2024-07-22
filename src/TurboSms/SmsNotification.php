<?php

namespace Empat\Otp\TurboSms;

use Empat\Otp\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use NotificationChannels\TurboSMS\TurboSMSMessage;

class SmsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private string $code)
    {
        $this->channel = 'turbosms';
    }

    public function toTurboSMS($notifiable)
    {
        return (new TurboSMSMessage("Your code: {$this->code}"));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
