<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.phone', '+7 999 000 00 00');
        $this->migrator->add('general.email', 'info@example.com');
    }
};
