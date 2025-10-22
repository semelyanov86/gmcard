<?php

declare(strict_types=1);

namespace App\Actions\Promo;

use App\Data\CreatePromoData;
use App\Enums\PromoType;
use App\Models\Promo;
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
            $availableTill = now()->addDays($dto->duration_days);

            $schedule = $dto->schedule ?? [];
            /** @var array<string, string> $timeRange */
            $timeRange = $schedule['timeRange'] ?? [];

            $promo = Promo::create([
                'name' => $dto->title,
                'user_id' => auth()->id(),
                'type' => PromoType::fromId($dto->promo_type_id),
                'description' => $dto->description,
                'extra_conditions' => $dto->conditions ?? '',
                'code' => $dto->promo_code,
                'video_link' => $dto->youtube_url,
                'smm_links' => $dto->social_links,
                'days_availability' => $schedule['days'] ?? null,
                'availabe_from' => $timeRange['start'] ?? null,
                'available_to' => $timeRange['end'] ?? null,
                'started_at' => now(),
                'available_till' => $availableTill,
                'show_on_home' => $dto->show_in_banner ?? false,
                'raise_on_top_hours' => 0,
                'restart_after_finish_days' => 0,
                'sales_order_from' => $dto->minimum_order_amount ? (int) $dto->minimum_order_amount : 0,
                'free_delivery_from' => 0,
                'free_delivery' => $dto->free_delivery ?? false,
                'discount' => null,
            ]);

            if (! empty($dto->category_ids)) {
                $promo->categories()->attach($dto->category_ids);
            }

            if (! empty($dto->city_ids)) {
                $promo->cities()->attach($dto->city_ids);
            }

            return $promo;
        });
    }
}
