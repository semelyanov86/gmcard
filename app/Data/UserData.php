<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class UserData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $last_name,
        public int $age,
        public string $email,
        public string $password,
        public ?string $balance = null,
        public ?string $job = null,
        public ?string $job_status = null,
        public ?int $city = null,
        public ?string $country = null,
        public ?string $birth_date = null,
        public ?string $role = null,
        public ?string $gender = null,
        public ?string $code = null,
    ) {}
}
