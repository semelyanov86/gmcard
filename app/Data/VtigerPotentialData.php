<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Data;

final class VtigerPotentialData extends Data
{
    public function __construct(
        public string $potentialname,
        public string $sales_stage,
        public ?string $related_to = null,
        public ?float $amount = null,
        public ?string $closingdate = null,
        public ?string $assigned_user_id = null,
        public ?string $description = null,
        public ?string $leadsource = null,
    ) {}
}

