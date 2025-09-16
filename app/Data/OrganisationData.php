<?php

declare(strict_types=1);

namespace App\Data;

use App\Enums\OwnerRole;
use Spatie\LaravelData\Data;

final class OrganisationData extends Data
{
    public function __construct(
        public string $name,
        public OwnerRole $owner_role,
        public int $user_id,
        public int $address_id,
        public ?string $inn= null,
        public ?string $ogrn = null,
        public ?string $contact = null,
        public ?string $contact_fio = null,
        /** @var array<string, string>|null */
        public ?array $opening_hours = null,
        public ?int $id = null,
    ) {}
}
