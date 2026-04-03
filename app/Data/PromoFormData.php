<?php

declare(strict_types=1);

namespace App\Data;

use App\Actions\Promo\BuildPromoFormDataAction;
use App\Models\Promo;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapOutputName(SnakeCaseMapper::class)]
final class PromoFormData extends Data
{
    /**
     * @param int $id
     * @param int $promoTypeId
     * @param string $title
     * @param string $description
     * @param string|null $conditions
     * @param array<string, float|string>|null $discount
     * @param array<string, float|string>|null $cashback
     * @param array<int, string> $categoryIds
     * @param array<int, int> $cityIds
     * @param array<int, array<string, mixed>> $addresses
     * @param array<string, mixed> $schedule
     * @param array<string, string> $socialLinks
     * @param string|null $promoCode
     * @param int|null $minimumOrderAmount
     * @param bool $freeDelivery
     * @param int|null $freeDeliveryFrom
     * @param int $durationDays
     * @param bool $showInBanner
     * @param string|null $youtubeUrl
     * @param string|null $existingPhoto
     * @param list<string> $existingPhotoPaths
     * @param array<int, UploadedFile|string> $photos
     * @param bool $useBonusBalance
     * @param bool $isDraft
     * @param bool $agreeToTerms
     * @param string $filterCity
     */
    public function __construct(
        public int $id,
        public int $promoTypeId,
        public string $title,
        public string $description,
        public ?string $conditions,
        public ?array $discount,
        public ?array $cashback,
        public array $categoryIds,
        public array $cityIds,
        public array $addresses,
        public array $schedule,
        public array $socialLinks,
        public ?string $promoCode = null,
        public ?int $minimumOrderAmount = null,
        public bool $freeDelivery = false,
        public ?int $freeDeliveryFrom = null,
        public int $durationDays = 1,
        public bool $showInBanner = false,
        public ?string $youtubeUrl = null,
        public ?string $existingPhoto = null,
        public array $existingPhotoPaths = [],
        public array $photos = [],
        public bool $useBonusBalance = false,
        public bool $isDraft = false,
        public bool $agreeToTerms = true,
        public string $filterCity = '',
    ) {}

    public static function fromPromo(Promo $promo): self
    {
        return BuildPromoFormDataAction::run($promo);
    }
}
