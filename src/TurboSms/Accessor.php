<?php

namespace Empat\Otp\TurboSms;

use Empat\Otp\GeneratePassword;
use Empat\Otp\OnDemandNotificationContract;
use Empat\Otp\Models\OneTimePassword;
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

        Notification::route('turbosms', $recipient)->notify(new SmsNotification($code));
    }
}
