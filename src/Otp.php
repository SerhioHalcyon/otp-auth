<?php

namespace Empat\Otp;

use Illuminate\Support\Facades\Facade;

class Otp extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Otp';
    }
}
