<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\GenderType;
use App\Enums\JobStatusType;
use SensitiveParameter;
use Spatie\LaravelData\Attributes\Hidden;
use Spatie\LaravelData\Data;

final class UserData extends Data
{
    public function __construct(
        public string $name,
        public string $email,
        #[SensitiveParameter]
        #[Hidden]
        public string $password,
        public ?string $last_name = null,
        public ?int $age = null,
        public ?int $id = null,
        public ?int $balance = null,
        public ?int $virtual_balance = null,
        public ?string $job = null,
        public ?JobStatusType $job_status = null,
        public ?int $city = null,
        public ?string $country = null,
        public ?string $birth_date = null,
        public ?string $role = null,
        public ?GenderType $gender = null,
        public ?string $code = null,
    ) {}
}
