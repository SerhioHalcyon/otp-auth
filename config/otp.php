<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Provider
    |--------------------------------------------------------------------------
    |
    | This option controls the default facade provider that is used to send
    | any sms by your application. Alternative providers may be setup
    | and used as needed; however, this provider will be used by default.
    |
    */

    'default' => env('OTP_PROVIDER', 'twilio'),

    /*
    |--------------------------------------------------------------------------
    | Providers
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection information for each facade that
    | is used by your application. A default configuration has been added
    | for each facade shipped with package.
    |
    | Supported Providers: "twilio", "provider"
    |
    */

    'providers' => [

        'twilio' => [
            'provider' => \Empat\Otp\Twilio\Accessor::class,
        ],

        'turbosms' => [
            'provider' => \Empat\Otp\TurboSms\Accessor::class,
        ],

    ],

];
