<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $phone;
    public string $email;

    public static function group(): string
    {
        return 'general';
    }
}
