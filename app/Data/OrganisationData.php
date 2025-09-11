<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

class OrganisationData extends Data
{
    public function __construct(
        public ?int $id = null,
        public string $name,
        public ?string $owner_role = null,
        public ?string $inn = null,
        public ?string $ogrn = null,
        public ?string $contact = null,
        public ?string $contact_fio = null,
        /** @var array<string, mixed>|null */
        public ?array $opening_hours = null,
        public ?int $user_id = null,
        public ?int $address_id = null,
    ) {}
}
