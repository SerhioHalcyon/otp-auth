<?php

namespace Empat\Otp\Twilio;

use Empat\Otp\GeneratePassword;
use Empat\Otp\Models\OneTimePassword;
use Empat\Otp\OnDemandNotificationContract;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Twilio\TwilioChannel;

class Accessor implements OnDemandNotificationContract
{
    use GeneratePassword;
    
    public function notify(string $recipient): void
    {
        OneTimePassword::where('phone_number', $recipient)->delete();

        $code = $this->generatePassword();
        OneTimePassword::create(['phone_number' => $recipient, 'code' => $code]);

        Notification::route(TwilioChannel::class, $recipient)->notify(new SmsNotification($code));
    }
}
