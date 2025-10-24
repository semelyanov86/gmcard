<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\CreatePromoData;
use App\Enums\PromoType;
use App\Models\Promo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;
use Throwable;

/**
 * @method static Promo run(CreatePromoData $dto)
 */
final readonly class CreatePromoAction
{
    use AsAction;

    /**
     * @throws Throwable
     */
    public function handle(CreatePromoData $dto): Promo
    {
        return DB::transaction(function () use ($dto): Promo {
            $promoType = $this->getPromoType($dto->promoTypeId);

            $promo = Promo::create([
                'user_id' => $dto->userId,
                'name' => $dto->title,
                'type' => $promoType,
                'description' => $dto->description,
                'extra_conditions' => $dto->conditions,
                'free_delivery' => $dto->freeDelivery ?? false,
                'show_on_home' => $dto->showInBanner ?? false,
                'available_till' => Carbon::now()->addDays($dto->durationDays),
                'discount' => $this->getDiscount($dto, $promoType),
                'sales_order_from' => $dto->minimumOrderAmount ? $dto->minimumOrderAmount * 100 : 0,
                'code' => $dto->promoCode,
                'video_link' => $dto->youtubeUrl,
                'smm_links' => $dto->socialLinks,
                'days_availability' => is_array($dto->schedule) ? ($dto->schedule['days'] ?? null) : null,
                'availabe_from' => $this->getScheduleTime($dto->schedule, 'start'),
                'available_to' => $this->getScheduleTime($dto->schedule, 'end'),
                'img' => is_array($dto->photos) ? ($dto->photos[0] ?? null) : null,
                'started_at' => $dto->isDraft ? null : now(),
                'raise_on_top_hours' => 0,
                'restart_after_finish_days' => 0,
                'free_delivery_from' => $dto->freeDeliveryFrom ? $dto->freeDeliveryFrom * 100 : 0,
            ]);

            $this->syncRelations($promo, $dto);

            return $promo;
        });
    }

    private function getPromoType(int $id): PromoType
    {
        return match ($id) {
            1 => PromoType::SIMPLE,
            2 => PromoType::COUPON,
            3 => PromoType::GIFT,
            4 => PromoType::ONE_PLUS_ONE,
            5 => PromoType::TWO_PLUS_ONE,
            6 => PromoType::CASHBACK,
            7 => PromoType::KONKURS,
            default => PromoType::SIMPLE,
        };
    }

    private function syncRelations(Promo $promo, CreatePromoData $dto): void
    {
        $promo->categories()->sync($dto->categoryIds);
        $promo->cities()->sync($dto->cityIds);

        if ($dto->addresses && ! empty($dto->addresses)) {
            $addressIds = array_column($dto->addresses, 'id');
            $promo->addresses()->sync($addressIds);
        }
    }

    private function getDiscount(CreatePromoData $dto, PromoType $type): ?string
    {
        if (in_array($type, [PromoType::SIMPLE, PromoType::COUPON, PromoType::GIFT]) && $dto->discountAmount) {
            return $dto->discountAmount . ($dto->discountCurrency ?? '%');
        }

        if (in_array($type, [PromoType::CASHBACK, PromoType::KONKURS]) && $dto->cashbackAmount) {
            return $dto->cashbackAmount . ($dto->cashbackCurrency ?? '%');
        }

        return null;
    }

    /**
     * @param array<string, mixed>|null $schedule
     */
    private function getScheduleTime(?array $schedule, string $key): ?string
    {
        if (! is_array($schedule)) {
            return null;
        }

        $timeRange = $schedule['timeRange'] ?? null;
        if (! is_array($timeRange)) {
            return null;
        }

        $value = $timeRange[$key] ?? null;
        
        return is_string($value) ? $value : null;
    }
}
