<?php

declare(strict_types=1);

namespace App\Data;

use App\ValueObjects\MoneyValueObject;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

final class BonusData extends Data
{
    public function __construct(
        public ?int $id = null,
        #[WithCast(MoneyValueObject::class)]
        public ?MoneyValueObject $amount = null,
        public ?int $code = null,
        public ?string $type = null,
        public ?int $source_id = null,
        public ?int $target_id = null,
    ) {}
}
