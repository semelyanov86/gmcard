<?php

declare(strict_types=1);

namespace App\Data;

use App\ValueObjects\MoneyValueObject;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
final class CreatePromoData extends Data
{
    /**
     * @param  array<int, string|int>  $categoryIds
     * @param  array<int, int>  $cityIds
     * @param  array<string, string>|null  $socialLinks
     * @param  array<string, string>|null  $schedule
     * @param  array<int, array<string, mixed>>|null  $addresses
     * @param  array<int, string>|null  $photos
     */
    public function __construct(
        public int $userId,
        public string $title,
        public int $promoTypeId,
        public string $description,
        public ?string $conditions,
        public int $durationDays,
        public array $categoryIds,
        public array $cityIds,
        public ?MoneyValueObject $discount = null,
        public ?MoneyValueObject $cashback = null,
        public ?MoneyValueObject $minimumOrder = null,
        public ?string $promoCode = null,
        public ?bool $freeDelivery = false,
        public ?MoneyValueObject $freeDeliveryFrom = null,
        public ?bool $showInBanner = false,
        public ?string $youtubeUrl = null,
        public ?array $socialLinks = null,
        public ?array $schedule = null,
        public ?array $addresses = null,
        public ?array $photos = null,
        public bool $isDraft = false,
    ) {}
}
