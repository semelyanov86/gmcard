<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class () extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.phone', '+7 (927) 997-888-44');
        $this->migrator->add('general.email', 'admin@gm1lp.ru');
    }
};
