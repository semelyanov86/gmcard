<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $name,
        public ?string $last_name = null,
        public ?int $age = null,
        public string $email,
        public ?string $job = null,
        public ?string $job_status = null,
        public ?string $city = null,
        public ?string $country = null,
        public ?string $birth_date = null,
        public ?string $role = null,
        public ?string $gender = null,
        public ?string $code = null,
    ) {}
}
