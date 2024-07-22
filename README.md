# One time password(OTP) authentication for Laravel

## Contents

- [Configuration](#configuration)
- [Channels](#channels)
  - [Twilio](#twilio)
  - [TurboSms](#turbosms)
- [Usage](#usage)
- [Changelog](#changelog)
- [License](#license)

## Configuration

Add the otp provider to your .env:

```dotenv
OTP_PROVIDER=twilio
```

## Channels

### Twilio

Add your Twilio Account SID, Auth Token, and From Number (optional) to your `.env`:

```dotenv
TWILIO_ACCOUNT_SID=ACCOUNT_SID
TWILIO_AUTH_TOKEN=AUTH_TOKEN
TWILIO_FROM=NUMBER_FROM
```

More information can be found at [![Static Badge](https://img.shields.io/badge/Laravel_Twilio_Notification_Channel-red)](https://laravel-notification-channels.com/twilio)

### TurboSms

Add your TurboSMS sms gate login, password and default sender name to your `config/services.php`:

```php
// config/services.php
...
    'turbosms' => [
        'wsdlEndpoint' => env('TURBOSMS_WSDLENDPOINT', 'http://turbosms.in.ua/api/wsdl.html'),
        'login' => env('TURBOSMS_LOGIN'),
        'password' => env('TURBOSMS_PASSWORD'),
        'sender' => env('TURBOSMS_SENDER'),
        'debug' => env('TURBOSMS_DEBUG', false), //will log sending attempts and results
        'sandboxMode' => env('TURBOSMS_SANDBOX_MODE', false) //will not invoke API call
    ],
...
```

Then add data about login, password and sender to the `.env`:

```dotenv
TURBOSMS_LOGIN=LOGIN
TURBOSMS_PASSWORD=PASSWORD
TURBOSMS_SENDER=SENDER
```

More information can be found at [![Static Badge](https://img.shields.io/badge/Laravel_TurboSMS_Notification_Channel-red)](https://laravel-notification-channels.com/turbosms)

## Usage

Now you can use the facade for send the notification:

```php
use Otp\Otp;

 Otp::notify('phone_number');
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
