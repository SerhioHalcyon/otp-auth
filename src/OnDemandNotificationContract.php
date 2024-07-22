<?php

namespace Empat\Otp;

interface OnDemandNotificationContract
{
    public function notify(string $recipient): void;
}
