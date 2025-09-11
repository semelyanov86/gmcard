<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class OrganisationData extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $owner_role,
        public ?string $inn,
        public ?string $ogrn,
        public ?string $contact,
        public ?string $contact_fio,
        /** @var array<string, mixed>|null */
        public ?array $opening_hours,
        public int $user_id,
        public int $address_id,
    ) {}
}
