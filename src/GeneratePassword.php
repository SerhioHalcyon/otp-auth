<?php

namespace Empat\Otp;

trait GeneratePassword
{
    public function generatePassword()
    {
        $lenght = 4;
        $password = '';

        for($i = 0; $i < $lenght; $i++) {
            $password .= rand(0, 9);
        }

        return $password;
    }
}
